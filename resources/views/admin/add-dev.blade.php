@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
      <h2 class="mb-4">Add A Developer</h2>
      <form action="{{ route('add.dev.post') }}" method="POST" enctype="multipart/form-data">
        @csrf
      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Image</label>
        <input class="form-control form-control-sm bg-dark" name="image" id="formFileSm" type="file">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Name</label>
        <input class="form-control form-control-lg bg-dark" name="name" id="formFileLg" type="text">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Email</label>
        <input class="form-control form-control-lg bg-dark" name="email" id="formFileLg" type="text">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Designation</label>
        <input class="form-control form-control-lg bg-dark" name="designation" id="formFileLg" type="text">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Facebook Url</label>
        <input class="form-control form-control-lg bg-dark" name="facebook_url" id="formFileLg" type="text">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Linkedin Url</label>
        <input class="form-control form-control-lg bg-dark" name="linkedin_url" id="formFileLg" type="text">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Github Url</label>
        <input class="form-control form-control-lg bg-dark" name="github_url" id="formFileLg" type="text">
      </div>
      <div>
        <label for="formFileLg" class="form-label">Experience</label>
        <input class="form-control form-control-lg bg-dark" name="experience" id="formFileLg" type="text">
      </div>
      <div class="mb-3">
        <label for="formFileMultiple" class="form-label">Languages</label>
        <input class="form-control form-control-lg bg-dark" name="languages[]" id="formFileLg" type="text" placeholder="Enter languages as comma separated">
      </div>
      <div class="mb-3">
        <label for="formFileSm" class="form-label">password</label>
        <input class="form-control form-control-lg bg-dark" name="password" id="formFileSm" type="password">
      </div>
      <div class="add-btn">
        <button type="submit" class="btn btn-outline-success m-2">Add Developer</button>
      </div>
    </form>
    </div>
  </div>

@endsection