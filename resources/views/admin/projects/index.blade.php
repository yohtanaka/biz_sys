@extends ('admin.layouts.common')

@section ('title', 'プロジェクト登録')

@section ('content')
<article class="content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">プロジェクト登録</h3>
                        </div>
                        @include ('layouts.error')
                        {{ Form::open(['route' => 'admin.project.store']) }}
                            <div class="form-group row">
                                {{ Form::label('code', 'プロジェクトコード', ['class' => 'col-sm-2 form-control-label']) }}
                                <div class="col-sm-10">
                                    {{ Form::number('code', $next_code, ['class' => 'form-control']) }}
                                </div>
                            </div>
                            <div class="form-group row">
                                {{ Form::label('name', 'プロジェクト名', ['class' => 'col-sm-2 form-control-label']) }}
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
                            <h3 class="title">プロジェクト一覧</h3>
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>プロジェクトコード</th>
                                            <th>プロジェクト名</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($projects as $project)
                                        <tr class="odd gradeX">
                                            <td>{{ $project->code }}</td>
                                            <td>{{ $project->name }}</td>
                                            <td>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.project.destroy', 'id' => $project->id], 'method' => 'delete', 'id' => 'form_' . $project->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $project->id }}" onclick="deletePost(this);">
                                                        <i class="fa fa-trash-o"></i>
                                                    </a>
                                                    {{ Form::close() }}
                                                </span>
                                                <span class="action-list">
                                                    <a class="edit" href="#" data-code="{{ $project->code }}" data-name="{{ $project->name }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr class="odd gradeX">
                                            <td colspan="3">該当の項目がありません</td>
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
</article>
<script>
    $('.sidebar-menu').children('#sales').addClass('active');
</script>
@endsection
