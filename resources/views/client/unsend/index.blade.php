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
                           Unsend SMS
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                          Unsend SMS
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
                    <h2 class="card-title">Unsend SMS</h2>
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
