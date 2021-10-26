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
                            Schedule Broadcast
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Schedule Broadcast
                        </h1>

                    </div>
                    <div class="col-auto">


                        <a href="{{ route('broadcast.index') }}" class="btn btn-primary lift">
                            All Broadcasts
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Set a specific date, time and frequency for your broadcast</h2>
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Broadcast Name</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Time Zone</label>
                                <select name="" class="form-control" id="">
                                    <option value="" selected disabled>Select</option>
                                    <option value="">Africa/Nairobi(+3:00 GMT) </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Schedule Time</label>
                                <input type="text" class="form-control" placeholder="HH:mm">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Repeat Cycle</label>
                                <select name="" class="form-control" id="">
                                    <option value="" selected disabled>Select</option>
                                    <option value="">Once </option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Days</label>
                                <select name="" id="" class="form-control">
                                    <option value="" disabled selected>Select Days</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Last Day(Optional)</label>
                                <input type="text" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Message</label>
                                <textarea name="" class="form-control" id="" cols="30" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="">Template</label>
                                <select name="" class="form-control" id="">
                                    <option value="" disabled selected>Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <button class="btn btn-primary pull-right">Save</button>
                                <a href="" class="btn btn-warning text-white mx-2 pull-right">Cancel</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
