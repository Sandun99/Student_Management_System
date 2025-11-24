@extends('layouts.app')

@section('title', 'Add Grade')

@section('content')

    <div class="container mt-5">

        <div class="card shadow" >
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <div class="flex-grow-1 text-center">
                    <h4 class="mb-0">Registered Grades</h4>
                </div>
                <a href="{{ route('grade.create') }}" class="btn btn-light btn-sm">
                    <i class="bi bi-plus-lg"></i> Add New Grade
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover align-middle" id="gradesTable">
                        <thead class="table-dark">
                        <tr>
                            <th>Grade Code</th>
                            <th>Grade Name</th>
                            <th class="text-center">Action</th>
                        </tr>
                        </thead>
                        <tbody id="gradesBody">
                        @foreach($grades as $grade)
                            <tr data-id="{{ $grade->id }}">
                                <td><strong>{{ $grade->code }}</strong></td>
                                <td>Grade: {{ $grade->name }}</td>
                                <td class='text-center'>
                                    <button type="button" class="btn btn-warning btn-sm"
                                            onclick="loadUpdateForm({{ $grade->id }})">Update
                                    </button>
                                    <button type="button" class="btn btn-danger btn-sm"
                                            onclick="deleteStudent({{ $grade->id }})">Delete
                                    </button>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

{{--    <div class="modal fade" id="registerModal" tabindex="-1"--}}
{{--         aria-labelledby="registerModalLabel" aria-hidden="true"--}}
{{--         data-bs-backdrop="static" data-bs-keyboard="false">--}}
{{--        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">--}}
{{--            <div class="modal-content shadow rounded-3 overflow-hidden">--}}

{{--                <div class="modal-header border-0 py-4 position-relative overflow-hidden d-flex justify-content-center align-items-center" style="min-height:80px;">--}}
{{--                    <div class="position-absolute start-0 top-0 w-100 h-100"--}}
{{--                         style="background:url('https://images.unsplash.com/photo-1557682250-33bd709cbe85?auto=format&fit=crop&w=1350&q=80') center/cover;"></div>--}}
{{--                    <div class="position-absolute start-0 top-0 w-100 h-100"></div>--}}

{{--                    <h5 class="modal-title fs-4 fw-bold text-white mb-0" style="z-index:1;">Student Registration</h5>--}}
{{--                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"--}}
{{--                            aria-label="Close"></button>--}}
{{--                </div>--}}

{{--                <div class="modal-body p-4 p-md-5 bg-light">--}}
{{--                    @include('register')--}}
{{--                </div>--}}

{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="modal fade" id="updateModal" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">--}}
{{--            <div class="modal-content shadow rounded-3 overflow-hidden">--}}

{{--                <div class="modal-header border-0 py-4 position-relative overflow-hidden d-flex justify-content-center align-items-center" style="min-height:80px;">--}}
{{--                    <div class="position-absolute start-0 top-0 w-100 h-100"--}}
{{--                         style="background:url('https://images.unsplash.com/photo-1557682250-33bd709cbe85?auto=format&fit=crop&w=1350&q=80') center/cover;"></div>--}}
{{--                    <div class="position-absolute start-0 top-0 w-100 h-100"></div>--}}

{{--                    <h5 class="modal-title fs-4 fw-bold text-white mb-0" style="z-index:1;">Update Student</h5>--}}
{{--                    <button type="button" class="btn-close btn-close-white position-absolute top-0 end-0 me-3 mt-3"--}}
{{--                            data-bs-dismiss="modal" style="z-index:1;">--}}
{{--                    </button>--}}
{{--                </div>--}}

{{--                <div id="updateModalBody">--}}
{{--                    <div class="modal-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <div class="spinner-border text-primary" role="status">--}}
{{--                                <span class="visually-hidden">Loading...</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

{{--    <div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">--}}
{{--        <div class="modal-dialog modal-md modal-dialog-centered modal-dialog-scrollable">--}}
{{--            <div class="modal-content shadow rounded-3 overflow-hidden">--}}

{{--                <div class="modal-header border-0 py-4 position-relative overflow-hidden d-flex justify-content-center align-items-center" style="min-height:80px;">--}}
{{--                    <div class="position-absolute start-0 top-0 w-100 h-100"--}}
{{--                         style="background:url('https://images.unsplash.com/photo-1557682250-33bd709cbe85?auto=format&fit=crop&w=1350&q=80') center/cover;"></div>--}}
{{--                    <div class="position-absolute start-0 top-0 w-100 h-100"></div>--}}

{{--                    <h5 class="modal-title fs-5 fw-bold text-dark mb-0" style="z-index:1;">--}}
{{--                        Student Details--}}
{{--                    </h5>--}}
{{--                </div>--}}

{{--                <div id="viewModalBody">--}}
{{--                    <div class="modal-body p-4">--}}
{{--                        <div class="text-center">--}}
{{--                            <div class="spinner-border text-primary" role="status">--}}
{{--                                <span class="visually-hidden">Loading...</span>--}}
{{--                            </div>--}}
{{--                        </div>--}}
{{--                    </div>--}}
{{--                </div>--}}
{{--            </div>--}}
{{--        </div>--}}
{{--    </div>--}}

@endsection
