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
                    <h4>●メモ一覧({{ $memos->count() }})</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-md-2 offset-1">
                    <a href="/memo/create" class="btn btn-primary">＋新規メモ</a>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#myModal">メモを検索</button>
                </div>
            </div>

            <div class="row">
                <table class="col-md-10 offset-1 table">
                    <thead>
                        <tr>
                            <td>タイトル</td>
                            <td></td>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($memos as $memo)
                        <tr>
                            <td><a href="/memo/{{ $memo->id }}/edit">{{ $memo->title }}</a><td>
                            <td>
                                <form action="/memo/{{ $memo->id }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="submit" class="btn btn-primary">ゴミ箱に移動</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <div class="row">
                <div class="col-md-10 offset-1">
                    <h4><a href="/dustbox">●ゴミ箱 ({{ $dusted_memos->count() }})</a></h4>
                </div>
            </div>
        </div>

        <footer>
        </footer>

        <!-- 検索モーダル -->
        <div id="myModal" class="modal fade" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4>メモを検索</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-label="close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form id="search" method="GET" action="memo">
                        <div class="modal-body">
                            <div class="form-group">
                                <label><input type="radio" value="0" name="memoClassCheck" checked="checked">指定しない</label>
                                <label><input type="radio" value="1" name="memoClassCheck">指定する</label>
                            </div>
                            <div class="form-group">
                                <label for="memoClass">
                                <select class="form-control" id="memoClass" name="memoClass">
                                    <option value="">----</option>
                                    <option value=0">タイトルから検索</option>
                                    <option value="1">コンテンツから検索</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="searchTitle" class="control-label">タイトル</label>
                                <input type="text" class="form-control" id="searchTitle" name="searchTitle">
                            </div>
                            <div class="form-group">
                                <label for="searchContents" class="control-label">コンテンツ</label>
                                <input type="text" class="form-control" id="searchContents" name="searchContents">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <a class="btn btn-outline-secondary" data-dismiss="modal">戻る</a>
                            <button type="submit" class="btn btn-primary" form="search">検索</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

</body>
@endsection