@if (Session::has('message'))
<p class="alert alert-info">{!! Session::get('message') !!}</p>
@endif
@if(Session::has('error'))
<div class="alert alert-danger">{!!Session::get('error')!!}</div>
@endif