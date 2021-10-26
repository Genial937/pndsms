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
                            SMS Providers
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            SMS Providers
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="{{ route('providers.index') }}" class="btn btn-primary lift">
                          SMS Provider
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Add SMS Providers</h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                     <div class="alert alert-success">
                         <a href="#" data-dismiss="alert" class="close">&times;</a>
                         <p>{{ session('message') }}</p>
                     </div>
                @endif
                <form action="{{ route('providers.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">Provider Name</label>
                        <input type="text" name="provider_name" class="form-control">
                        @error('provider_name')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Username</label>
                        <input type="text" name="provider_username"  class="form-control" placeholder="i.e at, mobi">
                        @error('provider_username')
                            <p class="text-danger">{{$message}}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Rate</label>
                        <input type="text" name="rate" class="form-control">
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
