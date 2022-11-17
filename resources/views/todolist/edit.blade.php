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
    <title>編集</title>
</head>

<body>
    <section class="contents">
        <h2>タスク編集</h2>
        <!-- 編集フォーム -->
        <table class="table2">
            <form method="post" action="/update">
                @csrf
                @method('PUT')
                <input type="hidden" name="id" value="{{ $todolists->id }}">
                <tr>
                    <td>タスク名</td>
                    <td><input type="text" class="txt2" name="name" value="{{ $todolists->name }}"></td>
                </tr>
                <tr>
                    <td>タスク詳細</td>
                    <td><input type="text" class="txt2" name="text" value="{{ $todolists->text }}"></td>
                </tr>
                <tr>
                    <td>期限</td>
                    <td><input type="text" class="txt2" name="limit_date" value="{{ $todolists->limit_date }}">
                    </td>
                </tr>
                <tr>
                    <td>完了日</td>
                    <td><input type="text" class="txt2" name="completion_date"
                            value="{{ $todolists->completopm_date }}"></td>
                </tr>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-outline-dark" margin>更新</button>
            <span class="margin"></span>
            </form>

            <button type="button" class="btn btn-outline-dark" margin><a href="{{ route('todo.index') }}"
                    class="text-dark">タスク一覧に戻る</a></button>
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
