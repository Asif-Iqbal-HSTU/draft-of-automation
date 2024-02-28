<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Department;
use App\Models\Faculty;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): Response
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        //dd($faculties);
        return Inertia::render('Auth/Register', [
            'departments' => $departments,
            'faculties' => $faculties,
        ]);
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|lowercase|email|max:255|unique:'.User::class,
            'name' => 'required|string',
            'faculty' => 'required|string',
            'designation' => 'required|string',
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'department' => $request->department,
            'faculty' => $request->faculty,
            'designation' => $request->designation,
            'password' => Hash::make($request->password),
        ]);

        $departments = Department::all();
        //dd($departments);

        event(new Registered($user));

        Auth::login($user);

        return redirect(RouteServiceProvider::HOME)->with('departments', $departments);
        
    }
}
