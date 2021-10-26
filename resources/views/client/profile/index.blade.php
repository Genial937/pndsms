@extends('layouts.client')


@section('content')
    <!-- HEADER -->
    <div class="header">

        <!-- Image -->
        {{-- <img src="{{ asset('img/covers/profile-cover-1.jpg') }}" class="header-img-top" alt="..."> --}}

        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body mt-n5 mt-md-n6">
                <div class="row align-items-end">
                    <div class="col-auto">

                        <!-- Avatar -->
                        {{-- <div class="avatar avatar-xxl header-avatar-top">
                           @if (auth()->user()->profile !== null)
                           <img src="{{ asset('img/profiles') }}/{{ auth()->user()->profile }}" alt="..."
                           class="avatar-img rounded-circle border border-4 border-body">
                           @else
                           <img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}" alt="..."
                           class="avatar-img rounded-circle border border-4 border-body">
                           @endif
                        </div> --}}

                    </div>
                    <div class="col mb-3 ml-n3 ml-md-n2">

                        <!-- Pretitle -->
                        {{-- <h6 class="header-pretitle">
                            {{ auth()->user()->username }}
                        </h6> --}}

                        <!-- Title -->
                        {{-- <h1 class="header-title">
                            {{ auth()->user()->name }}
                        </h1> --}}

                    </div>
                    <div class="col-12 col-md-auto mt-2 mt-md-0 mb-md-3">

                     <!-- Button -->
                        {{-- <a href="{{ route('my-profile.show', auth()->user()->id) }}" class="btn btn-primary d-block d-md-inline-block lift">
                               Change Profile
                        </a> --}}

                    </div>
                </div> <!-- / .row -->
                <div class="row align-items-center">
                    <div class="col">

                        <a href="{{ route('my-profile.show', auth()->user()->id) }}" class="btn btn-primary d-block d-md-inline-block lift pull-right" style="margin-top: 20px">
                            Change Profile
                     </a>
                    </div>
                </div>
            </div> <!-- / .header-body -->

        </div>
    </div>

    <!-- CONTENT -->
    <div class="container-fluid">
        <div class="row">
            <div class="col-12 col-xl-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">User Information</h2>
                    </div>
                    <div class="card-body">
                        <form action="">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="img-thumb">
                                     @if (auth()->user()->profile !== null)
                                     <img src="{{ asset('img/profiles') }}/{{ auth()->user()->profile }}" alt="">
                                     @else
                                     <img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}" alt="">
                                     @endif
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
                                                        {{ auth()->user()->name }}
                                                        {{-- {{ date('M d, Y', strtotime(auth()->user()->created_at)) }} --}}
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
                                                        {{ auth()->user()->email }}
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
                                                        {{ auth()->user()->primary_contact }}
                                                    </small>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h5 class="mb-0">
                                                       Username
                                                    </h5>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Link -->
                                                    <a href="#!" class="small">
                                                        {{ auth()->user()->username }}
                                                    </a>

                                                </div>
                                            </div> <!-- / .row -->
                                        </div>
                                        <div class="list-group-item">
                                            <div class="row align-items-center">
                                                <div class="col">

                                                    <!-- Title -->
                                                    <h5 class="mb-0">
                                                       Api Key
                                                    </h5>

                                                </div>
                                                <div class="col-auto">

                                                    <!-- Link -->
                                                    <a href="#!" class="small">
                                                        {{ $token->password }}
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
                {{-- <div class="card">
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
                </div> --}}
            </div>

        </div> <!-- / .row -->
    </div>
@endsection
