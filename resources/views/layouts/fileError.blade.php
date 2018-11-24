@if($errors->first($name))
<div class="alert alert-danger">{{ $errors->first($name) }}</div>
@endif
@if(Session::has('alert'))
<div class="alert alert-danger">{{ session('alert') }}</div>
@endif
@if(Session::has('notice'))
<div class="alert alert-info">{{ session('notice') }}</div>
@endif
