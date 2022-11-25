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

{{-- エラーが起きて、登録ができなかった場合 --}}
@if (session('message'))
    <div>
        <div class="alert alert-danger" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-alert-octagon" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path
                    d="M8.7 3h6.6c.3 0 .5 .1 .7 .3l4.7 4.7c.2 .2 .3 .4 .3 .7v6.6c0 .3 -.1 .5 -.3 .7l-4.7 4.7c-.2 .2 -.4 .3 -.7 .3h-6.6c-.3 0 -.5 -.1 -.7 -.3l-4.7 -4.7c-.2 -.2 -.3 -.4 -.3 -.7v-6.6c0 -.3 .1 -.5 .3 -.7l4.7 -4.7c.2 -.2 .4 -.3 .7 -.3z">
                </path>
                <line x1="12" y1="8" x2="12" y2="12"></line>
                <line x1="12" y1="16" x2="12.01" y2="16"></line>
            </svg>&nbsp;{{ session('message') }}
        </div>
    </div>
@endif

<body>
    <section class="contents">
        <h2>タスク編集</h2>
        <!-- 編集フォーム -->
        <table class="table2">
            <form method="post" action="{{ route('todo.update') }}">
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
                    <td><input type="text" class="txt2" name="limit_date" value="{{ $todolists->limit_date }}"
                            placeholder="YYYY-MM-DD">
                    </td>
                </tr>
                <tr>
                    <td>完了日</td>
                    <td><input type="text" class="txt2" name="completion_date"
                            value="{{ $todolists->completopm_date }}" placeholder="YYYY-MM-DD"></td>
                </tr>
        </table>
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="submit" class="btn btn-outline-dark" margin>更新</button>
            <span class="margin"></span>
            </form>

            <button type="button" class="btn btn-outline-dark" margin><a href="{{ route('todo.index') }}"
                    class="text-dark">タスク一覧に戻る</a></button>
        </div>

        <div style="text-align: center">
            <img src="{{ asset('img/chair.png') }}" width="200">
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
