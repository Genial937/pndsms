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
                            Clients
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Clients
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="{{ route('clients.create') }}" class="btn btn-primary lift">
                          Add Client
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->
    <div class="container-fluid">

        <div class="card">
            <div class="card-header">
                <h2 class="card-title">Clients</h2>
            </div>
            <div class="card-body table-responsive">
                <table class="table table-sm table-hover table-nowrap card-table">
                    <thead>
                        <th>Client Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Service Privider</th>
                        <th>Created On</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                       @foreach ($clients as $client)
                       <tr>
                        <td>{{ $client->name }}</td>
                        <td>{{ $client->email }}</td>
                        <td>{{ $client->primary_contact }}</td>
                        <td>
                            {{$client->provider === 'at' ? 'Africas Talking' : 'Mobi Technologies'}}
                        </td>
                        <td>{{ date('M d, Y', strtotime($client->created_at)) }}</td>
                        {{-- <td></td> --}}
                        <td>
                            <a href="{{ route('clients.show', $client->id) }}" class="btn btn-success btn-sm"><i class="fa fa-pencil"></i></a>
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
