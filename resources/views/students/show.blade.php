@extends('layouts.app')

@section('content')
<div class="container-fluid px-4">
    <div class="d-flex justify-content-between align-items-center my-4">
        <h1 class="h3 mb-0 text-gray-800">Student Details</h1>
        <a href="{{ route('students.index') }}" class="btn btn-secondary">
            <i class="fas fa-arrow-left me-1"></i> Back to List
        </a>
    </div>

    <div class="row">
        <!-- Profile Card -->
        <div class="col-xl-4 col-lg-5">
            <div class="card shadow mb-4">
                <div class="card-body text-center py-5">
                    @if($student->photo)
                        <img src="{{ asset('storage/' . $student->photo) }}" alt="{{ $student->name }}" class="rounded-circle img-thumbnail mb-3" style="width: 150px; height: 150px; object-fit: cover;">
                    @else
                        <div class="rounded-circle bg-secondary text-white d-flex align-items-center justify-content-center mx-auto mb-3" style="width: 150px; height: 150px; font-size: 4rem;">
                            {{ strtoupper(substr($student->name, 0, 1)) }}
                        </div>
                    @endif
                    <h4 class="font-weight-bold mb-1">{{ $student->name }}</h4>
                    <p class="text-muted mb-3">{{ $student->student_id }}</p>
                    <span class="badge bg-info text-dark px-3 py-2 fs-6">{{ $student->department->name }}</span>
                </div>
            </div>
        </div>

        <!-- Details Card -->
        <div class="col-xl-8 col-lg-7">
            <div class="card shadow mb-4">
                <div class="card-header py-3 bg-light d-flex justify-content-between align-items-center">
                    <h6 class="m-0 font-weight-bold text-primary">Detailed Information</h6>
                    <a href="{{ route('students.edit', $student->id) }}" class="btn btn-sm btn-primary">
                        <i class="fas fa-edit me-1"></i> Edit Profile
                    </a>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Student ID:</div>
                        <div class="col-sm-9 text-primary fw-bold">{{ $student->student_id }}</div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Full Name:</div>
                        <div class="col-sm-9">{{ $student->name }}</div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Email Address:</div>
                        <div class="col-sm-9"><a href="mailto:{{ $student->email }}">{{ $student->email }}</a></div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Phone Number:</div>
                        <div class="col-sm-9">{{ $student->phone ?? 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Gender:</div>
                        <div class="col-sm-9">{{ ucfirst($student->gender) }}</div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Date of Birth:</div>
                        <div class="col-sm-9">{{ $student->date_of_birth ? \Carbon\Carbon::parse($student->date_of_birth)->format('F d, Y') : 'N/A' }}</div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Department:</div>
                        <div class="col-sm-9">{{ $student->department->name }} ({{ $student->department->code }})</div>
                    </div>
                    <hr>
                    <div class="row mb-3">
                        <div class="col-sm-3 text-muted fw-bold">Address:</div>
                        <div class="col-sm-9">{{ $student->address ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
