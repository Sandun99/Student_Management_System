@extends('layouts.app')

@section('title', 'All Classes')

@section('content')

    <div class="container pt-2">
        <div class="card border-0 shadow-lg mb-4 border-start border-secondary border-5">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-1 fw-bold text-dark">
                            <i class="bi bi-anthropic me-2 text-secondary"></i>
                            Registered Classes
                        </h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 text-center">
                        </div>
                        <button type="button"
                                class="btn btn-outline-light btn-sm"
                                data-create-url="{{ route('class.create') }}">Add New Subject
                        </button>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>Class Code</th>
                                    <th>Class Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($classes as $class)
                                    <tr data-id="{{ $class->id }}">
                                        <td><strong>{{ $class->code }}</strong></td>
                                        <td>{{ $class->name }}</td>
                                        <td class="text-center">
                                            <a href="{{route('class.edit',$class->id)}}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>
                                            <a href="{{route('class.delete',$class->id)}}" type="button"
                                               data-delete="Class" class="btn btn-danger btn-sm">
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
        </div>
    </div>

@endsection
