@extends('admin.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="bg-secondary rounded h-100 p-4">
    <table class="table">
      
        <thead>
        <tr>
          <th scope="col">No.</th>
          <th scope="col">Email Address</th>
          <th scope="col">Subject</th>
          <th scope="col">Message</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($emails as $email)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $email->email_address }}</td>
          <td>{{ $email->subject }}</td>
          <td>{{ $email->body }}</td>
          <td>{{ $email->created_at->diffForHumans() }}</td>      
        </tr>
        @endforeach      
      </tbody>
    </table>
  </div>
</div>

@endsection