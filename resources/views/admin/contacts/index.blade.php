@extends('layouts.admin')


@section('content')
    <div class="header">
        <div class="container-fluid">

            <!-- Body -->
            <div class="header-body">
                <div class="row align-items-end">
                    <div class="col">

                        <!-- Pretitle -->
                        <h6 class="header-pretitle">
                            Contacts
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Contact
                        </h1>

                    </div>
                    <div class="col-auto">


                        @if ($searched !== null)
                        <a href="{{ route('client-contacts.index') }}" class="btn btn-primary lift">
                          <i class="fa fa-chevron-left"></i>   Back
                        </a>
                        @endif

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->

    <div class="page-body py-4 container-fluid ">
        <div class="card">
            <div class="card-header">
                Sort by company
            </div>
            <div class="card-body">
                <form action="{{ route('contacts.search') }}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-8">
                            <div class="form-group">
                                <select name="client" id="" class="form-control" required>
                                    <option value="" selected disabled>Select</option>
                                    @foreach ($clients as $client)
                                        <option value="{{ $client->id }}">{{ $client->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <button type="submit" class="btn btn-primary">Sort <i class="fe fe-filter"></i></button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                <h2 class="card-title">
                    Contact List
                </h2>
            </div>
            <div class="card-body">
                @if ($searched == null)
                <table class="table table-sm table-stripped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Client</th>
                        {{-- <th>ACtion</th> --}}
                    </thead>
                    <tbody>
                       @foreach ($contacts as $contact)
                       <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->company }}</td>
                        {{-- <td>
                            <a href="{{ route('contacts.show', 2) }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-pencil"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td> --}}
                    </tr>

                       @endforeach
                    </tbody>
                </table>
                @else
                <table class="table table-sm table-stripped">
                    <thead>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        {{-- <th>ACtion</th> --}}
                    </thead>
                    <tbody>
                       @foreach ($contacts as $contact)
                       <tr>
                        <td>{{ $contact->name }}</td>
                        <td>{{ $contact->email }}</td>
                        <td>{{ $contact->phone }}</td>
                        <td>{{ $contact->company }}</td>
                        {{-- <td>
                            <a href="{{ route('contacts.show', 2) }}" class="btn btn-success btn-sm"><i
                                    class="fa fa-pencil"></i></a>
                            <a href="" class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></a>
                        </td> --}}
                    </tr>

                       @endforeach
                    </tbody>
                </table>
                @endif
            </div>
        </div>
    </div>
@endsection
