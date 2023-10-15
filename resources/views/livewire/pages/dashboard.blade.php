@auth
    <div class="d-flex" id="wrapper">   
        @include('layout.sidebar')         
        <div class="container-fluid px-4" id="dashboard">
            @include('layout.navbar')   
            {{$slot}}
        </div>
    </div>
@endauth