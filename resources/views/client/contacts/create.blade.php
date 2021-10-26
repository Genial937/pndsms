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
                            Add Contacts
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Add Contact
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
                    Add Contact
                </h2>
            </div>
            <div class="card-body">
                @if (session('message'))
                    <div class="alert alert-success">
                        <a href="" data-dismiss="alert" class="close">&times;</a>
                        <p>{{ session('message') }}</p>
                    </div>
                @endif
                <form action="{{ route('contacts.store') }}" method="POST">
                    @csrf
                    <div class="form-group">
                        <label for="">First Name</label>
                        <input type="text" class="form-control" name="first_name" required>
                        @error('first_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Last Name</label>
                        <input type="text" class="form-control" name="last_name" required>
                        @error('last_name')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Email</label>
                        <input type="email" class="form-control" name="email">
                        @error('email')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Phone Number</label>
                        <input type="number" class="form-control" name="phone" placeholder="07...." required>
                        @error('phone')
                            <p class="text-danger">{{ $message }}</p>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="">Tag</label>
                        <select name="tags[]" class="form-control" id="tags" multiple>
                            <option value="" disabled>Select</option>
                           @foreach ($tags as $tag)
                           <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                           @endforeach

                        </select>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary pull-right">Save</button>
                        <a href="{{ route('contacts.index') }}"
                            class="btn btn-warning text-white mx-3 pull-right">Cancel</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
