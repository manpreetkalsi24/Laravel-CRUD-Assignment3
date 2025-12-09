@extends('layouts.app')

@section('content')

<h1 class="mb-4">All Professors</h1>

<a href="{{ route('professors.create') }}" class="btn btn-primary mb-3">
    Add New Professor
</a>

<div class="card shadow-sm">
    <div class="card-body">

        @if ($professors->count() == 0)

            <div class="text-center text-muted py-5 fs-4">
                No professors available.
            </div>

        @else

            <table class="table table-striped table-bordered align-middle">
                <thead class="table-dark">
                    <tr>
                        <th>Sr. No.</th>
                        <th>Name</th>
                        <th width="180px">Actions</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach ($professors as $professor)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $professor->name }}</td>

                            <td>

                                <a href="{{ route('professors.show', $professor->id) }}"
                                   class="btn btn-sm btn-info text-white">
                                    View
                                </a>

                                <a href="{{ route('professors.edit', $professor->id) }}"
                                   class="btn btn-sm btn-warning text-white">
                                    Edit
                                </a>

                                <form action="{{ route('professors.destroy', $professor->id) }}"
                                      method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')

                                    <button class="btn btn-sm btn-danger"
                                            onclick="return confirm('Delete this professor?')">
                                        Delete
                                    </button>
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
