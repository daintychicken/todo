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

{{-- セッションが持つメッセージの表示 --}}
@if (session('message'))
    <div class="alert alert-light" role="alert">
        <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-bell-ringing" width="24"
            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
            stroke-linecap="round" stroke-linejoin="round">
            <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
            <path d="M10 5a2 2 0 0 1 4 0a7 7 0 0 1 4 6v3a4 4 0 0 0 2 3h-16a4 4 0 0 0 2 -3v-3a7 7 0 0 1 4 -6"></path>
            <path d="M9 17v1a3 3 0 0 0 6 0v-1"></path>
            <path d="M21 6.727a11.05 11.05 0 0 0 -2.794 -3.727"></path>
            <path d="M3 6.727a11.05 11.05 0 0 1 2.792 -3.727"></path>
        </svg>&nbsp;{{ session('message') }}
    </div>
@endif

<body>
    <div>
        <p class="welcome">おかえりなさい</p>
        <p class="name">{{ $user->name }}<img src="{{ asset('img/boxnyan.png') }}" width="100"></p>
    </div>
    <div class="clear"></div>
    <section class="contents">
        <ul id="nav">
            <li>
                <button type="button" class="menu"><a href="{{ route('user.index') }}"
                        class="text-dark">マイページ</a></button>
            </li>
            <li>
                <button type="button" class="menu"><a href="{{ route('todo.logout') }}"
                        class="text-dark">ログアウト</a></button>
            </li>
        </ul>
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
                    <th style="padding-right: 15px">タスク名(部分一致)</th>
                    <th style="padding-right: 15px">ステータス</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="{{ route('todo.index') }}" method="GET">
                        <td style="padding-right: 15px"><input type="text" class="txt1" name="keyword"
                                value="{{ $keyword }}"></td>
                        <td style="padding-right: 15px; padding-top: 5px;">
                            <select name="status">
                                <option></option>
                                <option value="work" @if (request()->status == 'work') selected @endif>進行中</option>
                                <option value="done" @if (request()->status == 'done') selected @endif>完了</option>
                                <option value="past" @if (request()->status == 'past') selected @endif>期限切れ</option>
                            </select>
                        </td>
                        <td style="padding-right: 15px"><button type="submit"
                                class="btn btn-outline-dark btn-sm">検索</button></td>
                        </td>
                    </form>
                    <td><button type="button" class="btn btn-outline-success btn-sm"><a
                                href="{{ route('todo.index') }}" class="text-success">クリア</a></button></td>
                </tr>
            </tbody>
        </table>

        <!-- Todoリスト見出し -->
        <h3>タスク一覧
            <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-clipboard-list" width="24"
                height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none"
                stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                <path d="M9 5h-2a2 2 0 0 0 -2 2v12a2 2 0 0 0 2 2h10a2 2 0 0 0 2 -2v-12a2 2 0 0 0 -2 -2h-2"></path>
                <rect x="9" y="3" width="6" height="4" rx="2"></rect>
                <line x1="9" y1="12" x2="9.01" y2="12"></line>
                <line x1="13" y1="12" x2="15" y2="12"></line>
                <line x1="9" y1="16" x2="9.01" y2="16"></line>
                <line x1="13" y1="16" x2="15" y2="16"></line>
            </svg>
        </h3>

        <!-- 新規登録ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark"><a href="{{ route('todo.create') }}"
                    class="text-dark">新規登録&nbsp;
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-pencil-minus"
                        width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                        fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none"></path>
                        <path d="M8 20l10.5 -10.5a2.828 2.828 0 1 0 -4 -4l-10.5 10.5v4h4z"></path>
                        <path d="M13.5 6.5l4 4"></path>
                        <path d="M16 18h4"></path>
                    </svg>
                </a></button>
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
                    <?php $index = 1; ?>
                    @foreach ($todolists as $todo)
                        <tr>
                            <td class="text-dark">{{ $todolists->firstItem() + $loop->index }}</td>
                            <td class="text-dark">{{ $todo->name }}</td>
                            <td class="text-dark">{{ $todo->limit_date }}</td>
                            <td>
                                @php
                                    $today = date('Y-m-d');
                                @endphp
                                @if ($todo->completion_date)
                                    <p>完了</p>
                                @elseif ($todo->limit_date && $todo->limit_date < $today)
                                    <p>期限切れ</p>
                                @else
                                    <p>進行中</p>
                                @endif
                            </td>
                            <?php $index++; ?>
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
        {{ $todolists->appends(Request::only('keyword', 'status'))->links('vendor.pagination.default') }}
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
