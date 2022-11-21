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
    <title>新規登録</title>
</head>

{{-- エラーが起きて、登録ができなかった場合 --}}
@if ($errors->any())
    <div>
        <div class="alert alert-danger d-flex align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="currentColor"
                class="bi bi-exclamation-triangle-fill flex-shrink-0 me-2" viewBox="0 0 16 16">
                <path
                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
            </svg>
            <div>
                入力内容をご確認ください。
            </div>
        </div>
    </div>
@endif

<body>
    <section class="contents">
        <h2>新規登録</h2>
        <!-- 登録フォーム -->
        <form method="post" action="{{ route('todo.store') }}">
            @csrf
            <table class="table2">
                <tr>
                    <td>タスク名</td>
                    <td><input type="text" class="txt2" name="name" placeholder="必須"></td>
                </tr>
                <tr>
                    <td>タスク詳細</td>
                    <td><input type="text" class="txt2" name="text" placeholder="任意"></td>
                </tr>
                <tr>
                    <td>期限</td>
                    <td><input type="text" class="txt2" name="limit_date" placeholder="任意 YYYY-MM-DD"></td>
                </tr>
            </table>
            <div class="d-grid gap-2 d-md-flex justify-content-md-end">
                <button type="submit" class="btn btn-outline-dark" margin>登録</button>
                <span class="margin"></span>
        </form>

        <button type="button" class="btn btn-outline-dark" margin><a href="{{ route('todo.index') }}"
                class="text-dark">タスク一覧に戻る</a></button>
        </div>
        <div style="text-align: center">
            <img src="{{ asset('img/snownyan.png') }}" width="200">
        </div>
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
    </section>

</body>

</html>
