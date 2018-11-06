@extends('layouts.common')
@section('title', 'ユーザ一覧')
@section('content')
<h1 class="title">ユーザ一覧</h1>
<table>
    <tr>
        <th>名前</th>
        <th>メールアドレス</th>
        <th>部署</th>
        <th>役職</th>
        <th colspan="2">操作</th>
    </tr>
    @foreach ($users as $user)
    <tr>
        <td>{{ $user->last_name }} {{ $user->first_name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->section['name'] }}</td>
        <td>{{ $user->position['name'] }}</td>
        <td><a href="">編集</a></td>
        <td><a href="">削除</a></td>
    </tr>
    @endforeach
</table>
@endsection
