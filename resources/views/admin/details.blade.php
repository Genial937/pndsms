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
                            Overview
                        </h6>

                        <!-- Title -->
                        <h1 class="header-title">
                            {{ $client->name }}
                        </h1>
                        <small>SMS provider: {{ $client->provider == 'at' ? 'Africas Talking' : 'Mobi technologies'}}</small>

                    </div>
                    <div class="col-auto">

                        <!-- Button -->
                        <a href="{{ url('/admin') }}" class="btn btn-primary lift">
                            Back
                        </a>

                    </div>
                </div> <!-- / .row -->
            </div> <!-- / .header-body -->

        </div>
    </div> <!-- / .header -->

    <!-- CARDS -->
    <div class="container-fluid">
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
                       Total Amount
                      </h6>

                      <div class="row align-items-center no-gutters">
                        <div class="col-auto">

                          <!-- Heading -->
                          <span class="h2 mr-2 mb-0">
                            KES. {{ number_format($total,2) }}
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
                          @if ($client->provider === 'at')
                          {{ $balance }}
                          @else
                             KES. {{ $balance }}
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


        <div class="row">
            <div class="col-12">

                <!-- Goals -->
                <div class="card">
                    <div class="card-header">
                        <div class="row align-items-center">
                            <div class="col">

                                <!-- Title -->
                                <h4 class="card-header-title">
                                    Payment History
                                </h4>

                            </div>
                            <div class="col-auto">

                                <!-- Button -->
                                {{-- <a href="#!" class="btn btn-sm btn-white">
                                    View All
                                </a> --}}

                            </div>
                        </div> <!-- / .row -->
                    </div>
                    <div class="table-responsive mb-0 p-4"
                        data-list="{&quot;valueNames&quot;: [&quot;goal-project&quot;, &quot;goal-status&quot;, &quot;goal-progress&quot;, &quot;goal-date&quot;]}">
                        <table class="table table-sm table-nowrap table-hover card-table">
                            <thead>
                              <tr>
                                <th>
                                    Transaction ID
                                </th>
                                <th>
                                    Transaction Amount
                                </th>
                                <th>
                                    Transaction Date
                                </th>
                                <th>
                                    SMS Awarded
                                </th>
                                <th>
                                   Paid By
                                </th>
                              </tr>
                            </thead>
                            <tbody class="list">
                               @foreach ($payments as $pay)
                               <tr>
                                <td>{{ $pay->mpesa_receipt }}</td>
                                <td>KES. {{ number_format($pay->amount,2) }}</td>
                                <td>{{ date('M d, Y', strtotime($pay->created_at)) }}</td>
                                <td>{{ $pay->amount }} SMS</td>
                                <td>{{ $pay->phone }}</td>
                            </tr>
                               @endforeach
                            </tbody>
                          </table>
                    </div>
                </div>

            </div>
        </div> <!-- / .row -->
        <div class="row">
            <div class="col-12 col-xl-12">
                 <div class="card">
                     <div class="card-header">Contacts</div>
                     <div class="card-body">
                         <table class="table table-sm">
                             <thead>
                                 <th>#</th>
                                 <th>Name</th>
                                 <th>Phone</th>
                                 <th>Email</th>
                             </thead>
                             <tbody>
                                 @php($count = 1)
                                @foreach ($contacts as $contact)
                                <tr>
                                    <td>{{ $count++ }}</td>
                                    <td>{{ $contact->name }}</td>
                                    <td>{{ $contact->phone }}</td>
                                    <td>{{ $contact->email }}</td>
                                </tr>
                                @endforeach
                             </tbody>
                         </table>
                     </div>
                 </div>
            </div>

        </div> <!-- / .row -->
    </div>

@endsection
