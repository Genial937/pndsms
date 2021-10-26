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
                            Reports
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Reports
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
                <h2 class="card-title">Reports</h2>
            </div>
            <div class="card-body">
                <table class="table table-sm">
                    <thead>
                        <th>Month</th>
                        <th>Total SMS Send</th>
                        <th>Total Cost</th>
                        {{-- <th>Action</th> --}}

                    </thead>
                    <tbody>
                        @foreach ($report as $item)
                        <tr>
                            <td>March, 2021</td>
                            <td>{{ $item->total }}</td>
                            <td>KES {{ $item->total }}.00</td>
                            {{-- <td></td> --}}
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
