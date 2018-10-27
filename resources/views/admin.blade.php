@extends('layouts.common')
@section('title', '管理者画面')
@section('content')
<ul>
    <li>ユーザ管理</li>
    <li><a href="{{ route('user.index') }}">ユーザ一覧</a></li>
    <li><a href="{{ route('user.create') }}">ユーザ追加</a></li>
</ul>
@endsection
