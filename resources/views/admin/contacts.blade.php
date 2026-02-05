@extends('admin.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="bg-secondary rounded h-100 p-4">
    <table class="table">
      
        <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">First Name</th>
          <th scope="col">Last Name</th>
          <th scope="col">Email</th>
          <th scope="col">Message</th>
          <th scope="col">Phone Number</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($contacts as $contact)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $contact->first_name }}</td>
          <td>{{ $contact->last_name }}</td>
          <td>{{ $contact->email }}</td>
          <td>{{ $contact->message }}</td>
          <td>{{ $contact->phone_number }}</td>          
        </tr>
        @endforeach      
      </tbody>
    </table>
  </div>
</div>

@endsection