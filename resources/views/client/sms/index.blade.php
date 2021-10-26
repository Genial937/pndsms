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
                      SMS
                    </h6>

                    <!-- Title -->
                    <h1 class="header-title">
                      Send SMS
                    </h1>

                  </div>
                  <div class="col-auto">


                    {{-- <a href="{{ route('sms-templates.index') }}" class="btn btn-primary lift">
                      SMS Templates
                    </a> --}}

                  </div>
                </div> <!-- / .row -->
              </div> <!-- / .header-body -->

            </div>
          </div> <!-- / .header -->
         <div class="container-fluid">
              <div class="card">
                  <div class="card-header">
                      <h2>Send SMS</h2>
                  </div>
                  <div class="card-body">
                      @if (session('message'))
                          <div class="alert alert-success">
                              <a href="#" data-dismiss="alert" class="close">&times;</a>
                              <p>{{ session('message') }}</p>
                          </div>
                      @endif
                      <form action="{{ route('sms.store') }}" method="POST" id="sms-form">
                          @csrf
                          <div class="form-group">
                              <label for="">From:</label>
                              <select name="from" id="" class="form-control form-control-sm">
                                  <option value="" selected disabled>Select</option>
                                  @if(auth()->user()->provider === 'at')
                                  <option value="">Africa's Talking</option>
                                  @else
                                  <option value="">Mobitech</option>
                                  @endif

                              </select>
                          </div>
                          <div class="form-group">
                              <label for="">To:</label>
                              <div class="row">
                                <div class="col-md-12">
                                    <div class="card">
                                        <div class="card-body">

                                            <ul class="nav nav-tabs nav-tabs-solid">
                                                <li class="nav-item"><a class="nav-link active" href="#solid-tab1" data-toggle="tab">Contacts</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#solid-tab2" data-toggle="tab">Tags</a></li>
                                                <li class="nav-item"><a class="nav-link" href="#solid-tab3" data-toggle="tab">Number</a></li>
                                            </ul>
                                            <div class="tab-content">
                                                <div class="tab-pane show active p-4" id="solid-tab1">
                                                    <table class="table table-sm contacts">
                                                        <thead>
                                                            <th>
                                                                <input type="checkbox" id="checkAll"> Select All
                                                            </th>
                                                            <th>Username</th>
                                                            <th>Email</th>
                                                            <th>Mobile</th>
                                                        </thead>
                                                        <tbody>
                                                            @foreach ($contacts as $contact)
                                                            <tr>
                                                             <td>
                                                                 <input type="checkbox" class="checkbox checkitem" name="mobile[]" value="{{ substr($contact->phone,1) }}">
                                                             </td>
                                                             <td>{{ $contact->first_name }} {{ $contact->last_name }}</td>
                                                             <td>{{ $contact->email }}</td>
                                                             <td>{{ $contact->phone }}</td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                                <div class="tab-pane p-4" id="solid-tab2">
                                                    <select name="tag" id="" class="form-control form-control-sm">
                                                        <option value="" disabled selected>Select</option>
                                                        @foreach ($tags as $tag)
                                                            <option value="{{ $tag->id }}">{{ $tag->tag_name }} > {{ $tag->contacts->count() }} Contacts</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="tab-pane p-4" id="solid-tab3">
                                                    <input type="number" name="contact" class="form-control form-control-sm" placeholder="i.e 0743160178">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @if (session('notice'))
                                   <p class="text-danger">{{ session('notice') }}</p>
                                @endif

                          </div>
                          <div class="form-group">
                              <label for="">Message:</label>
                              <textarea name="message" class="form-control" id="" cols="30" rows="6"></textarea>
                              @error('message')
                                  <p class="text-danger">{{ $message }}</p>
                              @enderror
                          </div>
                          <div class="form-group">
                              <button type="submit" class="btn btn-primary pull-right"><i class="fe fe-send"></i> Send</button>
                          </div>
                      </form>
                  </div>
              </div>
         </div>
@endsection
