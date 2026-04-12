@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
      <h2 class="mb-4">Add A Developer</h2>
      <form action="{{ route('add.dev.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label for="formFileMultiple" class="form-label">Image</label>
          <input class="form-control form-control-sm bg-dark @error('image') is-invalid @enderror" name="image"
            id="formFileSm" type="file">
          @error('image')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Name</label>
          <input class="form-control form-control-lg bg-dark @error('name') is-invalid @enderror" name="name"
            id="formFileLg" type="text" value="{{ old('name') }}">
          @error('name')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Email</label>
          <input class="form-control form-control-lg bg-dark @error('email') is-invalid @enderror" name="email"
            id="formFileLg" type="text" value="{{ old('email') }}">
          @error('email')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Designation</label>
          <input class="form-control form-control-lg bg-dark @error('designation') is-invalid @enderror" name="designation"
            id="formFileLg" type="text" value="{{ old('designation') }}">
          @error('designation')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Slug</label>
          <input class="form-control form-control-lg bg-dark @error('slug') is-invalid @enderror" name="slug"
            id="formFileLg" type="text" value="{{ old('slug') }}">
          @error('slug')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Facebook Url</label>
          <input class="form-control form-control-lg bg-dark @error('facebook_url') is-invalid @enderror" name="facebook_url"
            id="formFileLg" type="text" value="{{ old('facebook_url') }}">
          @error('facebook_url')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Linkedin Url</label>
          <input class="form-control form-control-lg bg-dark @error('linkedin_url') is-invalid @enderror" name="linkedin_url"
            id="formFileLg" type="text" value="{{ old('linkedin_url') }}">
          @error('linkedin_url')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Github Url</label>
          <input class="form-control form-control-lg bg-dark @error('github_url') is-invalid @enderror" name="github_url"
            id="formFileLg" type="text" value="{{ old('github_url') }}">
          @error('github_url')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div>
          <label for="formFileLg" class="form-label">Experience</label>
          <input class="form-control form-control-lg bg-dark @error('experience') is-invalid @enderror" name="experience"
            id="formFileLg" type="text" value="{{ old('experience') }}">
          @error('experience')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="formFileMultiple" class="form-label">Stacks</label>
          <input class="form-control form-control-lg bg-dark @error('languages') is-invalid @enderror" name="languages[]"
            id="formFileLg" type="text" placeholder="Enter stacks as comma separated" value="{{ implode(', ', (array) old('languages')) }}">
          @error('languages')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="mb-3">
          <label for="formFileSm" class="form-label">Password</label>
          <input class="form-control form-control-lg bg-dark @error('password') is-invalid @enderror" name="password"
            id="formFileSm" type="password">
          @error('password')
            <div class="alert alert-danger">{{ $message }}</div>
          @enderror
        </div>
        <div class="add-btn">
          <button type="submit" class="btn btn-outline-success m-2">Add Developer</button>
        </div>
      </form>
    </div>
  </div>

@endsection