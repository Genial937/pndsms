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
                           Client Subscriptions
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                          Client Subscriptions
                        </h1>

                      </div>
                      <div class="col-auto">

                        <!-- Button -->
                       @if ($search !== null)
                       <a href="{{ route('subscriptions.index') }}" class="btn btn-primary lift">
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
                        <form action="{{ route('sub.search') }}" method="POST">
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
                                        <button class="btn btn-primary">Sort <i class="fe fe-filter"></i></button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="card">
                  <div class="card-header">
                    <h2 class="card-title">Client Subscriptions</h2>
                  </div>
                  <div class="card-body">
                    <table class="table table-sm">
                      <thead>
                        <th>Transaction ID</th>
                        <th>Transaction Amount</th>
                        <th>Transaction Date</th>
                        <th>SMS Awarded</th>
                        <th>Paid By</th>

                      </thead>
                      <tbody>
                        @if ($search !== null)
                        @foreach ($payments as $pay)
                        <tr>
                            <td>{{ $pay->mpesa_receipt }}</td>
                            <td>KES. {{ number_format($pay->amount,2) }}</td>
                            <td>{{ date('M d, Y', strtotime($pay->created_at)) }}</td>
                            <td>{{ $pay->amount }} SMS</td>
                            <td>{{ $pay->name }}</td>
                          </tr>
                        @endforeach
                        @else
                        @foreach ($payments as $pay)
                        <tr>
                            <td>{{ $pay->mpesa_receipt }}</td>
                            <td>KES. {{ number_format($pay->amount,2) }}</td>
                            <td>{{ date('M d, Y', strtotime($pay->created_at)) }}</td>
                            <td>{{ $pay->amount }} SMS</td>
                            <td>{{ $pay->name }}</td>
                          </tr>
                        @endforeach
                        @endif
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection
