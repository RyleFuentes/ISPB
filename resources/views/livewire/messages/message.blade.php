@if (session('success'))
    <div class="position-fixed bottom-0 end-0 m-2 m-sm-3 m-md-4 m-lg-5" style="z-index: 2;">
        <div class="toast show">
            <div class="toast-header">
                <img src="{{ asset('images/logo.png') }}" class="rounded me-2" alt="..." width="20" height="15">
                <strong class="me-auto text-primary fw-bold">ISPB Notification!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <p class="mb-0"><strong class="text-success">Success!</strong> {{ session('success') }}</p>
                {{ Session::forget('success') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:navigated', function() {
            const toast = document.querySelector('.toast');
            setTimeout(function() {
                toast.classList.add('show');
            }, 10000);
            setTimeout(function() {
                toast.classList.remove('show');
            }, 11000);
        });
    </script>
@elseif(session('error'))
    <div class="position-fixed bottom-0 end-0 m-2 m-sm-3 m-md-4 m-lg-5" style="z-index: 2;">
        <div class="toast show">
            <div class="toast-header">
                <img src="{{ asset('images/logo.png') }}" class="rounded me-2" alt="..." width="20"
                    height="15">
                <strong class="me-auto text-primary fw-bold">ISPB Notification!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <p class="mb-0"><strong class="text-danger">Failed!</strong> {{ session('error') }}</p>
                {{ Session::forget('error') }}
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('livewire:navigated', function() {
            const toast = document.querySelector('.toast');
            setTimeout(function() {
                toast.classList.add('show');
            }, 10000);
            setTimeout(function() {
                toast.classList.remove('show');
            }, 11000);
        });
    </script>
@elseif(session('create_success'))
    <div class="alert alert-danger alert-dismissible fade show position-absolute top-0 start-50 translate-middle mt-5 fs-5"
        role="alert">
        {{ session('create_success') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>

    <div class="position-fixed bottom-0 end-0 m-2 m-sm-3 m-md-4 m-lg-5" style="z-index: 9999;">
        <div class="toast show">
            <div class="toast-header">
                <img src="{{ asset('images/logo.png') }}" class="rounded me-2" alt="..." width="20"
                    height="15">
                <strong class="me-auto text-primary fw-bold">Account Notice!</strong>
                <button type="button" class="btn-close" data-bs-dismiss="toast"></button>
            </div>
            <div class="toast-body">
                <p class="mb-0">{{ session('create_success') }}</p>
                {{ Session::forget('create_success') }}
                
            </div>
        </div>
    </div>
@elseif (session('error_modal'))
    <span class="text-danger p-3">
        {{ session('error_modal') }}
        {{ Session::forget('error_modal') }}
    </span>
@elseif(session('success_modal'))
    <span class="text-success">
        {{ session('success_modal') }}
        {{ Session::forget('success_modal') }}
    </span>
@endif


