@extends('layouts.app')

@section('title', 'All Subjects')

@section('content')

    <div class="bg-secondary bg-opacity-10 py-5 mb-4">
        <div class="container-fluid">
            <div class="d-flex justify-content-between align-items-center flex-wrap gap-3">
                <h1 class="h2 fw-bold mb-0">All Subjects</h1>
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb mb-0">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}" class="text-decoration-none">Home</a></li>
                        <li class="breadcrumb-item active">Subjects</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <div class="container pb-5">
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card shadow">
                    <div class="card-header bg-secondary text-white d-flex justify-content-between align-items-center">
                        <div class="flex-grow-1 text-center">
                            <h4 class="mb-0">Registered Subjects</h4>
                        </div>
                        <form class="d-flex mb-0" onsubmit="return false;">
                            <input id="globalSearchInput" placeholder="Search..." class="form-control form-control-sm me-2">
                        </form>
                        <a href="{{ route('subject.create') }}" class="btn btn-light btn-sm">
                            <i class="bi bi-plus-lg"></i> Add New Subject
                        </a>
                    </div>

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-hover align-middle">
                                <thead class="table-dark">
                                <tr>
                                    <th>Subject Code</th>
                                    <th>Subject Name</th>
                                    <th class="text-center">Action</th>
                                </tr>
                                </thead>
                                <tbody id="searchableTable">
                                @foreach($subjects as $subject)
                                    <tr data-id="{{ $subject->id }}">
                                        <td><strong>{{ $subject->sub_code }}</strong></td>
                                        <td>{{ $subject->name }}</td>
                                        <td class="text-center">
                                            <a href="{{route('subject.edit',$subject->id)}}" class="btn btn-warning btn-sm">
                                                Edit
                                            </a>
                                            <a href="{{route('subject.delete',$subject->id)}}" type="button"
                                               data-delete="subject" class="btn btn-danger btn-sm">
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
