@extends('admin.layouts.common')
@section('title', '社員登録')
@section('content')
<article class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title">社員登録</h3>
                    </div>
                    @include('layouts.formOpen', ['name' => 'admin.user'])
                        <div class="form-group row">
                            {{ Form::label('email', 'メールアドレス', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                @if ($confirm !== 'show')
                                {{ $value['email'] }}
                                @else
                                <a href="mailto:{{ $value['email'] }}">{{ $value['email'] }}</a>
                                @endif
                                @else
                                {{ Form::email('email', null, ['class' => 'form-control', 'placeholder' => 'example@email.com']) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('role', '権限', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $roles[$value['role']] }}
                                @else
                                {{ Form::select('role', [2 => 'マスター管理者', 5 => '管理者', 10 => '一般'], 10, ['class' => 'form-control']) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('code', '社員番号', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $value['code'] }}
                                @else
                                {{ Form::number('code', null, ['class' => 'form-control']) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('last_name', '名前', ['class' => 'col-sm-2 form-control-label']) }}
                            @if ($confirm)
                            <div class="col-sm-10">
                            {{ $value['last_name'] . ' ' . $value['first_name'] }}
                            </div>
                            @else
                            <div class="col-sm-5">
                            {{ Form::text('last_name', null, ['class' => 'form-control form-half', 'placeholder' => '山田']) }}
                            </div>
                            <div class="col-sm-5">
                            {{ Form::text('first_name', null, ['class' => 'form-control form-half', 'placeholder' => '太郎']) }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            {{ Form::label('l_n_kana', '名前(カナ)', ['class' => 'col-sm-2 form-control-label']) }}
                            @if ($confirm)
                            <div class="col-sm-10">
                            {{ $value['l_n_kana'] . ' ' . $value['f_n_kana'] }}
                            </div>
                            @else
                            <div class="col-sm-5">
                            {{ Form::text('l_n_kana', null, ['class' => 'form-control form-half', 'placeholder' => 'ヤマダ']) }}
                            </div>
                            <div class="col-sm-5">
                            {{ Form::text('f_n_kana', null, ['class' => 'form-control form-half', 'placeholder' => 'タロウ']) }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            {{ Form::label('', '性別', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $gender[$value['gender']] }}
                                @else
                                {{ Form::radio('gender', 0, true, ['id'=>'men']) }}
                                {{ Form::label('men', '男性') }}
                                {{ Form::radio('gender', 1, false, ['id'=>'women']) }}
                                {{ Form::label('women', '女性') }}
                                {{ Form::radio('gender', 2, false, ['id'=>'others']) }}
                                {{ Form::label('others', 'その他') }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('birthday', '誕生日', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-5">
                                @if ($confirm)
                                {{ $value['birthday'] }}
                                @else
                                {{ Form::input('date', 'birthday', date('Y-m-d'), ['class' => 'form-control']) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('zip1', '郵便番号', ['class' => 'col-sm-2 form-control-label']) }}
                            @if ($confirm)
                            <div class="col-sm-10">
                            @if ($value['zip1'] || $value['zip2'])
                            {{ $value['zip1'] . '-' . $value['zip2'] }}
                            @endif
                            </div>
                            @else
                            <div class="col-sm-3">
                            {{ Form::text('zip1', null, ['id' => 'zip1', 'class' => 'form-control form-half', 'placeholder' => '213']) }}
                            </div>
                            <strong>-</strong>
                            <div class="col-sm-3">
                            {{ Form::text('zip2', null, ['id' => 'zip2', 'class' => 'form-control form-half', 'placeholder' => '0014']) }}
                            </div>
                            @endif
                        </div>
                        <div class="form-group row">
                            {{ Form::label('pref', '住所', ['class' => 'col-sm-2 form-control-label']) }}
                            @if ($confirm)
                            <div class="col-sm-10">
                                {{ $value['pref'] . ' ' . $value['city'] . ' ' . $value['street'] }}
                            </div>
                            @else
                            <div class="col-sm-3">
                            {{ Form::text('pref', null, ['id' => 'pref', 'class' => 'form-control form-one-third', 'placeholder' => '神奈川県']) }}
                            </div>
                            <div class="col-sm-3">
                            {{ Form::text('city', null, ['id' => 'city', 'class' => 'form-control form-one-third', 'placeholder' => '川崎市高津区']) }}
                            </div>
                            <div class="col-sm-4">
                            {{ Form::text('street', null, ['id' => 'street', 'class' => 'form-control form-one-third', 'placeholder' => '新作1-1-1']) }}
                            </div>
                            {{ Form::hidden('street_kana', null, ['id' => 'street_kana']) }}
                            @endif
                        </div>
                        <div class="form-group row">
                            {{ Form::label('building', '建物名/部屋番号', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $value['building'] }}
                                @else
                                {{ Form::text('building', null, ['class' => 'form-control', 'placeholder' => '田中マンション 101号室']) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('tel_private', '電話番号(個人)', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $value['tel_private'] }}
                                @else
                                {{ Form::number('tel_private', null, ['class' => 'form-control', 'placeholder' => '0344445555']) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('tel_work', '電話番号(会社)', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $value['tel_work'] }}
                                @else
                                {{ Form::number('tel_work', null, ['class' => 'form-control', 'placeholder' => '07088889999']) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('section_code', '部署', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $sections[$value['section_code']] }}
                                @else
                                <select class='form-control' id='section_code' name='section_code'>
                                    <option value='' disabled selected style='display:none;'>選択してください</option>
                                    @foreach ($sections as $key => $value)
                                    @if (old('section_code') == $key)
                                    <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('position_code', '役職', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($confirm)
                                {{ $positions[$value['position_code']] }}
                                @else
                                <select class='form-control' id='position_code' name='position_code'>
                                    @foreach ($positions as $key => $value)
                                    @if (old('position_code') == $key)
                                    <option value="{{ $key }}" selected="selected">{{ $value }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @endif
                            </div>
                        </div>
                    @include('layouts.formClose', ['name' => 'admin.user'])
                </div>
            </div>
        </div>
    </div>
</article>
<script>
    $('.sidebar-menu').children('#users').addClass('active');
</script>
@endsection
