<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use Inertia\Response;
use App\Models\Course;
use App\Models\Department;
use App\Models\Faculty;
//use App\Models\Degree;


class CourseController extends Controller
{
    //    
    public function add(): Response
    {
        $departments = Department::all();
        $faculties = Faculty::all();
        return Inertia::render('Workspace', [
            'departments' => $departments,
            'faculties' => $faculties,
        ]);
    }

    public function store(Request $request): RedirectResponse
    {        
        $course = Course::create([
            'CourseTitle' => $request->CourseTitle,
            'Department' => $request->Department,
            'Number' => $request->Number,
            'CourseCode' => $request->Department + ' ' + $request->Number,
            'Degree' => $request->Degree,
            'Credit' => $request->Credit,
            'ContactHourPerWeek' => $request->ContactHourPerWeek,
            'Level' => $request->Level,
            'Semester' => $request->Semester,
            'AcademicSession' => $request->AcademicSession,
            'Type' => $request->Type,
            'Type_T_S' => $request->Type_T_S,
            'Prerequisites' => $request->Prerequisites,
            'Summary' => $request->Summary,
        ]);

        return redirect()->back();
    }
}
