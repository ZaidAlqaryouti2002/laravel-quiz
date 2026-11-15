@extends('layouts.app')

@section('content')
<div class="container py-4">
    <!-- Page Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Lecturers</h2>
        <a href="{{ route('lecturers.create') }}" class="btn btn-primary">
            + Add New Lecturer
        </a>
    </div>

    <!-- Success Flash Message -->
    @if (session('success'))
        <div class="alert alert-success alert-dismissible fade show" role="alert">
            {{ session('success') }}
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
        </div>
    @endif

    <!-- Lecturers Table Card -->
    <div class="card shadow-sm">
        <div class="card-body p-0">
            <div class="table-responsive">
                <table class="table table-hover table-striped align-middle mb-0">
                    <thead class="table-dark">
                        <tr>
                            <th>#</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Department</th>
                            <th>Phone</th>
                            <th class="text-end">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($lecturers as $lecturer)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td class="fw-semibold">{{ $lecturer->name }}</td>
                                <td>{{ $lecturer->email }}</td>
                                <td>{{ $lecturer->department ?? 'N/A' }}</td>
                                <td>{{ $lecturer->phone ?? 'N/A' }}</td>
                                <td class="text-end">
                                    <a href="{{ route('lecturers.show', $lecturer->id) }}" class="btn btn-sm btn-info text-white">
                                        View
                                    </a>
                                    <a href="{{ route('lecturers.edit', $lecturer->id) }}" class="btn btn-sm btn-warning">
                                        Edit
                                    </a>
                                    <form action="{{ route('lecturers.destroy', $lecturer->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Are you sure you want to delete this lecturer?');">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger">
                                            Delete
                                        </button>
                                    </form>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="6" class="text-center py-4 text-muted">
                                    No lecturers found.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Pagination Links (if using ->paginate() in controller) -->
    @if ($lecturers instanceof \Illuminate\Pagination\AbstractPaginator)
        <div class="mt-3">
            {{ $lecturers->links('pagination::bootstrap-5') }}
        </div>
    @endif
</div>
@endsection