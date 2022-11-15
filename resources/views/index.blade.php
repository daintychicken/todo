<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title>! Todoリスト !</title>
</head>

<body>
    <h1>Todoリスト</h1>
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-light btn-sm" disabled>ログアウト</button>
    </div>
    <hr>
    <br>
    <!-- 新規登録ボタン -->
    <div class="d-grid gap-2 d-md-flex justify-content-md-end">
        <button type="button" class="btn btn-outline-dark" disabled>新規登録</button>
    </div>
    <br>

    <!-- 検索フォーム -->
    <table>
        <thead>
            <tr class="head">
                <th>No</th>
                <th>タスク名</th>
                <th>期限</th>
                <th>ステータス</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td><input type="search" name="search"
                        value="@if (isset($search)) {{ $search }} @endif"></td>
                <td><input type="search" name="search"
                        value="@if (isset($search)) {{ $search }} @endif"></td>
                <td><input type="search" name="search"
                        value="@if (isset($search)) {{ $search }} @endif"></td>
                <td><input type="search" name="search"
                        value="@if (isset($search)) {{ $search }} @endif"></td>
            </tr>
        </tbody>
    </table>
    <br>
    <div class="d-grid gap-2 justify-content-md-end">
        <button type="button" class="btn btn-outline-dark btn-sm" disabled>検索</button>
        <button type="button" class="btn btn-outline-dark btn-sm" disabled>クリア</button>
    </div>

    <!-- Todoリスト表示 -->
    <div class="todolists">
        <table class="table table-striped">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">タスク名</th>
                    <th scope="col">期限</th>
                    <th scope="col">ステータス</th>
                    <th scope="col">詳細</th>
                    <th scope="col">編集</th>
                    <th scope="col">削除</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($todolists as $todo)
                    <tr>
                        <td>{{ $todo->id }}</td>
                        <td>{{ $todo->name }}</td>
                        <td>{{ $todo->limit_date }}</td>
                        <td>{{ $todo->status }}</td>
                        <td><button type="button" class="btn btn-outline-dark rounded-circle p-0"
                                style="width:2rem;height:2rem;">＋</button></td>
                        <td><button type="button" class="btn btn-outline-dark rounded-circle p-0"
                                style="width:2rem;height:2rem;">＋</button></td>
                        <td><button type="button" class="btn btn-outline-danger rounded-circle p-0"
                                style="width:2rem;height:2rem;">！</button></td>
                    </tr>
                @endforeach
            </tbody>
    </div>
    </table>


    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"
        integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"
        integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous">
    </script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"
        integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous">
    </script>
</body>

</html>
