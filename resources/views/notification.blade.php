<!-- SESSION -->
@if (Session::has('msgSuccess'))
<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('msgSuccess') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
@if (Session::has('msgError'))
<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>{{ Session::get('msgError') }}</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
@endif
<!-- SESSION -->