@extends ('admin.layouts.common')
@section ('title', '商品CSV管理')
@section ('content')
<article class="content">
    @include ('layouts.fileError', ['name' => 'csvFile'])
    @include ('admin.layouts.csv', ['name' => '商品', 'route' => 'admin.item'])
</article>
<script>
    $('.sidebar-menu').children('#items').addClass('active');
</script>
@endsection
