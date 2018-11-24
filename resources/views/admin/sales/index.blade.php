@extends('admin.layouts.common')
@section('title', '売上一覧')
@section('content')
<article class="content">
    @include('layouts.fileError', ['name' => 'csvFile'])
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">売上CSVアップロード</h3>
                        </div>
                        {{ Form::open(['route' => 'admin.sales.upload', 'files' => true]) }}
                        <div class="form-group">
                            {{ Form::file('csvFile', ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            {{ Form::submit('アップロード', ['class' => 'btn btn-primary']) }}
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
                            <h3 class="title">売上CSVダウンロード</h3>
                        </div>
                        {{ Form::open(['route' => 'admin.sales.download', 'method' => 'get']) }}
                        <div class="form-group">
                        </div>
                        <div class="form-group">
                            {{ Form::submit('ダウンロード', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<script>
    $('.sidebar-menu').children('#users').addClass('active');
</script>
@endsection
