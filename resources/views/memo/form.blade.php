@extends('layout')
@section('content')

<body>

    <div class="container-fluid">
        <header>
            <h3>memoapp!</h3>
            <hr>
        </header>

        <div class="main">
            <div class="row">
                <div class="col-md-10 offset-1">
                    @if($target == 'store')
                    <h4>●新規メモ</h4>
                    @elseif($target == 'update')
                    <h4>●メモ編集</h4>
                    @endif
                </div>
            </div>

            <div class="row">
                
                @if($target == 'store')
                <form action="/memo" method="post" class="col-md-10 offset-1">
                @elseif($target == 'update')
                <form action="/memo/{{ $memo->id }}" method="post" class="col-md-10 offset-1">
                <input type="hidden" name="_method" value="PUT">
                @endif
                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                    <div class="form-row">
                    <div class="col-md-2">
                            <a href="/memo" class="btn btn-primary">戻る</a>
                        </div>
                        <div class="col-md-2">
                            <button type="submit" class="btn btn-primary">更新</button>
                        </div>
                    </div>

                    <div class="form-row">
                        <div class="form-group">
                            <label for="input-title" class="control-label">タイトル</label>
                            <input type="text" class="form-control" id="input-title" name="title" value="{{ $memo->title }}">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group">
                            <label for="input-contents" class="control-label">コンテンツ</label>
                            <textarea rows="4" class="form-control" id="input-contents" name="contents">{{ $memo->contents }}</textarea>
                        </div>
                    </div>
                    
                </form>
            </div>

        </div>

    </div>

</body>
@endsection