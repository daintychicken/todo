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
    <section class="contents">
        <button type="button" class="logout">ログアウト</button>
        <h2>Todoリスト</h2>
        <!-- 検索フォーム -->
        <table class="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>タスク名</th>
                    {{-- <th>期限</th> --}}
                    <th>ステータス</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="txt1" name="search"></td>
                    <td><input type="text" class="txt1" name="search"></td>
                    {{-- <td><input type="text" name="search"></td> --}}
                    <td><input type="text" class="txt1" name="search"></td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm">検索</button></td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm">クリア</button></td>
                </tr>
            </tbody>
        </table>

        <!-- 新規登録ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark">新規登録</button>
        </div>

        <!-- Todoリスト表示 -->
        <div class="todolists">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">No</th>
                        <th scope="col" class="text-dark">タスク名</th>
                        <th scope="col" class="text-dark">期限</th>
                        <th scope="col" class="text-dark">ステータス</th>
                        <th scope="col" class="text-dark">詳細</th>
                        <th scope="col" class="text-dark">編集</th>
                        <th scope="col" class="text-dark">削除</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($todolists as $todo)
                        <tr>
                            <td class="text-dark">{{ $todo->id }}</td>
                            <td class="text-dark">{{ $todo->name }}</td>
                            <td class="text-dark">{{ $todo->limit_date }}</td>
                            <td class="text-dark">{{ $todo->status }}</td>
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
    </section>


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
