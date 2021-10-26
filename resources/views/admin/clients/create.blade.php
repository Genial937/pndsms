@extends('layouts.admin')

@section('content')
    <!-- HEADER -->
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Clients
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Clients
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="{{ route('clients.index') }}" class="btn btn-primary lift">
                            <i class="fa fa-chevron-left"></i>  Back
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Add Client</h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <form action="{{ route('clients.store') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">User Name<span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control">
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Company Name<span class="text-danger">*</span></label>
                                <input type="text" name="company_name" class="form-control">
                                @error('company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Primary Contact Phone<span class="text-danger">*</span></label>
                                <input type="text" name="phone" class="form-control">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Alternative Contact Phone</label>
                                <input type="text" name="alt_phone" class="form-control">
                                @error('alt_phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">API Key</label>
                                <input type="text" name="api_key" class="form-control">
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sender ID</label>
                                <input type="text" name="sender_id" class="form-control">
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Location</label>
                                <input type="text" name="location" class="form-control">
                                @error('location')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="">Address</label>
                                <textarea name="address" class="form-control" id="" cols="30" rows="5"></textarea>
                                @error('address')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Save</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
