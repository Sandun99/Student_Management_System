@extends('layouts.app')

@section('title', 'All Subjects')

@section('content')

    <div class="container pt-2">
        <div class="card border-0 shadow-lg mb-4 border-start border-secondary border-5">
            <div class="card-body p-4">
                <div class="row align-items-center">
                    <div class="col-md-8">
                        <h2 class="mb-1 fw-bold text-dark">
                            <i class="bi bi-book me-2 text-secondary"></i>
                            Registered Subjects
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
                        <form action="{{route('subject.import')}}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="row flex-grow-1">
                                <div class="input-group input-group-sm col-6" style="width: 320px">
                                    <input type="file" name="import_file" class="form-control">
                                    <button type="submit" class="btn btn-primary btn-sm">Import</button>
                                </div>
                            </div>
                        </form>
                        <div class="btn-group ms-1" role="group">
                            <button type="button" class="btn btn-primary btn-sm dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">
                                Export As
                            </button>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <form data-export action="{{ route('subject.export') }}" method="get" class="d-inline">
                                        <input type="hidden" name="search">
                                        <button type="submit" class="dropdown-item">
                                            Export Excel
                                        </button>
                                    </form>
                                </li>
                                <li>
                                    <form data-export action="{{ route('subject.pdf') }}" method="get" class="d-inline">
                                        <input type="hidden" name="search">
                                        <button type="submit" class="dropdown-item">
                                            Export PDF
                                        </button>
                                    </form>
                                </li>
                            </ul>
                        </div>
                        <div class="flex-grow-1"></div>
                        <div class="d-flex align-items-center gap-3">
                            <form class="d-flex mb-0 ms-auto" onsubmit="return false;">
                                <input id="globalSearchInput" placeholder="Search..." class="form-control form-control-sm me-2">
                            </form>
                            <button type="button"
                                    class="btn btn-outline-light btn-sm ms-auto"
                                    data-create-url="{{ route('subject.create') }}">Add New Subject
                            </button>
                        </div>

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
