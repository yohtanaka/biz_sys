@extends('admin.layouts.common')
@section('title', '売上CSV管理')
@section('content')
<article class="content">
    @include('layouts.fileError', ['name' => 'csvFile'])
    @include('admin.layouts.csv', ['name' => '売上', 'route' => 'admin.sales'])
</article>
<script>
    $('.sidebar-menu').children('#sales').addClass('active');
</script>
@endsection
