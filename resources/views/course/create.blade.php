@extends('layouts.app')

@section('title', 'Create Course')

@section('content')

    <div class="container-fluid">
        <div class="row mb-4 align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center position-relative">
                    <h1 class="m-0">Add New Course</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none text-muted">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('course.index') }}" class="text-decoration-none text-muted">Courses</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>

{{--            <div class="col-sm-3">--}}
{{--                <form action="{{ route('course.index') }}" method="GET" class="d-flex">--}}
{{--                    <div class="input-group input-group-lg">--}}
{{--                        <input--}}
{{--                            type="text"--}}
{{--                            name="search"--}}
{{--                            class="form-control"--}}
{{--                            placeholder="Search courses..."--}}
{{--                            value="{{ request('search') }}"--}}
{{--                            aria-label="Search courses">--}}
{{--                        <button class="btn btn-primary" type="submit">--}}
{{--                            <i class="bi bi-search"></i>--}}
{{--                        </button>--}}
{{--                    </div>--}}
{{--                </form>--}}
{{--            </div>--}}
        </div>
    </div>
    <div class="row">
            <div class="col-12">
                <div class="card card-primary card-outline card-tabs">
                    <div class="card-header p-0 pt-1 border-bottom-0">
                        <ul class="nav nav-tabs" id="courseTab" role="tablist">
                            <li class="nav-item">
                                <a class="nav-link active" id="description-tab" data-bs-toggle="pill" href="#description" role="tab">
                                    <i class="bi bi-file-text me-1"></i> Course Details
                                </a>
                            </li>
                        </ul>
                    </div>

                    <div class="card-body">
                        <div class="tab-content" id="courseTabContent">

                            <div class="tab-pane fade show active" id="description" role="tabpanel">
                                <form action="" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group mb-3">
                                                <label>Course Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" placeholder="e.g. Web Development Bootcamp" required>
                                            </div>


                                            <div class="form-group mb-3">
                                                <label>Department</label>
                                                <input type="text" name="department" class="form-control" placeholder="e.g. Computer Science">
                                            </div>


                                            <div class="form-group mb-3">
                                                <label>Professor / Instructor</label>
                                                <input type="text" name="professor" class="form-control" placeholder="Dr. John Doe">
                                            </div>


                                            <div class="form-group mb-3">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control">
                                            </div>


                                            <div class="form-group mb-3">
                                                <label>Duration (e.g. 12 weeks)</label>
                                                <input type="text" name="duration" class="form-control" placeholder="12 weeks">
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group mb-3">
                                                <label>Course Price ($)</label>
                                                <input type="number" name="price" class="form-control" placeholder="99.99" step="0.01">
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Academic Year</label>
                                                <select name="year" class="form-select">
                                                    <option value="">Select Year</option>
                                                    <option>2024-2025</option>
                                                    <option>2025-2026</option>
                                                    <option>2026-2027</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Description</label>
                                                <textarea name="description" rows="5" class="form-control" placeholder="Write a detailed description..."></textarea>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Course Image</label>
                                                <div class="border border-dashed rounded p-4 text-center bg-light">
                                                    <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event)">
                                                    <div class="mt-3">
                                                        <img id="imagePreview" src="" alt="Preview" class="img-fluid rounded" style="max-height: 200px; display: none;">
                                                        <p class="text-muted mt-2 mb-0">Click to upload course thumbnail</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="text-end mt-4">
                                        <button type="submit" class="btn btn-primary btn-lg">
                                            <i class="bi bi-check-circle"></i> Create Course
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

@endsection

@push('scripts')
    <script>
        function previewImage(event) {
            const preview = document.getElementById('imagePreview');
            const file = event.target.files[0];

            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    preview.src = e.target.result;
                    preview.style.display = 'block';
                }
                reader.readAsDataURL(file);
            }
        }
    </script>
@endpush
