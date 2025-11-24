@extends('layouts.app')

@section('title', 'Add Class')

@section('content')

    <div class="bg-primary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">Add New Class</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('class.index') }}" class="text-decoration-none">Classes</a></li>
                        <li class="breadcrumb-item active">Create</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="container-fluid pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-7">
                <div class="card border-0 shadow-sm">
                    <div class="card-header bg-primary text-white">
                        <ul class="nav nav-tabs card-header-tabs" id="classTab" role="tablist">

                        </ul>
                    </div>

                    <div class="card-body p-4 p-lg-5">
                        <div class="tab-content" id="classTabContent">
                            <div class="tab-pane fade show active" id="details" role="tabpanel">
                                <form action="{{route('class.store')}}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-4">
                                        <label for="className" class="form-label fw-semibold">
                                            Class Name
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="className"
                                            name="name"
                                            class="form-control form-control-lg"
                                            placeholder="Enter class name"
                                            required>
                                    </div>

                                    <div class="mb-4">
                                        <label for="classCode" class="form-label fw-semibold">
                                            Class Code
                                            <span class="text-danger">*</span>
                                        </label>
                                        <input
                                            type="text"
                                            id="classCode"
                                            name="code"
                                            class="form-control form-control-lg"
                                            placeholder="CL/001"
                                            required>
                                    </div>

                                    <div class="d-flex gap-2 justify-content-end mt-5">
                                        <button type="submit" class="btn btn-primary px-4">
                                            Create Class
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

