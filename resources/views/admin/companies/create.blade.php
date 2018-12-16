@extends ('admin.layouts.common')

@section ('title', '企業登録')

@section ('content')
<article class="content">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title">企業登録</h3>
                    </div>
                    @include ('layouts.error')
                    @include ('layouts.formOpen', ['name' => 'admin.company'])
                    @include ('layouts.formClose', ['name' => 'admin.company'])
                </div>
            </div>
        </div>
    </div>
</article>
<script>
    $('.sidebar-menu').children('#companies').addClass('active');
</script>
@endsection
