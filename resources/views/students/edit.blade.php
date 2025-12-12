@extends('layouts.app')

@section('content')

<h1 class="mb-4">Edit Student</h1>

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

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            
            <div class="mb-3">
                <label class="form-label fw-bold">First Name</label>
                <input 
                    type="text"
                    name="fname"
                    value="{{ old('fname', $student->fname) }}"
                    class="form-control @error('fname') is-invalid @enderror"
                >
                @error('fname')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3"> 
                <label class="form-label fw-bold">Last Name</label>
                <input 
                    type="text"
                    name="lname"
                    value="{{ old('lname', $student->lname) }}"
                    class="form-control @error('lname') is-invalid @enderror"
                >
                @error('lname')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label class="form-label fw-bold">Email</label>
                <input 
                    type="text"
                    name="email"
                    value="{{ old('email', $student->email) }}"
                    class="form-control @error('email') is-invalid @enderror"
                >
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            
            <div class="mb-3">
                <label class="form-label fw-bold">Select Courses</label>

                <div class="d-flex flex-wrap gap-2">
                    @foreach ($courses as $course)
                        <label 
                            class="border rounded px-3 py-2 d-flex align-items-center"
                            style="cursor:pointer;"
                        >
                            <input 
                                type="checkbox" 
                                name="courses[]" 
                                value="{{ $course->id }}" 
                                class="me-2"

                                {{-- Keep selected courses checked --}}
                                @if(in_array($course->id, old('courses', $student->courses->pluck('id')->toArray())))
                                    checked
                                @endif
                            >
                            {{ $course->course_name }}
                        </label>
                    @endforeach
                </div>
            </div>

            {{-- ACTION BUTTONS --}}
            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>

        </form>
    </div>
</div>

@endsection
