@extends('layouts.common')
@section('title', 'ユーザ登録')
@php
    use App\Models\User;
@endphp
@section('content')
<h1 class="title">ユーザ登録</h1>
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif

@if ($confirm)
    @if ($edit)
        {{ Form::open(['route' => ['user.update', 'id' => $id], 'method' => 'put', 'class' => 'form-horizontal']) }}
    @else
        {{ Form::open(['route' => ['user.store'], 'class' => 'form-horizontal']) }}
    @endif
@else
    {{ Form::open(['route' => ['user.confirm'], 'class' => 'form-horizontal']) }}
@endif

@if ($edit)
    {{ Form::hidden('edit', 'true') }}
@endif
<table class="form-group">
    <tr>
        <th class="table-heading">{{ Form::label('email', 'メールアドレス') }}</td>
        @if ($confirm)
        <td>{{ $value['email'] }}</td>
        @else
        <td>{{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@email.com']) }}</td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('role', '権限') }}</td>
        @if ($confirm)
        <td>{{ User::$role[$value['role']] }}</td>
        @else
        <td>{{ Form::select('role', [
            2  => 'マスター管理者',
            5  => '管理者',
            10 => '一般',
        ], 10, ['class' => 'form-control']) }}</td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('code', '社員番号') }}</td>
        @if ($confirm)
        <td>{{ $value['code'] }}</td>
        @else
        <td>{{ Form::number('code', null, ['class' => 'form-control']) }}</td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('last_name', '名前') }}</td>
        @if ($confirm)
        <td>{{ $value['last_name'] . ' ' . $value['first_name'] }}</td>
        @else
        <td>
            {{ Form::text('last_name', null, ['class' => 'form-control form-half', 'placeholder' => '山田']) }}
            {{ Form::text('first_name', null, ['class' => 'form-control form-half', 'placeholder' => '太郎']) }}
        </td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('l_n_kana', '名前(カナ)') }}</td>
        @if ($confirm)
        <td>{{ $value['l_n_kana'] . ' ' . $value['f_n_kana'] }}</td>
        @else
        <td>
            {{ Form::text('l_n_kana', null, ['class' => 'form-control form-half', 'placeholder' => 'ヤマダ']) }}
            {{ Form::text('f_n_kana', null, ['class' => 'form-control form-half', 'placeholder' => 'タロウ']) }}
        </td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">性別</td>
        @if ($confirm)
        <td>{{ User::$gender[$value['gender']] }}</td>
        @else
        <td>
            {{ Form::radio('gender', 0, true, ['id'=>'men']) }}
            {{ Form::label('men', '男性') }}
            {{ Form::radio('gender', 1, false, ['id'=>'women']) }}
            {{ Form::label('women', '女性') }}
            {{ Form::radio('gender', 2, false, ['id'=>'others']) }}
            {{ Form::label('others', 'その他') }}
        </td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('birthday', '誕生日') }}</td>
        @if ($confirm)
        <td>{{ $value['birthday'] }}</td>
        @else
        <td>{{ Form::input('date', 'birthday', date('Y-m-d'), ['class' => 'form-control']) }}</td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('zip1', '郵便番号') }}</td>
        @if ($confirm)
        <td>{{ $value['zip1'] . '-' . $value['zip2'] }}</td>
        @else
        <td>
            {{ Form::text('zip1', null, ['id' => 'zip1', 'class' => 'form-control form-half', 'placeholder' => '213']) }}
            <strong>-</strong>
            {{ Form::text('zip2', null, ['id' => 'zip2', 'class' => 'form-control form-half', 'placeholder' => '0014']) }}
        </td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('pref', '住所') }}</td>
        @if ($confirm)
        <td>{{ $value['pref'] . ' ' . $value['city'] . ' ' . $value['street'] }}</td>
        @else
        <td>
            {{ Form::text('pref', null, ['id' => 'pref', 'class' => 'form-control form-one-third', 'placeholder' => '神奈川県']) }}
            {{ Form::text('city', null, ['id' => 'city', 'class' => 'form-control form-one-third', 'placeholder' => '川崎市高津区']) }}
            {{ Form::text('street', null, ['id' => 'street', 'class' => 'form-control form-one-third', 'placeholder' => '新作1-1-1']) }}
            {{ Form::hidden('street_kana', null, ['id' => 'street_kana']) }}
        </td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('building', '建物名/部屋番号') }}</td>
        @if ($confirm)
        <td>{{ $value['building'] }}</td>
        @else
        <td>{{ Form::text('building', null, ['class' => 'form-control', 'placeholder' => '田中マンション 101号室']) }}</td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('tel_private', '電話番号(個人)') }}</td>
        @if ($confirm)
        <td>{{ $value['tel_private'] }}</td>
        @else
        <td>{{ Form::number('tel_private', null, ['class' => 'form-control', 'placeholder' => '0344445555']) }}</td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('tel_work', '電話番号(会社)') }}</td>
        @if ($confirm)
        <td>{{ $value['tel_work'] }}</td>
        @else
        <td>{{ Form::number('tel_work', null, ['class' => 'form-control', 'placeholder' => '07088889999']) }}</td>
        @endif
    </tr>
    <tr>
        <th class="table-heading">{{ Form::label('section', '部署') }}</td>
        @if ($confirm)
        <td>{{ $sections->where('code', $value['section'])->first()->name }}</td>
        @else
        <td>
            <select name='section' class='form-control'>
                <option value='' disabled selected style='display:none;'>選択してください</option>
                @foreach ($sections as $section)
                <option value="{{ $section->code }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </td>
        @endif
    <tr>
        <th class="table-heading">{{ Form::label('position', '役職') }}</td>
        @if ($confirm)
        <td>{{ $positions->where('code', $value['position'])->first()->name }}</td>
        @else
        <td>
            <select name='position' class='form-control'>
                @foreach ($positions as $position)
                <option value="{{ $position->code }}">{{ $position->name }}</option>
                @endforeach
            </select>
        </td>
        @endif
    </tr>
</table>
@if ($confirm)
<button type="submit" name="action" value="post" class="btn btn-primary form-half">送信</button>
<button type="submit" name="action" value="back" class="btn btn-default form-half">戻る</button>
@else
<button type="submit" class="btn btn-primary form-control">確認画面へ</button>
@endif
@endsection
