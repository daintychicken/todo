<!doctype html>
<html lang="ja">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>! Todoリスト !</title>

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
</head>

<body>
    <h1>おかえりなさい<span class="name">&nbsp;★&nbsp;<?php $user = Auth::user(); ?>{{ $user->name }}</span><img
            src="{{ asset('img/boxnyan.png') }}" width="100"></h1>
    <section class="contents">
        <button type="button" class="logout"><a href="{{ route('todo.logout') }}" class="text-dark">ログアウト</a></button>
        <h2>Todoリスト</h2>
        <!-- 検索見出し -->
        <h3>検索 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-search" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <circle cx="10" cy="10" r="7"></circle>
                <line x1="21" y1="21" x2="15" y2="15"></line>
            </svg></h3>

        <!-- 検索フォーム -->
        <table class="table1">
            <thead>
                <tr>
                    <th>タスク名(部分一致)</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="{{ route('todo.index') }}" method="GET">
                        <td><input type="text" class="txt1" name="keyword" value="{{ $keyword }}"></td>
                        <td><button type="submit" class="btn btn-outline-dark btn-sm">検索</button></td>
                    </form>
                    <td><button type="button" class="btn btn-outline-dark btn-sm"><a href="{{ route('todo.index') }}"
                                class="text-dark">クリア</a></button></td>
                </tr>
            </tbody>
        </table>

        <!-- Todoリスト見出し -->
        <h3>タスク一覧 <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-file" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M14 3v4a1 1 0 0 0 1 1h4"></path>
                <path d="M17 21h-10a2 2 0 0 1 -2 -2v-14a2 2 0 0 1 2 -2h7l5 5v11a2 2 0 0 1 -2 2z"></path>
            </svg></h3>

        <!-- 新規登録ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark"><a href="{{ route('todo.create') }}"
                    class="text-dark">新規登録</a>
                <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-writing" width="24"
                    height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                    stroke-linecap="round" stroke-linejoin="round">
                    <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                    <path d="M20 17v-12c0 -1.121 -.879 -2 -2 -2s-2 .879 -2 2v12l2 2l2 -2z"></path>
                    <path d="M16 7h4"></path>
                    <path d="M18 19h-13a2 2 0 1 1 0 -4h4a2 2 0 1 0 0 -4h-3"></path>
                </svg></a></button>
        </div>

        <!-- Todoリスト表示 -->
        <div class="todolists">
            <table class="table table-hover">
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
                    @foreach ($todolists as $key => $todo)
                        <tr>
                            <td class="text-dark">{{ $key + 1 }}</td>
                            <td class="text-dark">{{ $todo->name }}</td>
                            <td class="text-dark">{{ $todo->limit_date }}</td>
                            <td>
                                @php
                                    $today = date('Y-m-d');
                                    $flag1 = $today > $todo->limit_date;
                                @endphp
                                @if ($todo->completion_date)
                                    <p>完了</p>
                                @elseif ($todo->limit_date && $todo->limit_date < $today)
                                    <p>期限切れ</p>
                                @else
                                    <p>進行中</p>
                                @endif
                            </td>

                            <td><button type="button" class="btn btn-outline-dark rounded-circle p-0"
                                    style="width:2rem;height:2rem;"><a
                                        href="{{ route('todo.show', ['id' => $todo->id]) }}"
                                        class="text-dark">＋</a></button></td>
                            <td><button type="button" class="btn btn-outline-dark rounded-circle p-0"
                                    style="width:2rem;height:2rem;"><a
                                        href="{{ route('todo.edit', ['id' => $todo->id]) }}"
                                        class="text-dark">＋</a></button></td>
                            <td>
                                <form action="{{ route('todo.delete', ['id' => $todo->id]) }}" method="POST">
                                    @csrf
                                    <button type="submit" class="btn btn-outline-danger rounded-circle p-0"
                                        style="width:2rem;height:2rem;">！</button>
                                </form>
                            </td>
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
