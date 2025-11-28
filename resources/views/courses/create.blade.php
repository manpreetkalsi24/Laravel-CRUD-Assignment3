@extends('layouts.app')

@section('content')

<h1 class="mb-4">Add New Course</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input type="text" name="course_name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Course Code</label>
                <input type="text" name="course_code" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea name="description" rows="3" class="form-control"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Save Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection
