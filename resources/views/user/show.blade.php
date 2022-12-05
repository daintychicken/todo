<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
    <title>{{ $users->name }}のページ</title>
</head>

{{-- セッションが持つメッセージの表示 --}}
@if (session('like'))
    <div class="alert alert-light" role="alert">
        <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M19.5 12.572l-7.5 7.428l-7.5 -7.428m0 0a5 5 0 1 1 7.5 -6.566a5 5 0 1 1 7.5 6.572"></path>
            </svg>&nbsp;{{ $users->name }}{{ session('like') }}</span>
    </div>
@elseif (session('unlike'))
    <div class="alert alert-light" role="alert">
        <span><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-heart-off" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M3 3l18 18"></path>
                <path
                    d="M19.5 12.572l-1.5 1.428m-2 2l-4 4l-7.5 -7.428m0 0a5 5 0 0 1 -1.288 -5.068a4.976 4.976 0 0 1 1.788 -2.504m3 -1c1.56 .003 3.05 .727 4 2.006a5 5 0 1 1 7.5 6.572">
                </path>
            </svg>&nbsp;{{ $users->name }}{{ session('unlike') }}</span>
    </div>
@endif

<body>
    <section class="contents">
        <h2>{{ $users->name }} のページ</h2>
        {{-- プロフィール画像 --}}
        @if (empty($users->my_photo))
            <div class="profile">
                <img class="img" src="{{ asset('img/usericon.png') }}">
            </div>
        @else
            <div class="profile">
                <img class="img" src="{{ Storage::url($users->my_photo) }}">
            </div>
        @endif

        {{-- いいね！ --}}

        @if ($like)
            <!-- 「いいね」取消用ボタンを表示 -->
            <span class="iine">Unlike</span>
            <section class="like">
                <button class="likebtn">

                    <a href="{{ route('reply.unlike', ['id' => $users->id]) }}" class="btn">
                        <div> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-down"
                                width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="#74c6ec"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M7 13v-8a1 1 0 0 0 -1 -1h-2a1 1 0 0 0 -1 1v7a1 1 0 0 0 1 1h3a4 4 0 0 1 4 4v1a2 2 0 0 0 4 0v-5h3a2 2 0 0 0 2 -2l-1 -5a2 3 0 0 0 -2 -2h-7a3 3 0 0 0 -3 3">
                                </path>
                            </svg></div>
                    </a>
                </button>
            </section>
        @else
            <!-- 「いいね」ボタンを表示 -->
            <span class="iine">Like!</span>
            <section class="like">
                <button class="likebtn"><a href="{{ route('reply.like', ['id' => $users->id]) }}" class="btn">
                        <div><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-thumb-up"
                                width="30" height="30" viewBox="0 0 24 24" stroke-width="2" stroke="#74c6ec"
                                fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                                <path
                                    d="M7 11v8a1 1 0 0 1 -1 1h-2a1 1 0 0 1 -1 -1v-7a1 1 0 0 1 1 -1h3a4 4 0 0 0 4 -4v-1a2 2 0 0 1 4 0v5h3a2 2 0 0 1 2 2l-1 5a2 3 0 0 1 -2 2h-7a3 3 0 0 1 -3 -3">
                                </path>
                            </svg></div>
                    </a>
                </button>
            </section>
        @endif

        <div class="clear"></div>
        <!-- 詳細画面 -->
        <table class="table2">
            <tr>
                <td class="td">名前</td>
                <td>
                    <p class="txt3">{{ $users->name }}</p>
                </td>
            </tr>
            <tr>
                <td class="td">部署</td>
                <td>
                    <p class="txt3">{{ $users->dept }}</p>
                </td>
            </tr>
            <tr>
                <td class="td">性別</td>
                <td>
                    <p class="txt3">{{ $users->gender }}</p>
                </td>
            </tr>
            <tr>
                <td class="td">誕生日</td>
                <td>
                    <p class="txt3">{{ $users->birthday }}</p>
                </td>
            </tr>
        </table>

        <!-- ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark" margin><a href="{{ route('user.search') }}"
                    class="text-dark">検索に戻る</button>
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
