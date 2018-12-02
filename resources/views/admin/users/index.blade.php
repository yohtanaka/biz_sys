@extends ('admin.layouts.common')
@section ('title', '社員一覧')
@section ('content')
<article class="content">
    <section class="section">
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-block">
                        <div class="card-title-block">
                            <h3 class="title">社員検索</h3>
                        </div>
                        {{ Form::open(['route' => 'admin.user.index', 'method' => 'get']) }}
                        <div class="form-group">
                            <label for="name">名前・メールアドレスで検索</label>
                            {{ Form::text('name', $s_name, ['class' => 'form-control']) }}
                        </div>
                        <div class="form-group">
                            <label>部署・役職で絞り込み</label>
                        </div>
                        <div class="row form-group" style="margin-top: -15px;">
                            <div class="col-6">
                                <select name='section' class='form-control'>
                                    <option value=''>選択してください</option>
                                    @foreach ($sections as $key => $value)
                                    @if ($s_section == $key)
                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-6">
                                <select name='position' class='form-control'>
                                    <option value=''>選択してください</option>
                                    @foreach ($positions as $key => $value)
                                    @if ($s_position == $key)
                                    <option value="{{ $key }}" selected>{{ $value }}</option>
                                    @else
                                    <option value="{{ $key }}">{{ $value }}</option>
                                    @endif
                                    @endforeach
                                </select>
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
                            <h3 class="title">社員一覧</h3>
                            <p class="right">
                            @include ('layouts.countList', ['list' => $users])
                            </p>
                        </div>
                        <section class="example">
                            <div class="table-flip-scroll">
                                <table class="table table-striped table-bordered table-hover flip-content">
                                    <thead class="flip-header">
                                        <tr>
                                            <th>ID</th>
                                            <th>名前</th>
                                            <th>メールアドレス</th>
                                            <th>部署</th>
                                            <th>役職</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($users as $user)
                                        <tr class="odd gradeX">
                                            <td>{{ $user->id }}</td>
                                            <td>
                                                <a href="{{ route('admin.user.show', $user->id) }}">
                                                    {{ $user->getFullName() }}
                                                </a>
                                            </td>
                                            <td>
                                                <a href="mailto:{{ $user->email }}">
                                                    {{ $user->email }}
                                                </a>
                                            </td>
                                            <td>{{ $user->section['name'] }}</td>
                                            <td>{{ $user->position['name'] }}</td>
                                            <td>
                                                <span class="action-list">
                                                    <a class="edit" href="{{ route('admin.user.edit', $user->id) }}">
                                                        <i class="fa fa-pencil"></i>
                                                    </a>
                                                </span>
                                                <span class="action-list">
                                                    {{ Form::open(['route' => ['admin.user.destroy', 'id' => $user->id], 'method' => 'delete', 'id' => 'form_' . $user->id]) }}
                                                    <a class="remove" href="#" data-toggle="modal" data-target="#confirm-modal" data-id="{{ $user->id }}" onclick="deletePost(this);">
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
        {{ $users->appends($params)->links() }}
    </nav>
</article>
<script>
    $('.sidebar-menu').children('#users').addClass('active');
</script>
@endsection
