@php
$user = Auth::user();
@endphp
<a href="/">
  <h1 class="left">システム</h1>
</a>
@if($user)
	<a class="menu" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
	<form id="logout-form" action="{{ route('logout') }}" method="POST">
		@csrf
	</form>
	<a class="menu" href="">
	@if($user)
		こんにちは！{{$user->name}}さん
	@endif
	</a>
@else
	<a class="menu" href="{{ route('login') }}">ログイン</a>
	<a class="menu" href="{{ route('register') }}">新規登録</a>
@endif
