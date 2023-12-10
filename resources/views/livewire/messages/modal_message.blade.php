@if (session('modal_success'))
    <span class="text-success p-3">{{session('modal_success')}}</span>
@elseif(session('modal_error'))
    <span class="text-danger">{{session('modal_error')}}</span>
@endif