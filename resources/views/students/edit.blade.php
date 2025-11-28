@extends('layouts.app')

@section('content')

<h1 class="mb-4">Edit Student</h1>

<div class="card shadow-sm">
    <div class="card-body">

        <form action="{{ route('students.update', $student->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">First Name</label>
                <input type="text" name="fname" value="{{ $student->fname }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Last Name</label>
                <input type="text" name="lname" value="{{ $student->lname }}" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" value="{{ $student->email }}" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Update Student</button>
            <a href="{{ route('students.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection
