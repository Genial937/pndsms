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
                            SMS Providers
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            SMS Providers
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="{{ route('providers.create') }}" class="btn btn-primary lift">
                          Add SMS Provider
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">SMS Providers</h2>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                    <thead>
                       <th>Provider</th>
                       <th>Provider Username</th>
                       <th>Rate(per SMS)</th>
                       <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($providers as $item)
                        <tr>
                            <td>{{ $item->provider_name }}</td>
                            <td>{{ $item->provider_username }}</td>
                            <td>{{ $item->rate }}</td>
                            <td>
                                <a href="{{ route('providers.show', $item->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
                                <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
