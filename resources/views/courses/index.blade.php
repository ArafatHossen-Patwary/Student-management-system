@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="d-flex justify-content-between align-items-center my-4">
            <h1 class="h3 mb-0 text-gray-800">Courses List</h1>
            <a href="{{ route('courses.create') }}" class="btn btn-primary">
                <i class="fas fa-plus-circle me-1"></i> Add New Course
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
                <form method="GET" action="{{ route('courses.index') }}" class="row g-3">
                    <div class="col-md-6">
                        <div class="input-group">
                            <input type="text" name="search" class="form-control"
                                placeholder="Search by Course Name or Code..." value="{{ request('search') }}">
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
                        <a href="{{ route('courses.index') }}" class="btn btn-secondary w-100">Reset</a>
                    </div>
                </form>
            </div>
        </div>

        <!-- Courses Table Card -->
        <div class="card shadow mb-4">
            <div class="card-body p-0">
                <div class="table-responsive">
                    <table class="table table-hover align-middle mb-0">
                        <thead class="table-light">
                            <tr>
                                <th class="ps-4">Course Code</th>
                                <th>Course Name</th>
                                <th>Credits</th>
                                <th>Department</th>
                                <th>Assigned Teacher</th>
                                <th class="text-end pe-4">Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($courses as $course)
                                <tr>
                                    <td class="ps-4 fw-bold text-primary">{{ $course->code }}</td>
                                    <td>{{ $course->name }}</td>
                                    <td><span class="badge bg-secondary">{{ $course->credit }} Credits</span></td>
                                    <td>
                                        <span class="badge bg-info text-dark">{{ $course->department->code }}</span>
                                    </td>
                                    <td>{{ $course->teacher->name }}</td>
                                    <td class="text-end pe-4">
                                        <div class="btn-group" role="group">
                                            <a href="{{ route('courses.show', $course->id) }}"
                                                class="btn btn-sm btn-dark text-black">
                                                <i class="fas fa-eye"></i> View
                                            </a>
                                            <a href="{{ route('courses.edit', $course->id) }}"
                                                class="btn btn-sm btn-dark text-black">
                                                <i class="fas fa-edit"></i> Edit
                                            </a>
                                            <form action="{{ route('courses.destroy', $course->id) }}" method="POST"
                                                class="d-inline"
                                                onsubmit="return confirm('Are you sure you want to delete this course?')">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-sm btn-dark text-black">
                                                    <i class="fas fa-trash"></i> Delete
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="text-center py-5 text-muted">
                                        <i class="fas fa-book fa-3x mb-3"></i>
                                        <p class="mb-0">No courses found.</p>
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
            @if($courses->hasPages())
                <div class="card-footer bg-white py-3">
                    {{ $courses->links() }}
                </div>
            @endif
        </div>
    </div>
@endsection