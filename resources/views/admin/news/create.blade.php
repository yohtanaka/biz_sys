@extends ('admin.layouts.common')

@section ('title', 'お知らせ登録')

@section ('content')
<article class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title">お知らせ登録</h3>
                    </div>
                    @include ('layouts.error')
                    @include ('layouts.formOpen', ['name' => 'admin.news'])
                        <div class="form-group row">
                            {{ Form::label('title', 'お知らせタイトル', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                {{ $show ? $value['title'] : Form::text('title', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('', 'お知らせタイプ', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($show)
                                {{ $type[$value['type']] }}
                                @else
                                {{ Form::radio('type', 1, true, ['id'=>'type_1']) }}
                                {{ Form::label('type_1', $type[1]) }}
                                {{ Form::radio('type', 2, false, ['id'=>'type_2']) }}
                                {{ Form::label('type_2', $type[2]) }}
                                @endif
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('body', '本文', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                {{ $show ? $value['body'] : Form::textarea('body', null, ['class' => 'form-control']) }}
                            </div>
                        </div>
                        <div class="form-group row">
                            {{ Form::label('', '表示ステータス', ['class' => 'col-sm-2 form-control-label']) }}
                            <div class="col-sm-10">
                                @if ($show)
                                {{ $display[$value['display_flag']] }}
                                @else
                                {{ Form::radio('display_flag', 1, true, ['id'=>'display_1']) }}
                                {{ Form::label('display_1', $display[1]) }}
                                {{ Form::radio('display_flag', 2, false, ['id'=>'display_2']) }}
                                {{ Form::label('display_2', $display[2]) }}
                                @endif
                            </div>
                        </div>
                    @include ('layouts.formClose', ['name' => 'admin.news'])
                </div>
            </div>
        </div>
    </div>
</article>
<script>
    $('.sidebar-menu').children('#news').addClass('active');
</script>
@endsection
