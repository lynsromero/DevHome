@extends('admin.layouts.app')
@section('content')
<div class="container-fluid pt-4 px-4">
  <div class="bg-secondary rounded h-100 p-4">
    <table class="table">
      <h2 class="mb-4">Team Join Requests</h2>
        <thead>
        <tr>          
          <th scope="col">No.</th>
          <th scope="col">Name</th>
          <th scope="col">Portfolio/Github Link</th>
          <th scope="col">Date</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($requests as $request)
        <tr>
          <th scope="row">{{ $loop->iteration }}</th>
          <td>{{ $request->name }}</td>
          <td>{{ $request->link }}</td>
          <td>{{ $request->created_at->diffForHumans() }}</td>      
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</div>

@endsection