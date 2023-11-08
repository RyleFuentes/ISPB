@if (session('success'))
<!-- <div class="alert alert-success alert-dismissible fade show position-absolute top-0 start-50 translate-middle mt-5 fs-5" role="alert">
    <strong>Success!</strong> {{session('success')}}
    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div> -->

<div class="position-fixed bottom-0 end-0 m-2 m-sm-3 m-md-4 m-lg-5" style="z-index: 2;">
    <div class="toast show">
        <div class="toast-header">
            <img src="{{ asset('images/logo.png') }}" class="rounded me-2" alt="..." width="20" height="15">
            <strong class="me-auto text-primary fw-bold">ISPB Notification!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <p class="mb-0"><strong class="text-success">Success!</strong> {{session('success')}}</p>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const toast = document.querySelector('.toast');
        setTimeout(function () {
            toast.classList.add('show');
        }, 10000);
        setTimeout(function () {
            toast.classList.remove('show');
        }, 11000);
    });
</script>


@elseif(session('error'))
<div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle mt-5 fs-5" role="alert">
    {{ session('error') }}
</div>

<!-- @elseif(session('create_success'))
<div class="position-fixed bottom-0 end-0 m-2 m-sm-3 m-md-4 m-lg-5" style="z-index: 9999;">
    <div class="toast show">
        <div class="toast-header">
            <img src="{{ asset('images/logo.png') }}" class="rounded me-2" alt="..." width="20" height="15">
            <strong class="me-auto text-primary fw-bold">Account Notice!</strong>
            <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
        </div>
        <div class="toast-body">
            <p class="mb-0">{{ session('create_success') }}</p>
        </div>
    </div>
</div> -->

@endif

