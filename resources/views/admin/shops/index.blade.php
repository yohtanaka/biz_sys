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
                            <h3 class="title">店舗検索</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">店舗一覧</h3>
                            @include ('layouts.countList', ['list' => $shops])
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>ID</th>
                                            <th>店名</th>
                                            <th>店舗コード</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($shops as $shop)
                                        <tr class="odd gradeX">
                                            <td>{{ $shop->id }}</td>
                                            <td>{{ $shop->name }}</td>
                                            <td>{{ $shop->code }}</td>
                                            <td>
                                                <span class="action-list">
                                                    <a class="edit" href="{{ route('admin.shop.edit', $shop->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.shop.destroy', 'id' => $shop->id], 'method' => 'delete', 'id' => 'form_' . $shop->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $shop->id }}" onclick="deletePost(this);">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    {{ Form::close() }}
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="odd gradeX">
                                            <td colspan="4">該当の項目がありません</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <nav class="text-right">
        {{ $shops->appends($params)->links() }}
    </nav>
</article>
<script>
    $('.sidebar-menu').children('#shops').addClass('active');
</script>
@endsection
