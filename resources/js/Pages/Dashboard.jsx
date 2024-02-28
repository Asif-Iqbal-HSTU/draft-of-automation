import AuthenticatedLayout from '@/Layouts/AuthenticatedLayout';
import Form from './Course/Form';
import PrimaryButton from '@/Components/PrimaryButton';
import { Head, Link } from '@inertiajs/react';

export default function Dashboard({ departments, auth }) {
    console.log("auth = " + auth);
    console.log("departments = " + departments);
    return (
        <AuthenticatedLayout
            user={auth.user}
            header={<h2 className="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">Dashboard!</h2>}
        >
            <Head title="Dashboard" />


            <div className="py-12">
                <div className="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
                    <div className="p-4 sm:p-8 bg-white dark:bg-gray-800 shadow sm:rounded-lg">
                        Hello
                        &nbsp;
                        <Link
                            href={route('course.add')}
                            className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        >
                            Let's add a course!
                        </Link>
                    </div>
                </div>
            </div>
            <div className="flex items-center justify-end mt-4">
                <Link
                    href={route('course.add')}
                    className="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                >
                    Already registered?
                </Link>
            </div>

        </AuthenticatedLayout>
    );
}
