@extends('layouts.client')

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
                            Edit Tag
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Edit Tag
                        </h1>

                    </div>
                    <div class="col-auto">


                        <a href="{{ route('tags.index') }}" class="btn btn-primary lift">
                            <i class="fa fa-chevron-left"></i> Back
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->

    <div class="page-body py-4 container-fluid ">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    Edit Tag
                </h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <form action="{{ route('tags.update', $id) }}" method="POST">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="">Tag Name</label>
                        <input type="text" class="form-control" name="tag_name" value="{{ $tag->tag_name }}">
                        <input type="hidden" name="id" value="{{ $id }}">
                        @error('tag_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Update</button>
                        <a href="{{ route('tags.index') }}" class="btn btn-warning text-white mx-3 pull-right">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
