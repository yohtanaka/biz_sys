@extends('layouts.common')
@section('title', 'ユーザ登録')
@section('content')
<h1>ユーザ登録</h1>
{!! Form::open() !!}
<table>
    <tr>
        <td class='form-group'>
            {!! Form::label('email', 'メールアドレス') !!}
        </td>
        <td class='form-group'>
            {!! Form::email('email', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('role', '権限') !!}
        </td>
        <td class='form-group'>
            {!! Form::text('role', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('code', '社員番号') !!}
        </td>
        <td class='form-group'>
            {!! Form::text('code', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('last_name', '名前') !!}
        </td>
        <td class='form-group'>
            {!! Form::text('last_name', null, ['class' => 'form-control']) !!}
            {!! Form::text('first_name', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('l_n_kana', '名前(カナ)') !!}
        </td>
        <td class='form-group'>
            {!! Form::text('l_n_kana', null, ['class' => 'form-control']) !!}
            {!! Form::text('f_n_kana', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            性別
        </td>
        <td class='form-group'>
            {!! Form::radio('gender', 0, true, ['id'=>'men']) !!}
            {!! Form::label('men', '男性') !!}
            {!! Form::radio('gender', 1, false, ['id'=>'women']) !!}
            {!! Form::label('women', '女性') !!}
            {!! Form::radio('gender', 2, false, ['id'=>'others']) !!}
            {!! Form::label('others', 'その他') !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('birthday', '誕生日') !!}
        </td>
        <td class='form-group'>
            {!! Form::input('date', 'birthday', date('Y-m-d'), ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('zip1', '郵便番号') !!}
        </td>
        <td class='form-group'>
            {!! Form::text('zip1', null, ['class' => 'form-control']) !!}
            <span>-</span>
            {!! Form::text('zip2', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('perf', '住所') !!}
        </td>
        <td class='form-group'>
            <select name='pref' class='form-control'>
                <option value='0'></option>
                @foreach ($cities as $city)
                <option value='$i'>{{ $city->pref_name }}</option>
                @endforeach
            </select>
            {!! Form::text('city', null, ['class' => 'form-control']) !!}
            {!! Form::text('street', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('building', '建物名/部屋番号') !!}
        </td>
        <td class='form-group'>
            {!! Form::text('building', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('tel_private', '電話番号(個人)') !!}
        </td>
        <td class='form-group'>
            {!! Form::number('tel_private', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('tel_work', '電話番号(会社)') !!}
        </td>
        <td class='form-group'>
            {!! Form::number('tel_work', null, ['class' => 'form-control']) !!}
        </td>
    </tr>
    <tr>
        <td class='form-group'>
            {!! Form::label('section', '部署') !!}
        </td>
        <td class='form-group'>
            <select name='section' class='form-control'>
                <option value='0'>選択してください</option>
                @foreach ($sections as $section)
                <option value="{{ $section->code }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </td>
    <tr>
        <td class='form-group'>
            {!! Form::label('position', '役職') !!}
        </td>
        <td class='form-group'>
            <select name='position' class='form-control'>
                @foreach ($positions as $position)
                <option value="{{ $position->code }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </td>
    </tr>
 </table>
{!! Form::close() !!}
@endsection
