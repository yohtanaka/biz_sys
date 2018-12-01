@extends ('admin.layouts.login')
@section ('title', '管理画面 ログイン')
@section ('content')
<div class="auth">
    <div class="auth-container">
        <div class="card">
            <header class="auth-header">
                <h1 class="auth-title">
                    <div class="logo">
                        <span class="l l1"></span>
                        <span class="l l2"></span>
                        <span class="l l3"></span>
                        <span class="l l4"></span>
                        <span class="l l5"></span>
                    </div> 管理者ページ </h1>
            </header>
            <div class="auth-content">
                <p class="text-center">ログイン</p>
                {{ Form::open(['url' => '/admin/login', 'id' => 'login-form']) }}
                    <div class="form-group">
                        {{ Form::label('username', 'メールアドレス') }}
                        {{ Form::text('username', null, ['class' => 'form-control underlined', 'placeholder' => 'Your email address']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::label('password', 'パスワード') }}
                        {{ Form::password('password', ['class' => 'form-control underlined', 'placeholder' => 'Your password']) }}
                    </div>
                    <div class="form-group">
                        <label for="remember">
                            <input class="checkbox" id="remember" type="checkbox">
                            <span>Remember Me</span>
                        </label>
                        <a href="#" id="forgotPassword" class="forgot-btn pull-right">パスワードを忘れた場合</a>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-block btn-primary">ログインする</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<script>
    $('#forgotPassword').on('click', function(e) {
        e.preventDefault();
        alert('管理者にパスワードの再発行を行なってもらってください');
    })
</script>
@endsection
