@extends('layouts.app')

@section('content')

<h1 class="mb-4">Student Details</h1>

<div class="card shadow-sm">
    <div class="card-body">

        
        <h3 class="fw-bold mb-1">{{ $student->fname }} {{ $student->lname }}</h3>
        <p class="text-muted">{{ $student->email }}</p>

        <div class="mb-3">
            <span class="badge bg-info text-dark">
                Total Courses: {{ $student->courses->count() }}
            </span>
        </div>

        <hr>

        
        <h5 class="fw-bold">Enrolled Courses</h5>

        @if ($student->courses->count() == 0)
            <p class="text-muted">This student is not enrolled in any courses.</p>
        @else
            <table class="table table-bordered mt-3">
                <thead class="table-dark">
                    <tr>
                        <th>#</th>
                        <th>Course Name</th>
                        <th>Professor</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($student->courses as $index => $course)
                        <tr>
                            <td>{{ $index + 1 }}</td>
                            <td>{{ $course->course_name }}</td>
                            <td>
                                {{ $course->professor->name ?? 'Not Assigned' }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        @endif

        <hr>

        
        <div class="mt-3">

            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning">
                Edit
            </a>

            <form action="{{ route('students.destroy', $student->id) }}"
                  method="POST"
                  class="d-inline">
                @csrf
                @method('DELETE')
                <button type="submit"
                        onclick="return confirm('Are you sure you want to delete this student?')"
                        class="btn btn-danger">
                    Delete
                </button>
            </form>

            <a href="{{ route('students.index') }}" class="btn btn-secondary">
                Back
            </a>

        </div>

    </div>
</div>

@endsection
