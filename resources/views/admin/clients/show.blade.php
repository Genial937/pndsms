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
                            Edit Client
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Edit Client
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
                <h2 class="card-title">Edit Client</h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <form action="{{ route('clients.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Username<span class="text-danger">*</span></label>
                                <input type="text" name="username" class="form-control" value="{{ $client->username }}">
                                @error('username')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Company Name<span class="text-danger">*</span></label>
                                <input type="text" name="company_name" class="form-control" value="{{ $client->name }}">
                                @error('company_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Email<span class="text-danger">*</span></label>
                                <input type="email" name="email" class="form-control" value="{{ $client->email }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Service Provider</label>
                                <select name="provider" id="" class="form-control">
                                    <option value="{{ $client->provider}}">{{ $client->provider == 'at' ? 'Africas Talking' : 'Mobitechnologies' }}</option>
                                    @foreach ($providers as $provider)
                                    <option value="{{ $provider->provider_username }}">{{ $provider->provider_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Sender ID</label>
                                <input type="text" name="sender_id" class="form-control" value={{ $client->sender_id }}>
                            </div>
                         </div>
                         <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Api Key</label>
                                <input type="text" name="api_key" class="form-control" value="{{ $client->api_key }}">
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
