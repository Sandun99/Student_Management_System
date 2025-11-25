@extends('layouts.app')

@section('title', 'Add Teacher')

@section('content')

    <div class="container-fluid">
        <div class="row mb-4 align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center position-relative">
                    <h1 class="m-0">Add New Teacher</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none text-muted">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('teacher.teacher.index') }}" class="text-decoration-none text-muted">Teachers</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12">
            <div class="card card-primary card-outline card-tabs">
                <div class="card-header p-0 pt-1 border-bottom-0">
                    <ul class="nav nav-tabs" id="teacherTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="basic-tab" data-bs-toggle="pill" href="#basic" role="tab">
                                <i class="bi bi-person me-1"></i> Basic Information
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="teacherTabContent">

                        <div class="tab-pane fade show active" id="basic" role="tabpanel">
                            <form action="{{route('teacher.teacher.store')}}" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group mb-3">
                                            <label>Full Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Teacher ID <span class="text-danger">*</span></label>
                                            <input type="text" name="t_id" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Email <span class="text-danger">*</span></label>
                                            <input type="text" name="email" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>NIC <span class="text-danger">*</span></label>
                                            <input type="text" name="nic" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Date of Birth</label>
                                            <input type="date" name="dob" class="form-control">
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Gender <span class="text-danger">*</span></label>
                                            <select name="gender" class="form-select" required>
                                                <option value="" disabled selected>Select Gender</option>
                                                <option value="male">Male</option>
                                                <option value="female">Female</option>
                                            </select>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Mobile Number <span class="text-danger">*</span></label>
                                            <input type="text" name="mobile" class="form-control" placeholder="" required>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>Address</label>
                                            <textarea name="address" rows="3" class="form-control" placeholder=""></textarea>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="row">
                                            <div class="col-4">
                                                <div class="form-group mb-3">
                                                    <label>Course </label>
                                                    <select name="course_id" class="form-select" required>
                                                        <option value="">Select Course</option>
                                                        @foreach($courses as $course)
                                                            <option value="{{ $course->id }}">
                                                                {{ $course->name }} {{ $course->code ? '('. $course->code .')' : '' }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mb-3">
                                                    <label>Subject <span class="text-danger">*</span></label>
                                                    <select name="subject_id" class="form-select" required>
                                                        <option value="">Select Subject</option>
                                                        @foreach($subjects as $subject)
                                                            <option value="{{ $subject->id }}">{{ $subject->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-4">
                                                <div class="form-group mb-3">
                                                    <label>Grade <span class="text-danger">*</span></label>
                                                    <select name="grade_id" class="form-select" required>
                                                        <option value="">Select Grade</option>
                                                        @foreach($grades as $grade)
                                                            <option value="{{ $grade->id }}">{{ $grade->name }}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row">
                                            <div class="col-6">
                                                <div class="form-group mb-3">
                                                    <label>Username</label>
                                                    <input type="text" name="username" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                            <div class="col-6">
                                                <div class="form-group mb-3">
                                                    <label>Password</label>
                                                    <input type="password" name="password" class="form-control" placeholder="">
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group mb-3">
                                            <label>NIC Front</label>
                                            <div class="border border-dashed rounded p-4 text-center bg-light">
                                                <input type="file" name="image" class="form-control" accept="image/*" onchange="previewImage(event, 'teacherPreview')">
                                                <div class="mt-3">
                                                    <img id="teacherPreview" src="" alt="Preview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group mb-3">
                                            <label>NIC Back</label>
                                            <div class="border border-dashed rounded p-4 text-center bg-light">
                                                <input type="file" name="image_2" class="form-control" accept="image/*" onchange="previewImage(event, 'teacherPreview')">
                                                <div class="mt-3">
                                                    <img id="teacherPreview" src="" alt="Preview" class="img-fluid rounded-circle" style="width: 150px; height: 150px; object-fit: cover; display: none;">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
                                        Create Teacher
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
        function previewImage(event, previewId = 'imagePreview') {
            const preview = document.getElementById(previewId);
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
