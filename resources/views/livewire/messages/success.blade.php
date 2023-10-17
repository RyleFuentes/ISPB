@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success!</strong> {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>
@endif
