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
                            SMS Templates
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            SMS Templates
                        </h1>

                    </div>
                    <div class="col-auto">


                        <a href="{{ route('template.create') }}" class="btn btn-primary lift">
                            Add New SMS Template
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

            <div class="page-body py-4">
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
                                {{-- <th>Status</th> --}}
                                <th>Created</th>
                                <th>Actions</th>
                            </thead>
                            <tbody>
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
                                    {{-- <td></td> --}}
                                    <td>{{ date('M d, Y, H:i:s', strtotime($template->created_at)) }}</td>
                                    <td style="display: flex">
                                        <a href="{{ route('template.show', $template->id) }}" class="btn btn-primary btn-sm mr-1"><i class="fa fa-pencil"></i></a>
                                        <form action="{{ route('template.destroy', $template->id) }}" method="POST">
                                            @csrf
                                            @method('delete')
                                            <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                                        </form>

                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- / .header -->
@endsection
