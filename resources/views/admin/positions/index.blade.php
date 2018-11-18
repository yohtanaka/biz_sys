@extends('admin.layouts.common')
@section('title', '役職登録')
@section('content')
<article class="content items-list-page">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">部署・役職登録</h3>
                        </div>
                        <a href="{{ route('section.index') }}">部署</a>
                        役職
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
                            <h3 class="title">役職新規登録</h3>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                        {{ Form::open(['route' => 'position.store']) }}
                            <div class="form-group row">
                                {{ Form::label('code', '役職コード', ['class' => 'col-sm-2 form-control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::number('code', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('name', '役職名', ['class' => 'col-sm-2 form-control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
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
                            <h3 class="title">役職一覧</h3>
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>役職コード</th>
                                            <th>役職名</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($positions as $position)
                                        <tr class="odd gradeX">
                                            <td>{{ $position->code }}</td>
                                            <td>{{ $position->name }}</td>
                                            <td>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['position.destroy', 'id' => $position->id], 'method' => 'delete', 'id' => 'form_' . $position->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $position->id }}" onclick="deletePost(this);">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    {{ Form::close() }}
                                                </span>
                                                <span class="action-list">
                                                    <a class="edit" href="#" data-code="{{ $position->code }}" data-name="{{ $position->name }}">
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
</article>
<script>
    function deletePost(e) {
        'use strict';
        if (confirm('本当に削除してよろしいですか？')) {
        document.getElementById('form_' + e.dataset.id).submit();
        }
    }
    $(function() {
        $('.edit').on('click', function() {
            var code = $(this).data('code');
            var name = $(this).data('name');
            $('#code').val(code);
            $('#name').val(name);
        });
    });
</script>
@endsection
