@extends ('admin.layouts.common')
@section ('title', '店舗一覧')
@section ('content')
<article class="content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">店舗一覧</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<script>
    $('.sidebar-menu').children('#shops').addClass('active');
</script>
@endsection
