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
                                <form action="{{route('course.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="row">
                                        <div class="col-md-6">

                                            <div class="form-group mb-3">
                                                <label>Course Name <span class="text-danger">*</span></label>
                                                <input type="text" name="name" class="form-control" placeholder="Web Development Bootcamp" required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Course Code</label>
                                                <input type="text" name="code" class="form-control" placeholder="IT/012" required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Category</label>
                                                <select name="category" class="form-select">
                                                    <option value="Web Development">Web Development</option>
                                                    <option value="Mobile Development">Mobile Development</option>
                                                    <option value="Design">Design</option>
                                                    <option value="Data Science">Data Science</option>
                                                    <option value="Business">Business</option>
                                                </select>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Start Date</label>
                                                <input type="date" name="start_date" class="form-control"  required>
                                            </div>


                                            <div class="form-group mb-3">
                                                <label>Duration </label>
                                                <input type="text" name="duration" class="form-control" placeholder="(6 Months)"  required>
                                            </div>
                                        </div>

                                        <div class="col-md-6">

                                            <div class="form-group mb-3">
                                                <label>Course Price Rs.</label>
                                                <input type="number" name="price" class="form-control" placeholder="3000.00" step="0.01"  required>
                                            </div>

                                            <div class="form-group mb-3">
                                                <label>Subjects</label>
                                                <select name="subjects[]" id="subjects-select" class="form-select" multiple required>
                                                    @foreach($subjects ?? [] as $subject)
                                                        <option value="{{ $subject->id }}">
                                                            {{ $subject->name }} ({{ $subject->sub_code }})
                                                        </option>
                                                    @endforeach
                                                </select>
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
                                            Create Course
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>

    @push('scripts')
        <script>
            new TomSelect('#subjects-select', {
                plugins: ['remove_button'],
                placeholder: 'Search and select subjects...',
            });
        </script>
    @endpush
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

@endsection


