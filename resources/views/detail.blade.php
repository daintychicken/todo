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
    <title>タスク詳細</title>
</head>

<body>
    <section class="contents">
        <h2>タスク詳細</h2>
        <!-- 詳細画面 -->
        <table class="table2">
            @csrf
            @method('PUT')
            <tr>
                <td class="td">タスク名</td>
                <td class="txt3" name="name" value="{{ $todolists->name }}"></td>
            </tr>
            <tr>
                <td class="td">タスク詳細</td>
                <td class="txt3" name="text" value="{{ $todolists->text }}"></td>
            </tr>
            <tr>
                <td class="td">期限</td>
                <td class="txt3" name="limit_date" value="{{ $todolists->limit_date }}"></td>
            </tr>
            <tr>
                <td class="td">ステータス</td>
                <td class="txt3" name="status" value="{{ $todolists->status }}"></td>
                {{-- ???
                if $limit_date == 1 進行中
                else if isset($completion_date) 完了
                else if $limit_date > $completion_date 期限ぎれ --}}
            </tr>
            <tr>
                <td class="td">完了日</td>
                <td class="txt3" name="completion_date" value="{{ $todolists->completion_date }}"></td>
            </tr>
        </table>

        <!-- ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark" margin><a
                    href="{{ url('/todolists') }}">タスク一覧に戻る</a></button>
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
