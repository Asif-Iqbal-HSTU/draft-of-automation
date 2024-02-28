import { useEffect } from 'react';
import GuestLayout from '@/Layouts/GuestLayout';
import InputError from '@/Components/InputError';
import InputLabel from '@/Components/InputLabel';
import PrimaryButton from '@/Components/PrimaryButton';
import TextInput from '@/Components/TextInput';
import { Head, Link, useForm, usePage } from '@inertiajs/react';

export default function Form({ departments, className = '' }) {
  const user = usePage().props.auth.user;

  console.log(departments);

  const { data, setData, post, processing, errors, reset } = useForm({
    CourseTitle: '',
    Department: '',
  });

  //const departments = ['Department A', 'Department B', 'Department C'];
  //const faculties = ['Faculty A', 'Faculty B', 'Faculty C'];
  //const designations = ['Lecturer', 'Assistant Professor', 'Associate Professor', 'Professor'];

  const submit = (e) => {
    e.preventDefault();
    post(route('course.store'));
  };

  return (
    <section className={className}>
      <Head title="Dashboard" />

      <header>
        <h2 className="text-lg font-medium text-gray-900 dark:text-gray-100">Course Syllabus</h2>

        <p className="mt-1 text-sm text-gray-600 dark:text-gray-400">
          Add courses and syllabus from here.
        </p>
      </header>

      <form onSubmit={submit} className="mt-6 space-y-6">
        <div>
          <InputLabel htmlFor="CourseTitle" value="Course Title" />

          <TextInput
            id="CourseTitle"
            name="CourseTitle"
            value={data.CourseTitle}
            className="mt-1 block w-full"
            autoComplete="CourseTitle"
            isFocused={true}
            onChange={(e) => setData('CourseTitle', e.target.value)}
            required
          />

          <InputError message={errors.CourseTitle} className="mt-2" />
        </div>

        <div>
          <InputLabel htmlFor="Department" value="Department" />

          <select
            id="Department"
            name="Department"
            value={data.CourseTitle}
            className="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring focus:ring-indigo-500 focus:ring-opacity-50"
            autoComplete="Department"
            isFocused={true}
            onChange={(e) => setData('Department', e.target.value)}
            required
          >

            <option value="">Select Department</option>
            {departments.map((department) => (
              <option key={department.id} value={department.id}>
                {department.DepartmentName}
              </option>
            ))}
          </select>

          <InputError message={errors.CourseTitle} className="mt-2" />
        </div>



        <div className="flex items-center justify-end mt-4">
          <PrimaryButton className="ms-4" disabled={processing}>
            Add Course
          </PrimaryButton>
        </div>
      </form>
    </section>
  );
}
