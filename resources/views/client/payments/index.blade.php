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
               Payments
            </h6>

            <!-- Title -->
            <h1 class="header-title">
              Payments
            </h1>

          </div>
          <div class="col-auto">

            <!-- Button -->
            <a href="{{ route('payments.create') }}" class="btn btn-primary lift">
              Top Up
            </a>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .header-body -->

    </div>
  </div> <!-- / .header -->
  <div class="container-fluid">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">Payments</h2>
      </div>
      <div class="card-body">
        <table class="table table-sm">
          <thead>
            <th>Transaction ID</th>
            <th>Amount Paid</th>
            <th>Paid By</th>
            <th>SMS Awarded</th>
            <th>Paid On</th>
          </thead>
          <tbody>
           @foreach ($payments as $pay)
           <tr>
            <td>{{ $pay->mpesa_receipt }}</td>
            <td>KES. {{ number_format($pay->amount,2) }}</td>
            <td>+{{ $pay->phone }}</td>
            <td>{{ $pay->amount }} SMS</td>
            <td>{{ date('M d, Y', strtotime($pay->created_at)) }}</td>
          </tr>
           @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
