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
                <div class="col-md-10 offset-1">
                    <a href="/memo/create" class="btn btn-primary">＋新規メモ</a>
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
    </div>

</body>
@endsection