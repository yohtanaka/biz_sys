@extends('admin.layouts.common')
@section('title', 'お知らせ一覧')
@section('content')
<article class="content items-list-page">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">お知らせ検索</h3>
                        </div>
                        {{ Form::open(['route' => 'admin.news.index', 'method' => 'get']) }}
                        <div class="form-group">
                            <label for="name">タイトル・本文から検索</label>
                            {{ Form::text('name', null, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label>お知らせタイプ・表示ステータスで絞り込み</label>
                        </div>
                        <div class="row form-group" style="margin-top: -15px;">
                            <div class="col-4">
                                {{ Form::radio('type', 1, false, ['id'=>'admin']) }}
                                {{ Form::label('admin', '管理者向け') }}
                                {{ Form::radio('type', 2, false, ['id'=>'user']) }}
                                {{ Form::label('user', 'ユーザ向け') }}
                            </div>
                            <div class="col-4">
                                {{ Form::radio('display_flag', 1, false, ['id'=>'on']) }}
                                {{ Form::label('on', '表示') }}
                                {{ Form::radio('display_flag', 2, false, ['id'=>'off']) }}
                                {{ Form::label('off', '非表示') }}
                            </div>
                        </div>
                        <div class="form-group">
                            {{ Form::submit('検索', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">お知らせ一覧</h3>
                            <p class="right">合計数: {{ count($list) }}</p>
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>お知らせタイトル</th>
                                            <th>お知らせタイプ</th>
                                            <th>投稿者</th>
                                            <th>表示</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($list as $news)
                                        <tr class="odd gradeX">
                                            <td>
                                                <a href="{{ route('admin.news.show', $news->id) }}">
                                                    {{ $news->title }}
                                                </a>
                                            </td>
                                            <td>{{ $type[$news->type] }}</td>
                                            <td>{{ $news->user->getFullName() }}</td>
                                            <td>{{ config('const.display')[$news->display_flag] }}</td>
                                            <td>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.news.destroy', 'id' => $news->id], 'method' => 'delete', 'id' => 'form_' . $news->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $news->id }}" onclick="deletePost(this);">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    {{ Form::close() }}
                                                </span>
                                                <span class="action-list">
                                                    <a class="edit" href="{{ route('admin.news.edit', $news->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <nav class="text-right">
        {{ $list->links() }}
    </nav>
</article>
<script>
    $('.sidebar-menu').children('#news').addClass('active');
</script>
@endsection
