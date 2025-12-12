@extends('layouts.app')

@section('content')

<h1 class="mb-4">All Courses</h1>

<a href="{{ route('courses.create') }}" class="btn btn-primary mb-3">Add New Course</a>

<div class="card shadow-sm">
    <div class="card-body">

        @if ($courses->count() == 0)

        <div class="text-center text-muted py-5 fs-4">
            No courses available.
        </div>

        @else

        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Course Name</th>
                    <th>Course Code</th>
                    <th>Description</th>
                    <th>Professors</th>
                    <th width="180px">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($courses as $course)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $course->course_name }}</td>
                    <td>{{ $course->course_code }}</td>
                    <td>{{ Str::limit($course->description, 60) }}</td>
                    <td>{{ $course->professor->name ?? 'Not Assigned' }}</td>


                    <td>
                        <a href="{{ route('courses.show', $course->id) }}" class="btn btn-sm btn-info text-white">View</a>
                        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>

                        <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete this course?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif

    </div>

</div>

@endsection