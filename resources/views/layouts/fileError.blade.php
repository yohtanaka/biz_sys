@if ($errors->first($name))
<div class="alert alert-danger">{{ $errors->first($name) }}</div>
@elseif (Session::has('alert'))
<div class="alert alert-danger">{{ session('alert') }}</div>
@elseif (Session::has('notice'))
<div class="alert alert-info">{{ session('notice') }}</div>
@endif
