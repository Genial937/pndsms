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
                            Import Contacts
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Import Contact
                        </h1>

                    </div>
                    <div class="col-auto">


                        <a href="{{ route('contacts.index') }}" class="btn btn-primary lift">
                            All Contacts
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
                    Import Contacts
                </h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="#" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <form action="{{ route('import.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Choose File (Excel or CSV should have name, phone and email fields) <span class="text-danger">*</span></label>
                        <input type="file" name="file" class="form-control" required>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
