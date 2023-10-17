

<div>
   
    <div class="d-flex" id="wrapper">
        @include('layout.sidebar')
        <div class="container-fluid px-4" id="dashboard">
            @include('layout.navbar')
            <div class="card d-flex justify-content-center align-items-center table-responsive mt-5 shadow-lg">
               <span class="text-danger">Your account is still pending, wait for the admin's confirmation to continue.</span>
            </div>
        </div>
    </div>
</div>
