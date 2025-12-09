@extends('layouts.app')

@section('content')

<h1 class="mb-4 fw-bold">Professor Details</h1>

<div class="card shadow border-0">
    <div class="card-body p-4">

        <h2 class="fw-bold text-primary mb-3">
            {{ $professor->name }}
        </h2>

        <div class="mt-4">
            <a href="{{ route('professors.edit', $professor->id) }}"
               class="btn btn-warning text-white me-2">
                Edit
            </a>

            <form action="{{ route('professors.destroy', $professor->id) }}"
                  method="POST" class="d-inline">
                @csrf
                @method('DELETE')

                <button class="btn btn-danger me-2"
                        onclick="return confirm('Are you sure you want to delete this professor?')">
                    Delete
                </button>
            </form>

            <a href="{{ route('professors.index') }}" class="btn btn-secondary">
                Back
            </a>
        </div>

    </div>
</div>

@endsection
