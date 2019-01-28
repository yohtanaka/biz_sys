@extends ('admin.layouts.common')

@section ('title', '企業一覧')

@section ('content')
<article class="content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">企業検索</h3>
                        </div>
                        {{ Form::open(['route' => 'admin.company.index', 'method' => 'get']) }}
                        <div class="form-group">
                            <label for="name">企業名から検索</label>
                            {{ Form::text('name', $s_name, ['class' => 'form-control']) }}
                        </div>
                        @include ('layouts.searchOrder')
                        <div class="form-group">
                            {{ Form::submit('検索', ['class' => 'btn btn-primary']) }}
                        </div>
                        {{ Form::close() }}
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
                            <h3 class="title">企業一覧</h3>
                            @include ('layouts.countList', ['list' => $companies])
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
                                        @forelse ($companies as $company)
                                        <tr class="odd gradeX">
                                            <td>{{ $company->id }}</td>
                                            <td>{{ $company->name }}</td>
                                            <td>{{ $company->code }}</td>
                                            <td>
                                                <span class="action-list">
                                                    <a class="edit" href="{{ route('admin.company.edit', $company->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.company.destroy', 'id' => $company->id], 'method' => 'delete', 'id' => 'form_' . $company->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $company->id }}" onclick="deletePost(this);">
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
        {{ $companies->appends(Request::query())->links() }}
    </nav>
</article>
<script>
    $('.sidebar-menu').children('#shops').addClass('active');
</script>
@endsection
