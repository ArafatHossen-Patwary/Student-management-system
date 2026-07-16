@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1 class="h3 mb-0 text-gray-800">Teachers List</h1>
            <a href="{{ route('teachers.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i> Add New Teacher
            </a>
        </div>

        @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        @endif

        <!-- Search & Filter Card -->
        <div class="card shadow mb-4">
            <div class="card-body">
                <form method="GET" action="{{ route('teachers.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by Name, Email, Designation, Phone..." value="{{ request('search') }}">
                            <button class="btn btn-outline-secondary" type="submit">Search</button>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <select name="department_id" class="form-select" onchange="this.form.submit()">
                            <option value="">All Departments</option>
                            @foreach($departments as $dept)
                                <option value="{{ $dept->id }}" {{ request('department_id') == $dept->id ? 'selected' : '' }}>
                                    {{ $dept->name }} ({{ $dept->code }})
                                </option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <a href="{{ route('teachers.index') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Teachers Table Card -->
        <div class="card shadow mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Photo</th>
                                <th>Name</th>
                                <th>Designation</th>
                                <th>Department</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($teachers as $teacher)
                                <tr>
                                    <td class="ps-4">
                                        @if($teacher->photo)
                                            <img src="{{ asset('storage/' . $teacher->photo) }}" alt="{{ $teacher->name }}"
                                                class="rounded-circle" style="width: 45px; height: 45px; object-fit: cover;">
                                        @else
                                            <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center"
                                                style="width: 45px; height: 45px; font-size: 1.2rem;">
                                                {{ strtoupper(substr($teacher->name, 0, 1)) }}
                                            </div>
                                        @endif
                                    </td>
                                    <td class="fw-bold text-primary">{{ $teacher->name }}</td>
                                    <td>{{ $teacher->designation }}</td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ $teacher->department->code }}</span>
                                    </td>
                                    <td>{{ $teacher->email }}</td>
                                    <td>{{ $teacher->phone ?? 'N/A' }}</td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('teachers.show', $teacher->id) }}"
                                                class="btn btn-sm btn-dark text-black" title="View Details">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('teachers.edit', $teacher->id) }}"
                                                class="btn btn-sm btn-dark text-black" title="Edit">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('teachers.destroy', $teacher->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this teacher?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-dark text-black" title="Delete">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-muted">
                                        <i class="fas fa-user-tie fa-3x mb-3"></i>
                                        <p class="mb-0">No teachers found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($teachers->hasPages())
                <div class="card-footer bg-white py-3">
                    {{ $teachers->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection