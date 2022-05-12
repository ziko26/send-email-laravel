@if(Session::has('success'))
<div class="alert bg-success alert-icon-left alert-arrow-left alert-dismissible mb-2 text-white" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">×</span>
        </button>
        {{Session::get('success')}}
</div>
@endif