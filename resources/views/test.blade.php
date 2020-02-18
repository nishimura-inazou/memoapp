@extends('layout')
@section('content')

<body>

    <div class="container-fluid">
        <header>
            <h3>memoapp!</h3>
            <hr>
        </header>

        <div class="main">
            <a href="{{ route('memo.download') }}">ダウンロードテスト</a>
        </div>
    </div>

</body>
@endsection