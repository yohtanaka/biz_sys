<section class="section">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-block">
                    <div class="card-title-block">
                        <h3 class="title">{{ $name }}CSVアップロード</h3>
                    </div>
                    {{ Form::open(['route' => $route . '.upload', 'files' => true]) }}
                    <div class="form-group">
                        {{ Form::file('csvFile', ['class' => 'form-control']) }}
                    </div>
                    <div class="form-group">
                        {{ Form::submit('アップロード', ['class' => 'btn btn-primary']) }}
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
                        <h3 class="title">{{ $name }}CSVダウンロード</h3>
                    </div>
                    {{ Form::open(['route' => $route . '.download', 'method' => 'get']) }}
                    <div class="form-group">
                        {{ Form::submit('ダウンロード', ['class' => 'btn btn-primary']) }}
                    </div>
                    {{ Form::close() }}
                </div>
            </div>
        </div>
    </div>
</section>
