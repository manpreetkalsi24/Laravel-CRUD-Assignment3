@extends('layouts.app')

@section('content')

<h1 class="mb-4">All Students</h1>

<a href="{{ route('students.create') }}" class="btn btn-primary mb-3">Add New Student</a>

<div class="card shadow-sm">
    <div class="card-body">

        @if ($students->count() == 0)

        <div class="text-center text-muted py-5 fs-4">
            No students available.
        </div>

        @else

        <table class="table table-striped table-bordered align-middle">
            <thead class="table-dark">
                <tr>
                    <th>Sr. No.</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Email</th>
                    <th width="180px">Actions</th>
                </tr>
            </thead>

            <tbody>
                @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->iteration }}</td>
                    <td>{{ $student->fname }}</td>
                    <td>{{ $student->lname }}</td>
                    <td>{{ $student->email }}</td>

                    <td>
                        <a href="{{ route('students.show', $student->id) }}" class="btn btn-sm btn-info text-white">View</a>
                        <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-warning text-white">Edit</a>

                        <form action="{{ route('students.destroy', $student->id) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-sm btn-danger" onclick="return confirm('Delete student?')">Delete</button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @endif

    </div>

</div>

@endsection