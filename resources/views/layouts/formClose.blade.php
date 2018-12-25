    <div class="form-group">
        @switch ($show)
            @case ('confirm')
                {{ Form::submit('送信', ['class' => 'btn btn-primary']) }}
                {!! Form::back('戻る', null, ['class' => 'btn btn-primary-outline']) !!}
                @break
            @case ('show')
                {!! Form::back('戻る', $name, ['class' => 'btn btn-primary-outline']) !!}
                @break
            @default
                {{ Form::submit('確認画面へ', ['class' => 'btn btn-primary']) }}
                @break
        @endswitch
    </div>
{{ Form::close() }}
