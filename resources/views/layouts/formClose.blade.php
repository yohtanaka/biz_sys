    @if ($confirm)
    <div class="form-group">
        @if ($confirm !== 'show')
        <button type="submit" name="action" value="post" class="btn btn-primary">送信</button>
        <button type="submit" name="action" value="back" class="btn btn-primary-outline">戻る</button>
        @else
        <a href="{{ route($name . '.index') }}" class="btn btn-primary">戻る</a>
        @endif
    </div>
    @else
    <div class="form-group">
        {{ Form::submit('確認画面へ', ['class' => 'btn btn-primary']) }}
    </div>
   @endif
{{ Form::close() }}
