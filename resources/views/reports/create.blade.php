@extends('layouts.common')
@section('title', '日報作成')
@section('content')
{!! Form::open() !!}
    <table>
        <tr>
            <td class="form-group">
                {!! Form::label('submitted_at', '報告日') !!}
            </td>
            <td class="form-group">
                {!! Form::input('date', 'submitted_at', date('Y-m-d'), ['class' => 'form-control']) !!}
            </td>
            <td class="form-group">
                {!! Form::select('use_train', ['走行距離', '電車移動'], ['class' => 'form-control']) !!}
            </td>
            <td class="form-group">
                {!! Form::input('number', 'mileage', '', ['class' => 'form-control']) !!}
            </td>
        </tr>
    </table>
    @for ($i = 0; $i < 8; $i ++)
        <table>
            <tr>
                <tr class="form-group">
                    {!! Form::label('shop', '店舗') !!}
                    {{ $i + 1 }}
                    {!! Form::text('shop', null, ['class' => 'form-control']) !!}
                </tr>
                <tr class="form-group">
                    {!! Form::label('staff', '担当者') !!}
                    {!! Form::text('staff', null, ['class' => 'form-control']) !!}
                </tr>
                <tr class="form-group">
                    <a href="#">報告内容に追加</a>
                </tr>
            </tr>
        </table>
    @endfor
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
