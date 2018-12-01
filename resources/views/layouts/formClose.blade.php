    <div class="form-group">
    @if ($show === 'confirm')
    {{ Form::submit('送信', ['class' => 'btn btn-primary']) }}
    <button type="submit" name="action" value="back" class="btn btn-primary-outline">戻る</button>
    @elseif ($show === 'show')
    <a href="{{ route($name . '.index') }}" class="btn btn-primary">戻る</a>
    @else
    {{ Form::submit('確認画面へ', ['class' => 'btn btn-primary']) }}
    @endif
    </div>
{{ Form::close() }}
