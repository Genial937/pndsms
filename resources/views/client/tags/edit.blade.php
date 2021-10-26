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
                            Tag Contacts
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Tag Contacts
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
        <div class="row">
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2>Add contact to {{ $tag->tag_name }}</h2>
                    </div>
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                <a href="" data-dismiss="alert" class="close">&times;</a>
                                <p>{{ session('message') }}</p>
                            </div>
                        @endif
                        <form action="{{ route('tag-contacts.store') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control">
                                <input type="hidden" name="tag_id" value="{{ $id }}">
                                @error('first_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Last Name</label>
                                <input type="text" name="last_name" class="form-control">
                                @error('last_name')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" name="phone" class="form-control">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" name="email" class="form-control">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right"><i class="fe fe-send"></i>
                                    Add</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">
                        <h2>{{ $tag->tag_name }} Contact List</h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <th>#</th>
                                <th>Name</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Date created</th>
                                <th>Action</th>
                            </thead>
                            <tbody>
                                @php($count=1)
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                    <td>{{ date('M d, Y', strtotime($contact->created_at)) }}</td>
                                    <td>
                                        <a href="{{ route('tag-contacts.show', $contact->id) }}"
                                            class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                        <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @endsection
