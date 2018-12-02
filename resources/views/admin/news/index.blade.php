@extends ('admin.layouts.common')
@section ('title', 'お知らせ一覧')
@section ('content')
<article class="content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">お知らせ検索</h3>
                        </div>
                        {{ Form::open(['route' => 'admin.news.index', 'method' => 'get']) }}
                        <div class="form-group">
                            <label for="name">タイトル・本文から検索</label>
                            {{ Form::text('name', $s_name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label>お知らせタイプ・表示ステータスで絞り込み</label>
                        </div>
                        <div class="row form-group" style="margin-top: -15px;">
                            <div class="col-4">
                                {{ Form::radio('type', '', true, ['id' => 'type_all']) }}
                                {{ Form::label('type_all', '全て') }}
                                @foreach ($type as $key => $value)
                                @if ($s_type == $key)
                                {{ Form::radio('type', $key, true, ['id' => "type_${key}"]) }}
                                @else
                                {{ Form::radio('type', $key, false, ['id' => "type_${key}"]) }}
                                @endif
                                {{ Form::label("type_${key}", $value) }}
                                @endforeach
                            </div>
                            <div class="col-4">
                                {{ Form::radio('display', '', true, ['id' => 'df_all']) }}
                                {{ Form::label('df_all', '全て') }}
                                @foreach ($display as $key => $value)
                                @if ($s_display == $key)
                                {{ Form::radio('display', $key, true, ['id' => "df_${key}"]) }}
                                @else
                                {{ Form::radio('display', $key, false, ['id' => "df_${key}"]) }}
                                @endif
                                {{ Form::label("df_${key}", $value) }}
                                @endforeach
                            </div>
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
                            <h3 class="title">お知らせ一覧</h3>
                            @include ('layouts.countList', ['list' => $list])
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>ID</th>
                                            <th>タイトル</th>
                                            <th>タイプ</th>
                                            <th>最終更新者</th>
                                            <th>表示</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($list as $news)
                                        <tr class="odd gradeX">
                                            <td>{{ $news->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.news.show', $news->id) }}">
                                                    {{ $news->title }}
                                                </a>
                                            </td>
                                            <td>{{ $type[$news->type] }}</td>
                                            <td>{{ $news->user->getFullName() }}</td>
                                            <td>{{ $display[$news->display_flag] }}</td>
                                            <td>
                                                <span class="action-list">
                                                    <a class="edit" href="{{ route('admin.news.edit', $news->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.news.destroy', 'id' => $news->id], 'method' => 'delete', 'id' => 'form_' . $news->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $news->id }}" onclick="deletePost(this);">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    {{ Form::close() }}
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="odd gradeX">
                                            <td colspan="6">該当の項目がありません</td>
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
    $('.sidebar-menu').children('#news').addClass('active');
</script>
@endsection
