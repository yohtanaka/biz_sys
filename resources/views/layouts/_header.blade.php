@php
$user = Auth::user();
$user = $user->last_name . $user->first_name;
$time = date('H');
switch ($time) {
    case $time < 6:
        $greeting = 'おやすみなさい…';
        break;
    case $time < 12:
        $greeting = 'おはようございます！';
        break;
    case $time < 18:
        $greeting = 'こんにちは！';
        break;
    default:
        $greeting = 'こんばんは！';
        break;
}
@endphp
<a href="/">
    <h1 class="left">システム</h1>
</a>
<p>{{ date('Y/m/d') }}</p>
<a class="menu" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">ログアウト</a>
<form id="logout-form" action="{{ route('logout') }}" method="POST">
    @csrf
</form>
@if ($user)
<a class="menu" href="">
    {{ $greeting }} {{ $user }} さん
</a>
@endif
