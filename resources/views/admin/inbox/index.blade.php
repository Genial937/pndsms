@extends('layouts.admin')

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
                            SMS Inbox
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            SMS Inbox
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        {{-- <a href="#!" class="btn btn-primary lift">
                          Create Report
                        </a> --}}

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->
    <div class="container-fluid">
        <div class="card">
            <div class="card-header">
                Sort by company
            </div>
            <div class="card-body">
                <form action="">
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="" id="" class="form-control">
                                    <option value="">Select</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button class="btn btn-primary">Sort <i class="fe fe-filter"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">SMS Inbox</h2>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>Date</th>
                        <th>Text</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Cost</th>
                        <th>Link ID</th>
                    </thead>
                    <tbody>
                        <tr>
                            <td></td>
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
