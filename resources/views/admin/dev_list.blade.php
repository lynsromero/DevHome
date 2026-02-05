@extends('admin.layouts.app')
@section('content')
  <div class="container-fluid pt-4 px-4">
    <div class="bg-secondary rounded h-100 p-4">
      <table class="table">
        <div class="add-btn">
          <a href="{{ route('add.dev') }}" type="button" class="btn btn-outline-success m-2">Add Devs</a>
        </div>
        <thead>
          <tr>
            <th scope="col">Image</th>
            <th scope="col">Name</th>
            <th scope="col">Email </th>
            <th scope="col">Designation</th>
            <th scope="col">Experience</th>
            <th scope="col">Action</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($devs as $dev)
            <tr>
              <th><img class="rounded-circle flex-shrink-0" src="{{ $dev->image }}" alt=""
                  style="width: 40px; height: 40px;"></th>
              <td>{{ $dev->name }}</td>
              <td>{{ $dev->email }}</td>
              <td>{{ $dev->designation }}</td>
              <td>{{ $dev->experience }}</td>
              <td><span>
                <button type="button" 
                        class="btn btn-square btn-primary m-2 delete-dev-btn" 
                        data-id="{{ $dev->id }}" 
                        data-name="{{ $dev->name }}" 
                        data-email="{{ $dev->email }}">
                    <i class="fa fa-trash"></i>
                </button>
              </span> </td>
            </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>

  @push('scripts')
  <script>
    $(document).ready(function() {
      $('.delete-dev-btn').on('click', function(e) {
        e.preventDefault();
        
        const $button = $(this);
        const $row = $button.closest('tr');
        const devId = $button.data('id');
        const devName = $button.data('name');
        
        $button.prop('disabled', true);
        const originalHtml = $button.html();
        $button.html('<i class="fa fa-spinner fa-spin"></i>');

        $.ajax({
          url: '{{ route("remove.dev.ajax", ":id") }}'.replace(':id', devId),
          type: 'POST',
          data: {
            _token: '{{ csrf_token() }}'
          },
          success: function(response) {
            if (response.success) {
              $row.fadeOut(300, function() {
                $row.remove();
              });

              Swal.fire({
                toast: true,
                position: 'top-end',
                icon: 'success',
                title: response.message,
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true
              });

            } else {
              Swal.fire({
                icon: 'error',
                title: 'Error',
                text: response.message,
                confirmButtonColor: '#dc3545'
              });
              
              $button.prop('disabled', false);
              $button.html(originalHtml);
            }
          },
          error: function(xhr) {
            let errorMessage = 'An error occurred while processing your request.';
            if (xhr.responseJSON && xhr.responseJSON.message) {
              errorMessage = xhr.responseJSON.message;
            }

            Swal.fire({
              icon: 'error',
              title: 'Error',
              text: errorMessage,
              confirmButtonColor: '#dc3545'
            });

            $button.prop('disabled', false);
            $button.html(originalHtml);
          }
        });
      });
    });
  </script>
  @endpush
@endsection