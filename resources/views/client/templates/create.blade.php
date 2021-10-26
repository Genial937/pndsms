@extends('layouts.client')

@section('content')
<div class="header">
    <div class="container-fluid">

        <!-- Body -->
        <div class="header-body">
            <div class="row align-items-end">
                <div class="col">

                    <!-- Pretitle -->
                    <h6 class="header-pretitle">
                        Create SMS Templates
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                        Create SMS Templates
                    </h1>

                </div>
                <div class="col-auto">


                    <a href="{{ route('template.index') }}" class="btn btn-primary lift">
                        <i class="fa fa-chevron-left"></i> Back
                    </a>

                </div>
            </div> <!-- / .row -->
        </div> <!-- / .header-body -->

        <div class="page-body py-4">
            <div class="card">
                <div class="card-header">
                    <h2 class="card-title">
                        Create SMS Templates
                    </h2>
                </div>
                <div class="card-body">
                    @if (session('message'))
                        <div class="alert alert-success">
                            <a href="#" data-dismiss="alert" class="close">&times;</a>
                            <p>{{ session('message') }}</p>
                        </div>
                    @endif
                    <form action="{{ route('template.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label for="">Template name <span class="text-danger">*</span></label>
                            <input type="text" class="form-control" name="template_name">
                            @error('template_name')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Icon <span class="text-danger"></span></label>
                            <input type="file" class="form-control" name="icon">
                        </div>
                        <div class="form-group">
                            <label for="">Body <span class="text-danger">*</span></label>
                            <textarea name="body" class="form-control" id="" cols="30" rows="5"></textarea>
                            @error('body')
                                <p class="text-danger">{{ $message }}</p>
                            @enderror
                        </div>
                        <div class="from-group">
                            <button type="submit" class="btn btn-primary pull-right">Save</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div> <!-- / .header -->

@endsection
