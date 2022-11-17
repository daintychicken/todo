<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <title>ログイン</title>
</head>

<body>
    <img src="{{ asset('img/nyan2.png') }}" width="350">
    <div class="login-page">
        <div class="form">
            @csrf
            <p>ユーザー名</p>
            <input type="text" />
            <p>パスワード</p>
            <input type="password" />
            <button><a href="{{ route('todo.index') }}">ログイン</a></button>
            </form>
        </div>
    </div>



</body>

</html>
