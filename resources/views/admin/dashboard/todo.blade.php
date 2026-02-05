

        <div class="h-100 bg-secondary rounded p-4">
          <div class="d-flex align-items-center justify-content-between mb-4">
            <h6 class="mb-0">To Do List</h6>
          </div>

          <form id="add-todo-form"> @csrf

            <div class="mb-2">
              <input name="task" class="form-control bg-dark border-0 mb-2" type="text" placeholder="Enter task" required>
              <div class="d-flex">
                <input name="task_time" class="form-control bg-dark border-0 newwidth flatpickr-date" type="text"
                  placeholder="Select date" required>
                <button type="submit" class="btn btn-primary ms-2">Add</button>
              </div>
            </div>
          </form>

          <div id="todo-container">
            @foreach($tasks as $todo)
              <div class="d-flex align-items-center border-bottom py-2" id="todo-{{ $todo->id }}">
                <input hidden class="form-check-input m-0 toggle-todo" type="checkbox" data-id="{{ $todo->id }}" {{ $todo->is_completed ? 'checked' : '' }}>

                <div class="w-100 ms-3">
                  <div class="d-flex w-100 align-items-center justify-content-between">
                    <span class="{{ $todo->is_completed ? 'text-decoration-line-through' : '' }}">
                      {{ $todo->task }}
                      <br>
                      <small class="text-muted" style="font-size: 0.75rem;">
                        <i class="fa fa-clock me-1"></i>{{ $todo->task_time->format('d M, h:i A') }}
                      </small>
                    </span>
                    <button class="btn btn-sm delete-todo" data-id="{{ $todo->id }}">
                      <i class="fa fa-times text-primary"></i>
                    </button>
                  </div>
                </div>
              </div>
            @endforeach
          </div>

        </div>

@push('scripts')
  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function () {
      $('#add-todo-form').on('submit', function (e) {
        e.preventDefault(); // This stops the page from reloading

        let formData = $(this).serialize(); // Gathers task and task_time

        $.ajax({
          url: "{{ route('todo.store') }}",
          type: "POST",
          data: formData,
          success: function (response) {
            // 1. Clear the inputs
            $('#task_input').val('');

            // 2. Append the new task to the list dynamically
            // Note: We use response data sent back from the controller
            let newTask = `
                  <div class="d-flex align-items-center border-bottom py-2" id="todo-${response.id}">
                      <input class="form-check-input m-0 toggle-todo" type="checkbox" data-id="${response.id}">
                      <div class="w-100 ms-3">
                          <div class="d-flex w-100 align-items-center justify-content-between">
                              <span>
                                  ${response.task} <br>
                                  <small class="text-muted" style="font-size: 0.75rem;">
                                      <i class="fa fa-clock me-1"></i>${response.date_formatted}
                                  </small>
                              </span>
                              <button class="btn btn-sm delete-todo" data-id="${response.id}">
                                  <i class="fa fa-times text-primary"></i>
                              </button>
                          </div>
                      </div>
                  </div>`;

            $('#todo-container').prepend(newTask); // Adds the new task to the top

            // 3. Show success toast
            Swal.fire({
              toast: true,
              position: 'top-end',
              icon: 'success',
              title: 'Task added!',
              showConfirmButton: false,
              timer: 1500
            });
          },
          error: function () {
            Swal.fire('Error!', 'Could not add task.', 'error');
          }
        });
      });
      // 1. Initialize Calendar (No Time, just Date)
      flatpickr(".flatpickr-date", {
        dateFormat: "Y-m-d",
        minDate: "today",
        theme: "dark",
        defaultDate: "today",
      });

      // 2. Delete Logic
      $('.delete-todo').on('click', function (e) {
        e.preventDefault();
        let id = $(this).data('id');
        let row = $('#todo-' + id);

        Swal.fire({
          title: 'Delete Task?',
          icon: 'warning',
          showCancelButton: true,
          confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
          if (result.isConfirmed) {
            $.ajax({
              url: "{{ route('todo.delete', ':id') }}".replace(':id', id),
              type: 'POST', // We use POST but send DELETE inside data
              data: {
                _token: '{{ csrf_token() }}',
                _method: 'DELETE'
              },
              success: function (response) {
                row.fadeOut(400, function () { $(this).remove(); });
                Swal.fire('Deleted!', '', 'success');
              },
              error: function (xhr) {
                // This logs the ACTUAL error to the console (Press F12 to see it)
                console.log(xhr.responseText);
                Swal.fire('Error!', 'Check console for details', 'error');
              }
            });
          }
        });
      });
    });

  </script>
@endpush