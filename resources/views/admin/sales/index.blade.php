@extends ('admin.layouts.common')

@section ('title', '売上一覧')

@section ('content')
<article class="content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">売上検索</h3>
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
                            <h3 class="title">売上一覧</h3>
                            @include ('layouts.countList', ['list' => $list])
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>ID</th>
                                            <th>金額</th>
                                            <th>担当者</th>
                                            <th>店舗</th>
                                            <th>プロジェクトコード</th>
                                            <th>売上計上日</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($list as $sales)
                                        <tr class="odd gradeX">
                                            <td>{{ $sales->id }}</td>
                                            <td>{{ $sales->amount }}</td>
                                            <td>{{ $sales->user_code }}</td>
                                            <td>{{ $sales->shop_code }}</td>
                                            <td>{{ $sales->project_code }}</td>
                                            <td>{{ $sales->recording_date }}</td>
                                            <td>
                                                <span class="action-list">
                                                    <a class="edit" href="{{ route('admin.sales.edit', $sales->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.sales.destroy', 'id' => $sales->id], 'method' => 'delete', 'id' => 'form_' . $sales->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $sales->id }}" onclick="deletePost(this);">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    {{ Form::close() }}
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="odd gradeX">
                                            <td colspan="7">該当の項目がありません</td>
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
        {{ $list->appends($params)->links() }}
    </nav>
</article>
<script>
    $('.sidebar-menu').children('#sales').addClass('active');
</script>
@endsection
