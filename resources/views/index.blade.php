@extends('layouts.common')
@section('title', 'システム')
@section('content')
<ul>
	<li><a href="{{ route('reports.index') }}">日報一覧</a></li>
	<li><a href="{{ route('reports.create') }}">日報作成</a></li>
</ul>
@endsection
