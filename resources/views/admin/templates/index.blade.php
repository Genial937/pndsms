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
                            SMS Templates
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            SMS Templates
                        </h1>

                    </div>
                    <div class="col-auto">


                        @if ($search !== null)
                        <a href="{{ route('client-templates.index') }}" class="btn btn-primary lift">
                            <i class="fa fa-chevron-left"></i> Back
                        </a>

                        @endif
                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

            <div class="page-body py-4">
                <div class="card">
                    <div class="card-header">
                        Sort by company
                    </div>
                    <div class="card-body">
                        <form action="{{ route('template.search') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="client" id="" class="form-control">
                                            <option value="">Select</option>
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
                            SMS Templates
                        </h2>
                    </div>
                    <div class="card-body">
                        <table class="table table-sm">
                            <thead>
                                <th>Icon</th>
                                <th>Name</th>
                                <th>Body</th>
                                <th>Company</th>
                                {{-- <th>Created</th> --}}
                                {{-- <th>Actions</th> --}}
                            </thead>
                            <tbody>
                               @if ($search === null)
                               @foreach ($templates as $template)
                               <tr>
                                <td>
                                    @if ($template->icon !== "")
                                    <a href=""><img src="{{ asset('icons') }}/{{ $template->icon }}" alt=""  style="width:70px; height:70px; border-radius:50%"></a>
                                    @else
                                    <a href=""><img src="{{ asset('img/icon.png') }}" alt=""  style="width:70px; height:70px; border-radius:50%"></a>
                                    @endif
                                </td>
                                <td>{{ $template->template_name }}</td>
                                <td>{{ $template->body }}</td>
                                <td>{{ $template->name }}</td>
                                {{-- <td></td> --}}
                                {{-- <td></td> --}}
                                </tr>
                               @endforeach
                               @else
                               @foreach ($templates as $template)
                               <tr>
                                <td>
                                    @if ($template->icon !== "")
                                    <a href=""><img src="{{ asset('icons') }}/{{ $template->icon }}" alt=""  style="width:70px; height:70px; border-radius:50%"></a>
                                    @else
                                    <a href=""><img src="{{ asset('img/icon.png') }}" alt=""  style="width:70px; height:70px; border-radius:50%"></a>
                                    @endif
                                </td>
                                <td>{{ $template->template_name }}</td>
                                <td>{{ $template->body }}</td>
                                <td>{{ $template->name }}</td>
                                {{-- <td></td> --}}
                                {{-- <td></td> --}}
                                </tr>
                               @endforeach
                               @endif
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- / .header -->
@endsection

