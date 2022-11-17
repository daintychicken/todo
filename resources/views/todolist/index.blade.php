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
    <title>! Todoリスト !</title>
</head>

<body>
    <section class="contents">
        <button type="button" class="logout"><a href="{{ url('/login') }}" class="text-dark">ログアウト</a></button>
        <h2>Todoリスト</h2>
        <!-- 検索フォーム -->
        <table class="table1">
            <thead>
                <tr>
                    <th>No</th>
                    <th>タスク名</th>
                    <th>ステータス</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td><input type="text" class="txt1" name="search"></td>
                    <td><input type="text" class="txt1" name="search"></td>
                    <td><input type="text" class="txt1" name="search"></td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm">検索</button></td>
                    <td><button type="button" class="btn btn-outline-dark btn-sm">クリア</button></td>
                </tr>
            </tbody>
        </table>

        <!-- 新規登録ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark"><a href="/create" class="text-dark">新規登録</a>
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
                                    $today = date('Y/m/d');
                                    $flag1 = strtotime($todo->completion_date) > strtotime($todo->limit_date);
                                    $flag2 = strtotime($today) > strtotime($todo->limit_date);
                                @endphp
                                @if ($todo->limit_date == null)
                                    <p>進行中</p>
                                @elseif ($flag1 || $flag2)
                                    <p>期限切れ</p>
                                @elseif (isset($todo->completion_date))
                                    <p>完了</p>
                                @else
                                    <p>進行中</p>
                                @endif
                            </td>

                            <td><button type="button" class="btn btn-outline-dark rounded-circle p-0"
                                    style="width:2rem;height:2rem;"><a href="/show/{{ $todo->id }}"
                                        class="text-dark">＋</a></button></td>
                            <td><button type="button" class="btn btn-outline-dark rounded-circle p-0"
                                    style="width:2rem;height:2rem;"><a
                                        href="{{ route('todo.edit', ['id' => $todo->id]) }}"
                                        class="text-dark">＋</a></button></td>
                            <td>
                                <form action="/delete/{{ $todo->id }}" method="POST">
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
