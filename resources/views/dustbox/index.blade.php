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
                    <h4>●ゴミ箱({{ $dusted_memos->count() }})</h4>
                </div>
            </div>

            <div class="row">
                <a href="/memo" class="col-md-2 offset-1 btn btn-primary">メモ一覧に戻る</a>
                <a href="/all-del" class="col-md-2 btn btn-danger">ゴミ箱を空にする</a>
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
                        @foreach($dusted_memos as $dusted_memo)
                        <tr>
                            <td><a href="/dustbox/{{ $dusted_memo->id }}">{{ $dusted_memo->title }}</a><td>
                            <td>
                                <form action="/dustbox/{{ $dusted_memo->id }}" method="post">
                                    <input type="hidden" name="_method" value="PUT">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="submit" class="btn btn-primary">もとに戻す</button>
                                </form>
                            </td>
                            <td>
                                <form action="/dustbox/{{ $dusted_memo->id }}" method="post">
                                    <input type="hidden" name="_method" value="DELETE">
                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">

                                    <button type="submit" class="btn btn-primary">完全に削除</button>
                                </form>
                            </td>
                        </tr>
                        @endforeach
                        @if($dusted_memos->count() == 0)
                        <tr>
                            <td>ゴミ箱は空です…</td>
                            <td></td>
                            <td></td>
                        </tr>
                        @endif
                    </tbody>
                </table>
            </div>

        </div>

        <footer>
        </footer>
    </div>

</body>

@endsection