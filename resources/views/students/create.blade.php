@extends('layouts.app')

@section('content')

<h1 class="mb-4">Add New Student</h1>

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

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input 
                    type="text" 
                    name="fname"
                    value="{{ old('fname') }}"
                    class="form-control @error('fname') is-invalid @enderror"
                >
                @error('fname')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input 
                    type="text" 
                    name="lname"
                    value="{{ old('lname') }}"
                    class="form-control @error('lname') is-invalid @enderror"
                >
                @error('lname')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input 
                    type="text"
                    name="email"
                    value="{{ old('email') }}"
                    class="form-control @error('email') is-invalid @enderror"
                >
                @error('email')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Save Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection
