@extends('layout')
@section('content')

<body>

    <div class="container-fluid">
        <header>
            <h3>memoapp!</h3>
            <hr>
        </header>

        <div class="main">
            <table>
                <thead>
                    <tr>
                        <td>登録日</td>
                        <td>組織</td>
                        <td>地域</td>
                        <td>学校名</td>
                        <td>営業担当</td>
                        <td>ベース</td>
                        <td>辞書数</td>
                    </tr>
                </thead>
            @foreach($salesCustomData as $item)
                    <tbody>
                        <tr>
                        <td>{{ $item->customize_date }}</td>
                        <td>組織</td>
                        <td>地域</td>
                        <td>学校名</td>
                        <td>営業担当</td>
                        <td>ベース</td>
                        <td>辞書数</td>
                        </tr>
                    </tbody>
            @endforeach
            </table>
        </div>
    </div>

</body>
@endsection