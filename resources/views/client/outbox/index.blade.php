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
                           SMS Outbox
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                          SMS Outbox
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
                    <h2 class="card-title">SMS Outbox</h2>
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
                        @foreach ($messages as $message)
                        <tr>
                            <td>{{ date('M d, Y, H:i:s', strtotime($message->createdOn)) }}</td>
                            <td>{{ $message->message }}</td>
                            <td>{{ $message->name }}</td>
                            <td>{{ $message->to }}</td>
                            <td>Ksh. 1</td>
                            <td></td>
                          </tr>
                        @endforeach
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
@endsection
