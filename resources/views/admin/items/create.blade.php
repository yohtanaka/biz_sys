@extends ('admin.layouts.common')
@section ('title', '商品登録')
@section ('content')
<article class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title">商品登録</h3>
                    </div>
                    @include ('layouts.error')
                    @include ('layouts.formOpen', ['name' => 'admin.item'])
                    @include ('layouts.formClose', ['name' => 'admin.item'])
                </div>
            </div>
        </div>
    </div>
</article>
<script>
    $('.sidebar-menu').children('#items').addClass('active');
</script>
@endsection
