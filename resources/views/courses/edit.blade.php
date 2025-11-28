@extends('layouts.app')

@section('content')

<h1 class="mb-4">Edit Course</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" name="course_name" value="{{ $course->course_name }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Course Code</label>
                <input type="text" name="course_code" value="{{ $course->course_code }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control">{{ $course->description }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection
