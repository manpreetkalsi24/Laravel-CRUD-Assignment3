@extends('layouts.app')

@section('content')

<h1 class="mb-4">Add New Student</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('students.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="fname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lname" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Save Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection
