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
    <title>マイページ</title>
</head>

<body>
    <section class="contents">
        <h2>{{ $user->name }} のマイページ</h2>
        @if (empty($user->my_photo))
            <div class="profile">
                <img class="img" src="{{ asset('img/usericon.png') }}">
            </div>
        @else
            <div class="profile">
                <img class="img" src="{{ Storage::url($user->my_photo) }}">
            </div>
        @endif
        <!-- 詳細画面 -->
        <table class="table2">
            <tr>
                <td class="td">ログインID</td>
                <td>
                    <p class="txt3">{{ $user->login_id }}</p>
                </td>
            </tr>
            <tr>
                <td class="td">名前</td>
                <td>
                    <p class="txt3">{{ $user->name }}</p>
                </td>
            </tr>
            <tr>
                <td class="td">部署</td>
                <td>
                    <p class="txt3">{{ $user->dept }}</p>
                </td>
            </tr>
            <tr>
                <td class="td">性別</td>
                <td>
                    <p class="txt3">{{ $user->gender }}</p>
                </td>
            </tr>
            <tr>
                <td class="td">誕生日</td>
                <td>
                    <p class="txt3">{{ $user->birthday }}<svg xmlns="http://www.w3.org/2000/svg"
                            class="icon icon-tabler icon-tabler-cake" width="24" height="24" viewBox="0 0 24 24"
                            stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round"
                            stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                            <path d="M3 20h18v-8a3 3 0 0 0 -3 -3h-12a3 3 0 0 0 -3 3v8z"></path>
                            <path
                                d="M2.996 14.803c.312 .135 .654 .204 1.004 .197a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1a2.4 2.4 0 0 0 2 -1a2.4 2.4 0 0 1 2 -1a2.4 2.4 0 0 1 2 1a2.4 2.4 0 0 0 2 1c.35 .007 .692 -.062 1.004 -.197">
                            </path>
                            <path d="M12 4l1.465 1.638a2 2 0 1 1 -3.015 .099l1.55 -1.737z"></path>
                        </svg></p>
                </td>
            </tr>
        </table>

        <!-- ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark" margin><a href="{{ route('user.edit') }}"
                    class="text-dark">編集</button>
            <span class="margin"></span>
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
