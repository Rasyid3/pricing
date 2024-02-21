@include('layouts.app')
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    @include('asset.bs')
    <style>
    </style>

</head>

<body>
<div class="container mt-4">
        <div class="font-monospace">
        <div class="text-center">
        <h1>List Pekerjaan</h1>
        </div>
                    <div>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th data-field="Job">Job</th>
                                    <th> Action </th>
                                </tr>
                            </thead>

                            <tbody>
                            @foreach ($jobs as $job)
                                <tr>
                                    <td> {{$job->title}} </td>
                                    <td>
                                    <a href="{{route('jobs.show', $job)}}" class="btn btn-info">View</a>
                                    <a href="{{route('jobs.edit', $job)}}" class="btn btn-warning">Edit</a>
                                    <form action="{{route('jobs.destroy', $job)}}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteModal" data-item-id="{{ $job->id }}">Delete</button>
                                    </form>
                                    </td>
                                </tr>
                                    @endforeach
                            </tbody>
                            </table>

        <div class="btn-container">
            <a href="{{ route('jobs.create') }}" class="btn btn-primary">Create Job</a>
            <a href="{{ url('/dashboard') }}" class="btn btn-primary">Home</a>
        </div>

<div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="deleteModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="deleteModalLabel">Confirm Delete</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        Are you sure you want to delete this item?
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
        <form id="deleteForm" action="#" method="POST" style="display: inline;">
          @csrf
          @method('DELETE')
          <button type="submit" class="btn btn-danger">Delete</button>
        </form>
      </div>
    </div>
  </div>
</div>

<script>
  var deleteModal = document.getElementById('deleteModal');
  deleteModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var itemId = button.getAttribute('data-item-id');
    var form = document.getElementById('deleteForm');
    form.action = "{{ route('jobs.delete', '') }}" + "/" + itemId;
  });
</script>

        </body>
        </html>

