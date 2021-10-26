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
                            Scheduled Broadcast
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Scheduled Broadcast
                        </h1>

                    </div>
                    <div class="col-auto">


                        <a href="{{ route('broadcast.create') }}" class="btn btn-primary lift">
                            Add Broadcast
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Scheduled Broadcasts</h2>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>Broadcast Name</th>
                        <th>Time Zone</th>
                        <th>Scheduled Time</th>
                        <th>Repeat Cycle</th>
                        <th>Days</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
