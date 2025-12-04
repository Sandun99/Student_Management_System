@extends('layouts.app')

@section('title', 'Add Grade')

@section('content')

    <div class="bg-secondary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">Add New Grade</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('grade.index') }}" class="text-decoration-none">Grades</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container-fluid pb-5 ">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-1 shadow-sm bg">
                    <div class="card-header bg-primary text-white bg-secondary">
                        <ul class="nav nav-tabs card-header-tabs" id="gradeTab" role="tablist">
                        </ul>
                    </div>

                    <div class="card-body p-4 p-lg-5">
                        <div class="tab-content" id="gradeTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel">
                                <form action="{{ route('grade.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="mb-4">
                                        <label for="gradeName" class="form-label fw-semibold">
                                            Grade Name <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="gradeName"
                                            name="name"
                                            class="form-control form-control-lg"
                                            placeholder="Enter grade (10, 11, 12)"
                                            required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label fw-semibold">Class <span class="text-danger">*</span></label>
                                        <select name="class_id" class="form-select" required>
                                            <option value="">Select Class</option>
                                            @foreach($classes as $class)
                                                <option value="{{ $class->id }}">{{ $class->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="mb-4">
                                        <label for="gradeCode" class="form-label fw-semibold">
                                            Grade Code
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="gradeCode"
                                            name="code"
                                            class="form-control form-control-lg"
                                            placeholder="GR/001"
                                            required>
                                    </div>

                                    <div class="d-flex gap-2 justify-content-end mt-5">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Create Grade
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
