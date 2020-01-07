@extends('layout')
@section('content')

<body>

    <div class="container-fluid">
        <header>
            <h3>memoapp!</h3>
            <hr>
        </header>

        <div class="main">
            @foreach($postData as $item)
            <p>{{ $item }}</p>
            @endforeach
            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter">垂直方向に中央揃えのモーダル</button>
        </div>
    </div>

    <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalCenterTitle">モーダルのタイトル</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="閉じる">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="/test">
                <div class="modal-body">
                    <p>モーダルのコンテンツ文。</p>
                    <div class="form-group">
                        <label for="name" class="control-label">名前</label>
                        <input type="text" class="form-control" id="name" name="name">
                    </div>
                    <div class="form-group">
                        <label for="age" class="control-label">年齢</label>
                        <select class="form-control" id="age" name="age">
                            <option></option>
                            <option value="1">20歳未満</option>
                            <option value="2">21～30歳</option>
                            <option value="3">31～40歳</option>
                        </select>
                </div>
                <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">閉じる</button>
                        <button type="submit" class="btn btn-primary">名前をpost</button>
                </div>
            </form>
        </div>
    </div>

</body>
@endsection