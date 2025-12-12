@extends('layouts.app')

@section('content')

<h1 class="mb-4">Add New Course</h1>

<div class="card shadow-sm">
    <div class="card-body">


        @if ($errors->any())
        <div class="alert alert-danger">
            <h5 class="fw-bold">Please fix the following errors:</h5>
            <!-- <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul> -->
        </div>
        @endif

        <form action="{{ route('courses.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Course Name</label>
                <input
                    type="text"
                    name="course_name"
                    value="{{ old('course_name') }}"
                    class="form-control @error('course_name') is-invalid @enderror">
                @error('course_name')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Course Code</label>
                <input
                    type="text"
                    name="course_code"
                    value="{{ old('course_code') }}"
                    class="form-control @error('course_code') is-invalid @enderror">
                @error('course_code')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Description</label>
                <textarea
                    name="description"
                    class="form-control @error('description') is-invalid @enderror"
                    rows="3">{{ old('description') }}</textarea>

                @error('description')
                <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label>Assign Professor</label>
                <select name="professor_id" class="form-control">
                    <option value="">-- None --</option>
                    @foreach ($professors as $prof)
                    <option value="{{ $prof->id }}">{{ $prof->name }}</option>
                    @endforeach
                </select>
            </div>



            <button type="submit" class="btn btn-primary">Save Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection