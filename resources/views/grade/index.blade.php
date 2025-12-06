@extends('layouts.app')

@section('title', 'Add Grade')

@section('content')

    <div class="container pt-2">
        <div class="card border-0 shadow-lg mb-4 border-start border-secondary border-5">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-1 fw-bold text-dark">
                            <i class="fa-solid fa-graduation-cap me-2 text-secondary"></i>
                            Registered Grades
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="card shadow" >
            <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                <form action="{{route('grade.import')}}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="row flex-grow-1">
                        <div class="input-group input-group-sm col-6" style="width: 320px">
                            <input type="file" name="import_file" class="form-control">
                            <button type="submit" class="btn btn-primary btn-sm">Import</button>
                        </div>
                    </div>
                </form>
                <form action="{{route('grade.export')}}" method="get">
                    <button type="submit" class="btn btn-primary btn-sm ms-1">Export</button>
                    <a href="{{route('grade.pdf')}}" type="button" class="btn btn-primary btn-sm">Export PDF</a>
                </form>
                <button type="button"
                        class="btn btn-outline-light btn-sm ms-auto"
                        data-create-url="{{ route('grade.create') }}">Add New Grade
                </button>
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
                                <td>
                                    <strong>{{ $grade->full_name }}</strong>
                                </td>
                                <td class='text-center'>
                                    <a href="{{route('grade.edit',$grade->id)}}" class="btn btn-warning btn-sm">
                                        Edit
                                    </a>
                                    <a href="{{route('grade.delete',$grade->id)}}" type="button"
                                       data-delete="grade" class="btn btn-danger btn-sm">
                                        Delete
                                    </a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

@endsection
