@extends('layouts.client')

@section('content')
<div class="header">
    <div class="container-fluid">

      <!-- Body -->
      <div class="header-body">
        <div class="row align-items-end">
          <div class="col">

            <!-- Pretitle -->
            <h6 class="header-pretitle">
               Contacts
            </h6>

            <!-- Title -->
            <h1 class="header-title">
              Contact
            </h1>

          </div>
          <div class="col-auto">


            <a href="{{ route('contacts.create') }}" class="btn btn-primary lift">
              Add Contact
            </a>

          </div>
        </div> <!-- / .row -->
      </div> <!-- / .header-body -->

    </div>
  </div> <!-- / .header -->

  <div class="page-body py-4 container-fluid ">
    <div class="card">
      <div class="card-header">
        <h2 class="card-title">
          Contact List
        </h2>
      </div>
      <div class="card-body">
        <table class="table table-sm table-stripped contacts">
          <thead>
            <th>Name</th>
            <th>Email</th>
            <th>Phone</th>
            <th>Tags</th>
            <th>ACtion</th>
          </thead>
          <tbody>

           @foreach ($contacts as $contact)
           <tr>
            <td>{{ $contact->name }}</td>
            <td>{{ $contact->email }}</td>
            <td>{{ "0".substr($contact->phone,4) }}</td>
            <td>
                @foreach ($contact->tags as $tag)
                    <div class="btn-group" role="group">
                        <a href="" class="btn btn-success btn-sm">{{ $tag->tag_name }}</a>
                    </div>
                @endforeach
            </td>
            <td style="display: flex;">
                <a href="{{ route('contacts.show',$contact->id) }}" class="btn btn-success btn-sm mr-1"><i class="fa fa-pencil"></i></a>
                <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                    @csrf
                    @method('delete')
                    <button class="btn btn-danger btn-sm"><i class="fa fa-trash"></i></button>
                </form>
            </td>
        </tr>
           @endforeach

          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
