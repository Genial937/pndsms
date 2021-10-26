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
              Change Profile
           </h6>

           <!-- Title -->
           <h1 class="header-title">
             Change Profile
           </h1>

         </div>
         <div class="col-auto">

           <!-- Button -->
           <a href="{{ route('my-profile.index') }}" class="btn btn-primary lift">
             <i class="fa fa-chevron-left"></i> Back
           </a>

         </div>
       </div> <!-- / .row -->
     </div> <!-- / .header-body -->

   </div>
 </div> <!-- / .header -->
 <div class="container-fluid">
   <div class="card">
       <div class="card-header">
           Change Profile
       </div>

       <div class="card-body">
        <ul class="nav nav-tabs nav-tabs-solid">
            <li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Update User Information</a></li>
            <li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab">Change Password</a></li>
        </ul>
        @if (session('msg'))
           <div class="alert alert-success">
               <a href="#" data-dismiss="alert" class="close">&times;</a>
               <p>{{ session('msg') }}</p>
           </div>
       @endif
        <div class="tab-content">
            <div class="tab-pane show active p-4" id="solid-tab1">
                <div class="card">
                    <div class="card-body">
                        @if (session('message'))
                            <div class="alert alert-success">
                                <a href="#" data-dismiss="alert" class="close">&times;</a>
                                <p>{{ session('message') }}</p>
                            </div>
                        @endif
                        <form action="{{ route('my-profile.update', auth()->user()->id) }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Email</label>
                                <input type="email" class="form-control" name="email" value="{{ auth()->user()->email }}">
                                @error('email')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Primary Contact Phone</label>
                                <input type="text" class="form-control" name="phone" value="{{ auth()->user()->primary_contact }}">
                                @error('phone')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Alternative Contact Phone</label>
                                <input type="text" class="form-control" name="alt_phone" value="{{ auth()->user()->alt_contact }}">
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-8">
                                        <label for="">Profile</label>
                                        <input type="file" class="form-control" name="profile" >
                                    </div>
                                    <div class="col-md-4">
                                        @if (auth()->user()->profile !== null)
                                        <a href=""><img src="{{ asset('img/profiles') }}/{{ auth()->user()->profile }}" alt=""  style="width:70px; height:70px; border-radius:50%"></a>
                                        @else
                                        <a href=""><img src="{{ asset('img/avatars/profiles/avatar-1.jpg') }}" alt=""  style="width:70px; height:70px; border-radius:50%"></a>
                                        @endif
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="tab-pane p-4" id="solid-tab2">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('pass.change', auth()->user()->id) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <label for="">Current Password</label>
                                <input type="password" class="form-control" name="current_password">
                                @error('current_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">New Password</label>
                                <input type="password" class="form-control" name="new_password">
                                @error('new_password')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" name="password_confirmation">
                                @error('password_confirmation')
                                    <p class="text-danger">{{ $message }}</p>
                                @enderror
                            </div>
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary pull-right">Update</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
       </div>
   </div>
  </div>
 </div>
@endsection
