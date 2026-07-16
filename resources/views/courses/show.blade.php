@extends('layouts.app')

@section('content')
    <div class="container-fluid px-4">
        <div class="row justify-content-center my-4">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header bg-primary text-white py-3 d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Course Details</h5>
                        <a href="{{ route('courses.index') }}" class="btn btn-light btn-sm">Back to List</a>
                    </div>
                    <div class="card-body">
                        <div class="row mb-4">
                            <div class="col-md-4 text-center">
                                <div class="rounded-circle bg-primary text-white d-inline-flex align-items-center justify-content-center mb-3"
                                    style="width: 100px; height: 100px; font-size: 2.5rem;">
                                    <i class="fas fa-book"></i>
                                </div>
                                <h4 class="fw-bold">{{ $course->code }}</h4>
                                <span class="badge bg-secondary fs-6">{{ $course->credit }} Credits</span>
                            </div>
                            <div class="col-md-8">
                                <table class="table table-borderless">
                                    <tbody>
                                        <tr>
                                            <th style="width: 30%;">Course Name:</th>
                                            <td>{{ $course->name }}</td>
                                        </tr>
                                        <tr>
                                            <th>Department:</th>
                                            <td>
                                                <span class="badge bg-info text-dark">{{ $course->department->name }} ({{ $course->department->code }})</span>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Assigned Teacher:</th>
                                            <td>{{ $course->teacher->name }} ({{ $course->teacher->designation }})</td>
                                        </tr>
                                        <tr>
                                            <th>Teacher Email:</th>
                                            <td>{{ $course->teacher->email }}</td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
