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
               Make Payment
            </h6>

            <!-- Title -->
            <h1 class="header-title">
              Make Payment
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
        <h2 class="card-title">Make Payment</h2>
      </div>
      <div class="card-body">
          @if (session('message'))
              <div class="alert alert-success">
                  <a href="#" data-dismiss="alert" class="close">&times;</a>
                  <p>{{ session('message') }}</p>
              </div>
          @endif
        <form action="{{ route('payments.store') }}" method="POST">
            @csrf
            <div class="form-group">
                <label for="">Recharge From:</label>
                <input type="number" class="form-control" name="phone_number" placeholder="Enter recharging phone number">
                @error('phone_number')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <label for="">Amount</label>
                <input type="number" name="amount" class="form-control" placeholder="Enter amount">
                @error('amount')
                    <p class="text-danger">{{ $message }}</p>
                @enderror
            </div>
            <div class="form-group">
                <button class="btn btn-primary pull-right">Submit</button>
            </div>
        </form>
      </div>
    </div>
  </div>
@endsection
