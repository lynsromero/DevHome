@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
      <h6 class="mb-4">Add Project</h6>
      <form id="projectForm" action="{{ route('store.project') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
          <label class="form-label">Project Title</label>
          <input type="text" name="title" id="project_title" class="form-control" required>
        </div>

        <div class="mb-3">
          <label class="form-label">Slug</label>
          <div class="input-group">

            <input type="text" name="slug" id="project_slug" class="form-control">
          </div>
          <small class="text-muted">You can leave this as generated or type your own.</small>
        </div>

        <div class="mb-3">
          <label class="form-label">Description</label>
          <textarea name="description" class="form-control" style="height: 150px;" required></textarea>
        </div>

        <div class="mb-3">
          <label class="form-label">Thumbnail Image</label>
          <input type="file" name="thumbnail" class="form-control">
        </div>

        <div class="row">
          <div class="col-md-6 mb-3">
            <label class="form-label">Github URL</label>
            <input type="url" name="github_url" class="form-control">
          </div>
          <div class="col-md-6 mb-3">
            <label class="form-label">Live Preview URL</label>
            <input type="url" name="live_url" class="form-control">
          </div>
        </div>

        <div class="mb-3">
          <label class="form-label">Tech Stack (Comma separated)</label>
          <input type="text" name="tech_stack" class="form-control">
        </div>
        <div class="add-btn">
          <button type="submit" class="btn btn-primary m-2 ">Add Project</button>
        </div>
      </form>
    </div>
  </div>
@endsection

@push('script')
  <script>
    document.getElementById('project_title').addEventListener('input', function () {
      let title = this.value;
      let slug = title.toLowerCase()
        .replace(/[^a-z0-9 -]/g, '')
        .replace(/\s+/g, '-')
        .replace(/-+/g, '-');
      document.getElementById('project_slug').value = slug;
    });
  </script>

@endpush