@extends('layouts.admin')


@section('content')
    <!-- HEADER -->
    <div class="header">

        <!-- Image -->
        <img src="{{ asset('img/covers/profile-cover-1.jpg') }}" class="header-img-top" alt="...">

        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body mt-n5 mt-md-n6">
                <div class="row align-items-end">
                    <div class="col-auto">

                        <!-- Avatar -->
                        <div class="avatar avatar-xxl header-avatar-top">
                            <img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}" alt="..."
                                class="avatar-img rounded-circle border border-4 border-body">
                        </div>

                    </div>
                    <div class="col mb-3 ml-n3 ml-md-n2">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Members
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Dianna Smiley
                        </h1>

                    </div>
                    <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">

                        <!-- Button -->
                        {{-- <a href="#!" class="btn btn-primary d-block d-md-inline-block lift">
            Subscribe
          </a> --}}

                    </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">


                    </div>
                </div>
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-8">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Personal Information</h2>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-thumb">
                                        <img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}" alt="">
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <!-- List group -->
                                    <div class="list-group list-group-flush my-n3">
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h5 class="mb-0">
                                                        Name
                                                    </h5>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Time -->
                                                    <time class="small text-muted" datetime="1988-10-24">
                                                        10/24/88
                                                    </time>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h5 class="mb-0">
                                                        Email
                                                    </h5>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Time -->
                                                    <time class="small text-muted" datetime="2018-10-28">
                                                        10/24/18
                                                    </time>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h5 class="mb-0">
                                                        Phone
                                                    </h5>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Text -->
                                                    <small class="text-muted">
                                                        Los Angeles, CA
                                                    </small>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h5 class="mb-0">
                                                        National ID
                                                    </h5>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Link -->
                                                    <a href="#!" class="small">
                                                        themes.getbootstrap.com
                                                    </a>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h5 class="mb-0">
                                                        Address
                                                    </h5>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Link -->
                                                    <a href="#!" class="small">
                                                        themes.getbootstrap.com
                                                    </a>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Update Personal Information</h2>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Name</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Phone</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">National ID</label>
                                        <input type="text" class="form-control form-control-sm">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label for="">Address</label>
                                        <textarea name="" id="" cols="30" rows="3" class="form-control"></textarea>
                                    </div>
                                </div>
                                <div class="col-md-12 text-right">
                                    <button class="btn btn-primary pull-right">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-12 col-xl-4">

                <!-- Card -->
                <div class="card">
                    <div class="card-body">

                        <!-- List group -->
                        <div class="list-group list-group-flush my-n3">
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Birthday
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Time -->
                                        <time class="small text-muted" datetime="1988-10-24">
                                            10/24/88
                                        </time>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Joined
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Time -->
                                        <time class="small text-muted" datetime="2018-10-28">
                                            10/24/18
                                        </time>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Location
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Text -->
                                        <small class="text-muted">
                                            Los Angeles, CA
                                        </small>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                            <div class="list-group-item">
                                <div class="row align-items-center">
                                    <div class="col">

                                        <!-- Title -->
                                        <h5 class="mb-0">
                                            Website
                                        </h5>

                                    </div>
                                    <div class="col-auto">

                                        <!-- Link -->
                                        <a href="#!" class="small">
                                            themes.getbootstrap.com
                                        </a>

                                    </div>
                                </div> <!-- / .row -->
                            </div>
                        </div>

                    </div>
                </div>

                <!-- Weekly Hours -->
                <div class="card">
                    <div class="card-header">

                        <!-- Title -->
                        <h4 class="card-header-title">
                            Weekly Hours
                        </h4>

                    </div>
                    <div class="card-body">

                        <!-- Chart -->
                        <div class="chart chart-sm">
                            <canvas id="weeklyHoursChart" class="chart-canvas"></canvas>
                        </div>

                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
    </div>
@endsection
