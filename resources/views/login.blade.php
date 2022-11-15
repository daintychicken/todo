<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
    <title></title>
</head>

<body>
    <img src="{{ asset('img/nyan2.png') }}" width="300">
    <div class="login-page">
        <div class="form">
            @csrf
            <p>ユーザー名</p>
            <input type="text" />
            <p>パスワード</p>
            <input type="password" />
            <button>ログイン</button>
            </form>
        </div>
    </div>


</body>

</html>
