@extends('layouts.app')


@section('content')


    <!-- Breadcome Area -->
    <div class="breadcome-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="breadcome-list">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="breadcome-heading">
                                    <form role="search" class="sr-input-func">
                                        <input type="text" placeholder="Search..." class="search-int form-control">
                                        <a href="#"><i class="fa fa-search"></i></a>
                                    </form>
                                </div>
                            </div>
                            <div class="col-lg-6">
                                <ul class="breadcome-menu">
                                    <li><a href="#">Home</a> <span class="bread-slash">/</span></li>
                                    <li><span class="bread-blod">Dashboard</span></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- All your dashboard content goes here -->
    <!-- Copy everything from inside <div class="all-content-wrapper"> after header -->
    <!-- Until before footer -->

    <div class="analytics-sparkle-area mg-t-30">
        <div class="container-fluid">
            <div class="row">

                <!-- Total Courses -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30">
                        <div class="analytics-content">
                            <h5>Total Courses</h5>
                            <h2 class="counter">12</h2>
                            <span class="text-info">Active Programs</span>
                            <div class="progress">
                                <div class="progress-bar bg-info" style="width: 85%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Classes -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 res-mg-t-30">
                        <div class="analytics-content">
                            <h5>Total Classes</h5>
                            <h2 class="counter">48</h2>
                            <span class="text-success">Running Batches</span>
                            <div class="progress">
                                <div class="progress-bar bg-success" style="width: 70%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Teachers -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line reso-mg-b-30 res-mg-t-30">
                        <div class="analytics-content">
                            <h5>Total Teachers</h5>
                            <h2 class="counter">89</h2>
                            <span class="text-warning">Faculty Members</span>
                            <div class="progress">
                                <div class="progress-bar bg-warning" style="width: 92%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Total Students -->
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="analytics-sparkle-line res-mg-t-30">
                        <div class="analytics-content">
                            <h5>Total Students</h5>
                            <h2 class="counter">1,248</h2>
                            <span class="text-danger">Enrolled This Year</span>
                            <div class="progress">
                                <div class="progress-bar bg-danger" style="width: 98%;"></div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>

    <!-- EXTRA STATISTICS -->

    <div class="product-sales-chart mg-t-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="white-box analytics-info-cs">
                        <h3 class="box-title">Total Subjects</h3>
                        <ul class="list-inline two-part-sp">
                            <li><i class="fa fa-book text-purple"></i></li>
                            <li class="text-right"><span class="counter">156</span></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-12">
                    <div class="white-box analytics-info-cs">
                        <h3 class="box-title">Grades Recorded</h3>
                        <ul class="list-inline two-part-sp">
                            <li><i class="fa fa-star text-success"></i></li>
                            <li class="text-right"><span class="counter">8,420</span></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Add this script at the end for counter animation -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Counter-Up/1.0.0/jquery.counterup.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/waypoints/4.0.1/jquery.waypoints.min.js"></script>
    <script>
        jQuery(document).ready(function($) {
            $('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        });
    </script>

    <!-- EXTRA STATISTICS ROW -->
    <div class="product-sales-chart mg-t-30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-6">
                    <div class="sparkline10-list shadow-reset">
                        <div class="sparkline10-hd">
                            <div class="main-sparkline10-hd">
                                <h1>Subjects Overview</h1>
                            </div>
                        </div>
                        <div class="sparkline10-graph">
                            <div class="basic-login-form-ad">
                                <h3>Total Subjects: <strong>23</strong></h3>
                                <h4>Across all courses</h4>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="sparkline11-list shadow-reset">
                        <div class="sparkline11-hd">
                            <div class="main-sparkline11-hd">
                                <h1>Grades Recorded</h1>
                            </div>
                        </div>
                        <div class="sparkline11-graph">
                            <div class="basic-login-form-ad">
                                <h3>Total Grades: <strong>51</strong></h3>
                                <h4>Student performance tracked</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Keep pasting all sections until the end -->

@endsection
