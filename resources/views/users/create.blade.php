@extends('layouts.common')
@section('title', 'ユーザ登録')
@section('content')
<h1 class="title">ユーザ登録</h1>
{{ Form::model($users) }}
<table class="form-group">
    <tr>
        <th class="table-heading">{{ Form::label('email', 'メールアドレス') }}</td>
        <td>{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' =>  'example@email.com']) }}</td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('role', '権限') }}</td>
        <td>{{ Form::select('role', [
            2  => 'マスター管理者',
            5  => '管理者',
            10 => '一般',
        ], 10, ['class' => 'form-control']) }}</td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('code', '社員番号') }}</td>
        <td>{{ Form::number('code', null, ['class' => 'form-control']) }}</td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('last_name', '名前') }}</td>
        <td>
            {{ Form::text('last_name', null, ['class' => 'form-control form-short', 'placeholder' =>  '山田']) }}
            {{ Form::text('first_name', null, ['class' => 'form-control form-short', 'placeholder' =>  '太郎']) }}
        </td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('l_n_kana', '名前(カナ)') }}</td>
        <td>
            {{ Form::text('l_n_kana', null, ['class' => 'form-control form-short', 'placeholder' =>  'ヤマダ']) }}
            {{ Form::text('f_n_kana', null, ['class' => 'form-control form-short', 'placeholder' =>  'タロウ']) }}
        </td>
    </tr>
    <tr>
        <th class="table-heading">性別</td>
        <td>
            {{ Form::radio('gender', 0, true, ['id'=>'men']) }}
            {{ Form::label('men', '男性') }}
            {{ Form::radio('gender', 1, false, ['id'=>'women']) }}
            {{ Form::label('women', '女性') }}
            {{ Form::radio('gender', 2, false, ['id'=>'others']) }}
            {{ Form::label('others', 'その他') }}
        </td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('birthday', '誕生日') }}</td>
        <td>{{ Form::input('date', 'birthday', date('Y-m-d'), ['class' => 'form-control']) }}</td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('zip1', '郵便番号') }}</td>
        <td>
            {{ Form::text('zip1', null, ['class' => 'form-control form-short', 'placeholder' =>  '213']) }}
            <strong>-</strong>
            {{ Form::text('zip2', null, ['class' => 'form-control form-short', 'placeholder' =>  '0014']) }}
        </td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('perf', '住所') }}</td>
        <td>
            <select name='pref' class='form-control form-short'>
                <option value='' disabled selected style='display:none;'>神奈川</option>
                @foreach ($cities as $city)
                <option value='$i'>{{ $city->pref_name }}</option>
                @endforeach
            </select>
            {{ Form::text('city', null, ['class' => 'form-control form-short', 'placeholder' =>  '川崎市高津区']) }}
            {{ Form::text('street', null, ['class' => 'form-control form-short', 'placeholder' =>  '新作1-1-1']) }}
        </td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('building', '建物名/部屋番号') }}</td>
        <td>{{ Form::text('building', null, ['class' => 'form-control', 'placeholder' =>  '田中マンション 101号室']) }}</td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('tel_private', '電話番号(個人)') }}</td>
        <td>{{ Form::number('tel_private', null, ['class' => 'form-control', 'placeholder' =>  '0344445555']) }}</td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('tel_work', '電話番号(会社)') }}</td>
        <td>{{ Form::number('tel_work', null, ['class' => 'form-control', 'placeholder' =>  '07088889999']) }}</td>
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('section', '部署') }}</td>
        <td>
            <select name='section' class='form-control'>
                <option value='0'>選択してください</option>
                @foreach ($sections as $section)
                <option value="{{ $section->code }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </td>
    <tr>
        <th class="table-heading">{{ Form::label('position', '役職') }}</td>
        <td>
            <select name='position' class='form-control'>
                @foreach ($positions as $position)
                <option value="{{ $position->code }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </td>
    </tr>
 </table>
{{ Form::submit('確認する', ['class' => 'btn btn-primary form-control']) }}
{{ Form::close() }}
@endsection
