@extends('layouts.app')

@section('title', 'Add Grade')

@section('content')

    <div class="container-fluid">
        <div class="row mb-4 align-items-center">
            <div class="col-12">
                <div class="d-flex justify-content-between align-items-center position-relative">
                    <h1 class="m-0">Add New Grade</h1>
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none text-muted">Home</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('grade.index') }}" class="text-decoration-none text-muted">Grades</a></li>
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
                    <ul class="nav nav-tabs" id="gradeTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="details-tab" data-bs-toggle="pill" href="#details" role="tab">
                                Grade Details
                            </a>
                        </li>
                    </ul>
                </div>

                <div class="card-body">
                    <div class="tab-content" id="gradeTabContent">
                        <div class="tab-pane fade show active" id="details" role="tabpanel">
                            <form action="" method="POST">
                                @csrf

                                <div class="row">
                                    <div class="col-md-6">

                                        <div class="form-group mb-3">
                                            <label>Grade Name <span class="text-danger">*</span></label>
                                            <input type="text" name="name" class="form-control" placeholder="" required>
                                        </div>

                                    </div>

                                    <div class="col-md-6">

                                        <div class="form-group mb-3">
                                            <label>Remarks</label>
                                            <select name="remark" class="form-select">
                                                <option value="Outstanding">Outstanding</option>
                                                <option value="Excellent">Excellent</option>
                                                <option value="Very Good">Very Good</option>
                                                <option value="Good">Good</option>
                                                <option value="Average">Average</option>
                                                <option value="Pass">Pass</option>
                                                <option value="Fail">Fail</option>
                                            </select>
                                        </div>

                                    </div>
                                </div>

                                <div class="text-end mt-4">
                                    <button type="submit" class="btn btn-primary btn-lg">
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

@endsection
