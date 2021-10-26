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
                        <h6 class="header-pretitle text-secondary">
                            Overview
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            Company Earnings
                        </h1>

                    </div>
                    <div class="col-auto">

                        <!-- Nav -->
                        <ul class="nav nav-tabs header-tabs">
                            <li class="nav-item" data-toggle="chart" data-target="#earningsChart" data-trigger="click"
                                data-action="toggle" data-dataset="0">
                                <a href="#" class="nav-link text-center active" data-toggle="tab">
                                    <h6 class="header-pretitle text-secondary">
                                        Earnings
                                    </h6>
                                    <h3 class="mb-0">
                                        $19.2k
                                    </h3>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="chart" data-target="#earningsChart" data-trigger="click"
                                data-action="toggle" data-dataset="1">
                                <a href="#" class="nav-link text-center" data-toggle="tab">
                                    <h6 class="header-pretitle text-secondary">
                                        Sessions
                                    </h6>
                                    <h3 class="mb-0">
                                        92.1k
                                    </h3>
                                </a>
                            </li>
                            <li class="nav-item" data-toggle="chart" data-target="#earningsChart" data-trigger="click"
                                data-action="toggle" data-dataset="2">
                                <a href="#" class="nav-link text-center" data-toggle="tab">
                                    <h6 class="header-pretitle text-secondary">
                                        Bounce
                                    </h6>
                                    <h3 class="mb-0">
                                        50.2%
                                    </h3>
                                </a>
                            </li>
                        </ul>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

            <!-- Footer -->
            <div class="header-footer">

                <!-- Chart -->
                <div class="chart">
                    <canvas id="earningsChart" class="chart-canvas"></canvas>
                </div>

            </div>

        </div>
    </div> <!-- / .header -->

    <!-- CARDS -->
    <div class="container-fluid">
         <!-- Stats -->
         <div class="row">
           @foreach ($clients as $client)
           @php
           $id = $client->id;
           $messages = App\Models\Message::where('company_id', $id)->get()->count();
           @endphp
           <div class="col-12 col-lg-6">

            <!-- Card -->
            <div class="card">
                <div class="card-body">
                    <div class="row align-items-center">
                        <div class="col">

                            <!-- Title -->
                            <h6 class="text-uppercase text-muted mb-2">
                               {{ $client->name }}
                            </h6>

                            <!-- Heading -->
                            <span class="h2 mb-0">
                                {{ $messages }} SMS
                            </span><br>
                            <small>SMS provider: {{ $client->provider === 'at' ? 'Africas Talking' : 'Mobi Technologies'}}</small>

                            <!-- Badge -->


                        </div>
                        <div class="col-auto">

                            <!-- Icon -->
                            <a href="{{ route('overview.show',$client->id) }}"><span class="h2 fe fe-arrow-right-circle text-muted mb-0"></span></a>
                        </div>
                    </div> <!-- / .row -->

                </div>
            </div>

        </div>
           @endforeach

        </div> <!-- / .row -->

    </div>
@endsection
