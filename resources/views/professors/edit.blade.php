@extends('layouts.app')

@section('content')

<h1 class="mb-4">Edit Professor</h1>

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

        <form action="{{ route('professors.update', $professor->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Professor Name</label>
                <input 
                    type="text" 
                    name="name" 
                    class="form-control @error('name') is-invalid @enderror"
                    value="{{ old('name', $professor->name) }}"
                >

                @error('name')
                    <div class="text-danger mt-1">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Professor</button>
            <a href="{{ route('professors.index') }}" class="btn btn-secondary">Back</a>
        </form>

    </div>
</div>

@endsection
