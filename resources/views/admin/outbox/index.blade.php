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
                           SMS Outbox
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                          SMS Outbox
                        </h1>

                      </div>
                      <div class="col-auto">

                        <!-- Button -->
                        @if ($search !== null)
                        <a href="{{ route('client-outbox.index') }}" class="btn btn-primary lift">
                           <i class="fa fa-chevron-left"></i> Back
                           </a>
                        @endif

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
                        <form action="{{ route('outbox.search') }}" method="POST">
                            @csrf
                            <div class="row">
                                <div class="col-md-8">
                                    <div class="form-group">
                                        <select name="client" id="" class="form-control" required>
                                            <option value="" disabled selected>Select</option>
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
                    <h2 class="card-title">SMS Outbox</h2>
                  </div>
                  <div class="card-body">
                    <table class="table table-sm">
                      <thead>
                        <th>Date</th>
                        <th>Text</th>
                        <th>From</th>
                        <th>To</th>
                        <th>Client</th>
                        <th>Cost</th>
                        <th>Sold At</th>
                        <th>Link ID</th>
                      </thead>
                      <tbody>
                      @if ($search === null)
                      @foreach ($sms as $item)
                      <tr>
                       <td>{{ date('M d, Y', strtotime($item->createdOn)) }}</td>
                       <td>{{ $item->message }}</td>
                       <td>{{ $item->name }}</td>
                       <td>{{ $item->to }}</td>
                       <td>{{ $item->name }}</td>
                       <td>KES 0.80</td>
                       <td>KES 1</td>
                       <td></td>
                     </tr>
                      @endforeach
                      @else
                      @foreach ($sms as $item)
                      <tr>
                       <td>{{ date('M d, Y', strtotime($item->createdOn)) }}</td>
                       <td>{{ $item->message }}</td>
                       <td>{{ $item->name }}</td>
                       <td>{{ $item->to }}</td>
                       <td>{{ $item->name }}</td>
                       <td>KES 0.80</td>
                       <td>KES 1</td>
                       <td></td>
                     </tr>
                      @endforeach
                      @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection
