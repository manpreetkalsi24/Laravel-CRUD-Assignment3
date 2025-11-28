@extends('layouts.app')

@section('content')

<h1 class="mb-4 fw-bold">Student Details</h1>

<div class="card shadow border-0">
    <div class="card-body p-4">

        <div class="mb-4">
            <h2 class="fw-bold text-primary mb-1">
                {{ ucfirst($student->fname) }} {{ ucfirst($student->lname) }}
            </h2>
            <p class="text-secondary fs-5 mb-0">
                {{ $student->email }}
            </p>
        </div>

        <div class="mt-4">
            <a href="{{ route('students.edit', $student->id) }}" class="btn btn-warning text-white me-2">
                Edit
            </a>

            <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger me-2" onclick="return confirm('Are you sure you want to delete this student?')">
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
