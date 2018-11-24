@extends('admin.layouts.common')
@section('title', '管理画面')
@section('content')
<article class="content">
    <div class="title-block">
        <h3 class="title">お知らせ</h3>
        <p class="title-description"><a href="{{ route('admin.news.index') }}">お知らせ管理</a>で編集できます</p>
    </div>
    <section class="section">
        @foreach($list as $news)
        <div class="col-12">
            <div class="card card-primary">
                <div class="card-header">
                    <div class="header-block">
                        <p class="title">{{ $news->title }}</p>
                    </div>
                </div>
                <div class="card-block">
                    <p>{{ $news->body }}</p>
                </div>
                <div class="card-footer right">
                    {{ $news->user->getFullName() }}
                    {{ $news->updated_at->format('Y/m/d') }}
                </div>
            </div>
        </div>
        @endforeach
    </section>
</article>
<script>
    $('.sidebar-menu').children('#dashboard').addClass('active');
</script>
@endsection
