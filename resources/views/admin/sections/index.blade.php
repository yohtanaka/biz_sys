@extends ('admin.layouts.common')
@section ('title', '部署登録')
@section ('content')
<article class="content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">部署・役職登録</h3>
                        </div>
                        部署
                        <a href="{{ route('admin.position.index') }}">役職</a>
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
                            <h3 class="title">部署新規登録</h3>
                        </div>
                        @include ('layouts.error')
                        {{ Form::open(['route' => 'admin.section.store']) }}
                            <div class="form-group row">
                                {{ Form::label('code', '部署コード', ['class' => 'col-sm-2 form-control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::number('code', $next_code, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('name', '部署名', ['class' => 'col-sm-2 form-control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::text('name', null, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group">
                                {{ Form::submit('登録する', ['class' => 'btn btn-primary']) }}
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
                            <h3 class="title">部署一覧</h3>
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>部署コード</th>
                                            <th>部署名</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sections as $section)
                                        <tr class="odd gradeX">
                                            <td>{{ $section->code }}</td>
                                            <td>{{ $section->name }}</td>
                                            <td>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.section.destroy', 'id' => $section->id], 'method' => 'delete', 'id' => 'form_' . $section->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $section->id }}" onclick="deletePost(this);">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    {{ Form::close() }}
                                                </span>
                                                <span class="action-list">
                                                    <a class="edit" href="#" data-code="{{ $section->code }}" data-name="{{ $section->name }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
    </section>
</article>
<script>
    $('.sidebar-menu').children('#users').addClass('active');
</script>
@endsection
