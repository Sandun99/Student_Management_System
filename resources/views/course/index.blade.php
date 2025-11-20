@extends('layouts.app')

@section('title', 'All Courses')

@section('content')

    <div class="container-fluid">
        <div class="row mb-4 align-items-center">
            <div class="col-sm-12">
                <h1 class="m-0 align-item-center">Add New Course</h1>
                <ol class="breadcrumb mt-1 justify-content-end">
                    <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Home</a></li>
                    <li class="breadcrumb-item"><a href="{{ route('course.index') }}">Courses</a></li>
                    <li class="breadcrumb-item active">Create</li>
                </ol>
            </div>

            <div class="col-sm-3">
                <form action="{{ route('course.index') }}" method="GET" class="d-flex">
                    <div class="input-group input-group-lg">
                        <input
                            type="text"
                            name="search"
                            class="form-control"
                            placeholder="Search courses..."
                            value="{{ request('search') }}"
                            aria-label="Search courses">
                        <button class="btn btn-primary" type="submit">
                            <i class="bi bi-search"></i>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <div class="courses-area">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner res-mg-b-30">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/1.jpg" alt=""></a>
                            <h2>Apps Development</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/2.jpg" alt=""></a>
                            <h2>Illustrator CC 2018</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner res-mg-t-30 dk-res-t-pro-30">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/3.jpg" alt=""></a>
                            <h2>Indesign cs6 2018</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner res-mg-t-30 dk-res-t-pro-30">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/1.jpg" alt=""></a>
                            <h2>Web Development</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row mg-b-15">
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner mg-t-30">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/1.jpg" alt=""></a>
                            <h2>Apps Development</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner mg-t-30">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/2.jpg" alt=""></a>
                            <h2>Illustrator CC 2018</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner mg-t-30">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/3.jpg" alt=""></a>
                            <h2>Indesign cs6 2018</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-sm-6 col-xs-12">
                    <div class="courses-inner mg-t-30">
                        <div class="courses-title">
                            <a href="#"><img src="img/courses/1.jpg" alt=""></a>
                            <h2>Web Development</h2>
                        </div>
                        <div class="courses-alaltic">
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-clock"></i></span> 1 Year</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-heart"></i></span> 50</span>
                            <span class="cr-ic-r"><span class="course-icon"><i class="fa fa-dollar"></i></span> 500</span>
                        </div>
                        <div class="course-des">
                            <p><span><i class="fa fa-clock"></i></span> <b>Duration:</b> 6 Months</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Professor:</b> Jane Doe</p>
                            <p><span><i class="fa fa-clock"></i></span> <b>Students:</b> 100+</p>
                        </div>
                        <div class="product-buttons">
                            <button type="button" class="button-default cart-btn">Read More</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
