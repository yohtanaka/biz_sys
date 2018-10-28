@extends('layouts.common')
@section('title', '日報作成')
@section('content')
<h1 class="title">日報登録</h1>
{!! Form::open() !!}
<table class="form-group">
    <tr>
        <td>
            {!! Form::label('submitted_at', '報告日') !!}
            {!! Form::input('date', 'submitted_at', date('Y-m-d'), ['class' => 'form-control form-inline']) !!}
        </td>
        <td>
            {!! Form::select('use_train', ['走行距離', '電車移動']) !!}
            {!! Form::input('number', 'mileage', '', ['class' => 'form-control form-inline']) !!}
        </td>
    </tr>
</table>
<hr>
<table class="form-group">
    @for ($i = 0; $i < 8; $i ++)
    <tr>
        <td>
            店舗{{ $i + 1 }}
            {!! Form::text('shop', null, ['class' => 'form-control form-inline']) !!}
        </td>
        <td>
            担当者
            {!! Form::text('staff', null, ['class' => 'form-control form-inline']) !!}
        </td>
        <td>
            <a href="#">報告内容に追加</a>
        </td>
    </tr>
    @endfor
</table>
<hr>
<div class="form-group">
    {!! Form::label('body', '報告内容') !!}
</div>
<div class="form-group">
    {!! Form::textarea('body', null, ['class' => 'form-control']) !!}
</div>
<div class="form-group">
    {!! Form::submit('確認する', ['class' => 'btn btn-primary form-control']) !!}
</div>
{!! Form::close() !!}
@endsection
