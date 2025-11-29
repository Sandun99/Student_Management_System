@extends('layouts.app')

@section('title', 'Dashboard')

@push('styles')
    <style>
        .dashboard-header{
            background:linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            color: white;
            padding: 3rem 0 2rem;
            margin-top: -1rem;
            margin-bottom: 2rem;
            border-radius: 0 0 50px 50px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
        }
    </style>
@endpush
@section('content')

    <div class="dashboard-header">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <h1 class="display-4 fw-bold mb-2">
                        <i class="bi bi-speedometer2 me-2"></i>
                        Dashboard
                    </h1>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <!--begin::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 1-->
                <div class="small-box text-bg-primary">
                    <div class="inner">
                        <h3>{{$totalTeachers}}</h3>
                        <p>Total Teachers</p>
                    </div>
                    <a href="{{route('teacher.teacher.index')}}" class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover">
                        View Teachers <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
                <!--end::Small Box Widget 1-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 2-->
                <div class="small-box text-bg-success">
                    <div class="inner">
                        <h3>{{$totalStudents}}</h3>
                        <p>Total Students</p>
                    </div>
                    <a
                        href="{{route('student.index')}}"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                    >
                        View Students <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
                <!--end::Small Box Widget 2-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 3-->
                <div class="small-box text-bg-warning">
                    <div class="inner">
                        <h3>{{$totalCourses}}</h3>
                        <p>Total Courses</p>
                    </div>
                    <a
                        href="{{route('course.index')}}"
                        class="small-box-footer link-dark link-underline-opacity-0 link-underline-opacity-50-hover"
                    >
                        View Course <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
                <!--end::Small Box Widget 3-->
            </div>
            <!--end::Col-->
            <div class="col-lg-3 col-6">
                <!--begin::Small Box Widget 4-->
                <div class="small-box text-bg-danger">
                    <div class="inner">
                        <h3>{{$totalSubjects}}</h3>
                        <p>Total Subjects</p>
                    </div>
                    <a
                        href="{{route('subject.index')}}"
                        class="small-box-footer link-light link-underline-opacity-0 link-underline-opacity-50-hover"
                    >
                        View Subjects <i class="bi bi-link-45deg"></i>
                    </a>
                </div>
                <!--end::Small Box Widget 4-->
            </div>
            <!--end::Col-->
        </div>
    </div>

@endsection

@push('scripts')
@endpush
