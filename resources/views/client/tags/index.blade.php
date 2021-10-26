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
                            Tags
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Tags
                        </h1>

                    </div>
                    <div class="col-auto">


                        <a href="{{ route('tags.create') }}" class="btn btn-primary lift">
                            Add Tag
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->

    <div class="page-body py-4 container-fluid ">
        <div class="row">
            {{-- <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">Add Contact To Tag</h2>
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
                                <label for="">Select Tag</label>
                                <select name="tag_id" id="" class="form-control">
                                    <option value="" disabled selected>Select</option>
                                    @foreach ($tags as $tag)
                                    <option value="{{ $tag->id }}">{{ $tag->tag_name }}</option>
                                    @endforeach
                                </select>
                                @error('tag_id')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">First Name</label>
                                <input type="text" name="first_name" class="form-control">
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
            </div> --}}
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2 class="card-title">
                            Tags List
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm table-stripped">
                            <thead>
                                <th>Tag Name</th>
                                <th>Date Created</th>
                                <th>No of Contacts</th>
                                <th>ACtion</th>
                            </thead>
                            <tbody>
                                @foreach ($tags as $tag)
                                @php
                                $contacts = App\Models\Audience::where('tag_id', $tag->id)->get()->count();
                                @endphp
                                <tr>
                                    <td>{{ $tag->tag_name }}</td>
                                    <td>{{ date('M d, Y', strtotime($tag->created_at)) }}</td>
                                    <td>{{ $tag->contacts->count() }}</td>
                                    <td style="display: flex;">
                                        <a href="{{ route('tags.show', $tag->id) }}" class="btn btn-success btn-sm mr-1"><i
                                                class="fa fa-pencil"></i></a>
                                        <form action="{{ route('tags.destroy', $tag->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>

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
