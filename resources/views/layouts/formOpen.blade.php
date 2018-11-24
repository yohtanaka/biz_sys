@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if ($confirm)
@if ($edit)
{{ Form::open(['route' => [$name . '.update', 'id' => $id], 'method' => 'put']) }}
@else
{{ Form::open(['route' => $name . '.store']) }}
@endif
@else
{{ Form::open(['route' => $name . '.confirm']) }}
@endif
@if ($edit)
{{ Form::hidden('edit', 'true') }}
@endif
