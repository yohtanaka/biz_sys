@extends ('admin.layouts.common')
@section ('title', '店舗CSV管理')
@section ('content')
<article class="content">
    @include ('layouts.fileError', ['name' => 'csvFile'])
    @include ('admin.layouts.csv', ['name' => '店舗', 'route' => 'admin.shop'])
</article>
<script>
    $('.sidebar-menu').children('#shops').addClass('active');
</script>
@endsection
