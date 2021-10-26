@extends('layouts.client')


@section('content')
  <!-- HEADER -->

  <!-- CARDS -->
  <div class="container-fluid mt-2">

    <div class="row">
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Total SMS
                </h6>

                <!-- Heading -->
                <span class="h2 mb-0">
                  {{ $sms }}
                </span>


              </div>
              <div class="col-auto">

                <!-- Icon -->
                <span class="h2 fe fe-message-square text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Sent SMS
                </h6>

                <!-- Heading -->
                <span class="h2 mb-0">
                  {{ $sms }}
                </span>

              </div>
              <div class="col-auto">

                <!-- Icon -->
                <span class="h2 fe fe-send text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                 Total Amount Spent
                </h6>

                <div class="row align-items-center no-gutters">
                  <div class="col-auto">

                    <!-- Heading -->
                    <span class="h2 mr-2 mb-0">
                      Kes. {{ number_format($total,4) }}
                    </span>

                  </div>
                  <div class="col">



                  </div>
                </div> <!-- / .row -->
              </div>
              <div class="col-auto">

                <!-- Icon -->
                <span class="h2 fe fe-clipboard text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
      <div class="col-12 col-lg-6 col-xl">

        <!-- Card -->
        <div class="card">
          <div class="card-body">
            <div class="row align-items-center">
              <div class="col">

                <!-- Title -->
                <h6 class="text-uppercase text-muted mb-2">
                  Balance
                </h6>

                <!-- Heading -->
                <span class="h2 mb-0">
                    @if (auth()->user()->provider === 'at')
                    {{ \App\Helper\Helper::getBalance() }}
                    @else
                    Kes. {{ \App\Helper\Helper::getBalance() }}
                    @endif

                </span>

              </div>
              <div class="col-auto">

                 <!-- Icon -->
                 <span class="h2 fe fe-credit-card text-muted mb-0"></span>

              </div>
            </div> <!-- / .row -->
          </div>
        </div>

      </div>
    </div> <!-- / .row -->

  </div>
  <div class="header bg-dar pb-5">
    <div class="container-fluid">

      <!-- Body -->
      <div class="header-body">
        <div class="row align-items-end">
          <div class="col">

            <!-- Pretitle -->
            <h6 class="header-pretitle text-secondary">
              Annual
            </h6>

            <!-- Title -->
            <h1 class="header-title text-white">
              Audience
            </h1>

          </div>
          <div class="col-auto">

            <!-- Nav -->
            <ul class="nav nav-tabs header-tabs">
              <li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="0">
                <a href="#" class="nav-link text-center active" data-toggle="tab">
                  <h6 class="header-pretitle text-secondary">
                    Customers
                  </h6>
                  <h3 class="text-white mb-0">
                    73.2k
                  </h3>
                </a>
              </li>
              <li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="1">
                <a href="#" class="nav-link text-center" data-toggle="tab">
                  <h6 class="header-pretitle text-secondary">
                    Sessions
                  </h6>
                  <h3 class="text-white mb-0">
                    92.1k
                  </h3>
                </a>
              </li>
              <li class="nav-item" data-toggle="chart" data-target="#audienceChart" data-trigger="click" data-action="toggle" data-dataset="2">
                <a href="#" class="nav-link text-center" data-toggle="tab">
                  <h6 class="header-pretitle text-secondary">
                    Conversion
                  </h6>
                  <h3 class="text-white mb-0">
                    50.2%
                  </h3>
                </a>
              </li>
            </ul>

          </div>
        </div><!-- / .row -->
      </div> <!-- / .header-body -->

      <!-- Footer -->
      <div class="header-footer">

        <!-- Chart -->
        <div class="chart">
          <canvas id="audienceChart" class="chart-canvas"></canvas>
        </div>

      </div>

    </div>
  </div> <!-- / .header -->

@endsection
