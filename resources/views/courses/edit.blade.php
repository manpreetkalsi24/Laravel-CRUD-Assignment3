@extends('layouts.app')

@section('content')

<h1 class="mb-4">Edit Course</h1>

<div class="card shadow-sm">
    <div class="card-body">

        
        @if ($errors->any())
            <div class="alert alert-danger">
                <h5 class="fw-bold">Please fix the following errors:</h5>
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('courses.update', $course->id) }}" method="POST">
            @csrf
            @method('PUT')

            
            <div class="mb-3">
                <label class="form-label fw-bold">Course Name</label>
                <input 
                    type="text" 
                    name="course_name"
                    class="form-control @error('course_name') is-invalid @enderror"
                    value="{{ old('course_name', $course->course_name) }}"
                >
                @error('course_name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label class="form-label fw-bold">Description</label>
                <textarea 
                    name="description" 
                    class="form-control @error('description') is-invalid @enderror"
                    rows="3"
                >{{ old('description', $course->description) }}</textarea>

                @error('description')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label class="form-label fw-bold">Assign Professor</label>
                <select name="professor_id" class="form-control">
                    <option value="">-- Select Professor --</option>

                    @foreach ($professors as $professor)
                        <option value="{{ $professor->id }}"
                            @selected($course->professor_id == $professor->id)
                        >
                            {{ $professor->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Update Course</button>
            <a href="{{ route('courses.index') }}" class="btn btn-secondary">Back</a>

        </form>
    </div>
</div>

@endsection
