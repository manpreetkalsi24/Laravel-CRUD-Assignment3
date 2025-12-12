@extends('layouts.app')

@section('content')

<h1 class="mb-4">Course Details</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <h5 class="fw-bold">Course Name</h5>
        <h5>{{ $course->course_name }}</h4>
        <h5 class="fw-bold">Course Description</h5>
        <p class="text-muted">{{ $course->description }}</p>

        <hr>
        <h5 class="fw-bold">Professor</h5>
        @if ($course->professor)
            <p>{{ $course->professor->name }}</p>
        @else
            <p class="text-muted">No professor assigned.</p>
        @endif

        <hr>

        
        <h5 class="fw-bold">Enrolled Students</h5>
        @if ($course->students->count() > 0)
            <ul>
                @foreach ($course->students as $student)
                    <li>{{ $student->fname }} {{ $student->lname }}</li>
                @endforeach
            </ul>
        @else
            <p class="text-muted">No students enrolled.</p>
        @endif

        <hr>

        <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning">Edit</a>
        <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>

    </div>
</div>

@endsection
