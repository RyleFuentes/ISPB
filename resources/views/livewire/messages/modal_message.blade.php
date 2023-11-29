@if (session('error_modal'))
    <span class="text-danger p-3">
        {{session('error_modal')}}
    </span>
@endif
