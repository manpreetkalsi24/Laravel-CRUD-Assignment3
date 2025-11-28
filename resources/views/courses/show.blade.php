@extends('layouts.app')

@section('content')

<h1 class="mb-4 fw-bold">Course Details</h1>

<div class="card shadow border-0">
    <div class="card-body p-4">

        <div class="mb-4">

            <h2 class="fw-bold text-primary mb-1">
                {{ $course->course_name }}
            </h2>

            <h5 class="text-secondary mb-3">
                {{ $course->course_code }}
            </h5>

            <p class="fs-5 text-dark">
                {{ $course->description ?? 'No description available.' }}
            </p>

        </div>

        <div class="mt-4">
            <a href="{{ route('courses.edit', $course->id) }}" class="btn btn-warning text-white me-2">
                Edit
            </a>

            <form action="{{ route('courses.destroy', $course->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger me-2" onclick="return confirm('Are you sure you want to delete this course?')">
                    Delete
                </button>
            </form>

            <a href="{{ route('courses.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>

    </div>
</div>

@endsection
