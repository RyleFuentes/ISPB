@if (session('success'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>success!</strong> {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
  </div>

@elseif(session('error'))
        <div class="alert alert-danger position-absolute top-0 start-50 translate-middle mt-5 fs-5" role="alert">
            {{ session('error') }}
        </div>
@endif
