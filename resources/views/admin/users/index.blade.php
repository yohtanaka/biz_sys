@extends('admin.layouts.common')
@section('title', 'ユーザ一覧')
@section('content')
<article class="content">
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
                <td><a href="{{ route('user.edit', $user->id) }}">編集</a></td>
                {{ Form::open(['route' => ['user.destroy', 'id' => $user->id], 'method' => 'delete', 'id' => 'form_' . $user->id]) }}
                    <td><a href="#" data-id="{{ $user->id }}" onclick="deletePost(this);">削除</a></td>
                {{ Form::close() }}
            </tr>
        @endforeach
    </table>
</article>
<script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除してよろしいですか？')) {
        document.getElementById('form_' + e.dataset.id).submit();
        }
    }
</script>
</article>
@endsection
