@extends ('admin.layouts.common')

@section ('title', '店舗登録')

@section ('content')
<article class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title">店舗登録</h3>
                    </div>
                    @include ('layouts.error')
                    @include ('layouts.formOpen', ['name' => 'admin.shop'])
                    @include ('layouts.formClose', ['name' => 'admin.shop'])
                </div>
            </div>
        </div>
    </div>
</article>
<script>
    $('.sidebar-menu').children('#shops').addClass('active');
</script>
@endsection
