@extends('layouts.common')
@section('title', '管理画面')
@section('content')
<p>ユーザ管理</p>
<ul>
    <li><a href="{{ route('user.index') }}">ユーザ一覧</a></li>
    <li><a href="{{ route('user.create') }}">ユーザ追加</a></li>
</ul>
@endsection
