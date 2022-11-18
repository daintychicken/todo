<!doctype html>
<html lang="ja">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="{{ asset('/css/login.css') }}">
    <title>ログイン</title>
</head>


{{-- @section('content') --}}
{{-- エラーメッセージ --}}
@if ($errors->any())
    <div>
        <p>ユーザー名かパスワードが間違っています</p>
    </div>
@endif

{{-- ログインフォーム --}}

<body>
    {{-- 画像 --}}
    <img src="{{ asset('img/nyan2.png') }}" width="300">
    <div class="login-page">
        <form action="{{ route('todo.signin') }}" method="post">
            <div class="form">
                @csrf
                <p>ユーザー名</p>
                <input type="text" id="login_id" name="login_id" />
                <p>パスワード</p>
                <input type="password" id="password" name="password" />
                <button type="submit">ログイン</button>
            </div>
        </form>
    </div>
</body>

</html>
{{-- @endsection --}}
