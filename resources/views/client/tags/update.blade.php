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
                 Edit Contact
                </h6>

                <!-- Title -->
                <h1 class="header-title">
             Edit Contact
                </h1>

              </div>
              <div class="col-auto">


                <a href="{{  route('tags.edit', $contact->tag_id) }}" class="btn btn-primary lift">
                 <i class="fa fa-chevron-left"></i>  Back
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
             Edit Contact
            </h2>
          </div>
          <div class="card-body">
              @if (session('message'))
                  <div class="alert alert-success">
                      <a href="" data-dismiss="alert" class="close">&times;</a>
                      <p>{{ session('message') }}</p>
                  </div>
              @endif
            <form action="{{ route('tag-contacts.update', $id) }}" method="POST">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label for="">First Name</label>
                    <input type="text" value="{{ $contact->first_name}}" class="form-control" name="first_name">
                    <input type="hidden" name="tag_id" value="{{ $contact->tag_id }}">
                    @error('first_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Last Name</label>
                    <input type="text" class="form-control" name="last_name" value="{{ $contact->last_name }}">
                    @error('last_name')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Email</label>
                    <input type="email" class="form-control" name="email" value="{{ $contact->email}}">
                    @error('email')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <label for="">Phone Number</label>
                    <input type="text" class="form-control" name="phone" value="{{$contact->phone}}">
                    @error('phone')
                        <p class="text-danger">{{ $message }}</p>
                    @enderror
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary pull-right">Update</button>
                    <a href="{{  route('tags.edit', $contact->tag_id) }}" class="btn btn-warning text-white mx-3 pull-right">Cancel</a>
                </div>
            </form>
          </div>
        </div>
      </div>
@endsection
