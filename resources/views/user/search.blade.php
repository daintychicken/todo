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
    <link rel="stylesheet" href="{{ asset('/css/user.css') }}">
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
    <section class="contents">
        <h2>ユーザー検索</h2>

        <!-- 検索フォーム -->
        <table class="table1">
            <thead>
                <tr>
                    <th style="padding-right: 15px">名前(部分一致)</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <form action="{{ route('user.search') }}" method="GET">
                        <td style="padding-right: 15px"><input type="text" class="txt1" name="keyword"
                                value="{{ $keyword }}"></td>
                        <td style="padding-right: 15px"><button type="submit"
                                class="btn btn-outline-dark btn-sm">検索</button></td>
                        </td>
                    </form>
                    <td><button type="button" class="btn btn-outline-success btn-sm"><a
                                href="{{ route('user.search') }}" class="text-success">クリア</a></button></td>
                </tr>
            </tbody>
        </table>

        <!-- Todoリスト表示 -->
        <div class="user">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col" class="text-dark">No</th>
                        <th scope="col" class="text-dark">ユーザー名</th>
                        <th scope="col" class="text-dark">詳細</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $index = 1; ?>
                    @foreach ($users as $user)
                        <tr>
                            <td class="text-dark">{{ $users->firstItem() + $loop->index }}</td>
                            <td class="text-dark">{{ $user->name }}</td>
                            <?php $index++; ?>
                            <td><button type="button" class="btn btn-outline-dark rounded-circle p-0"
                                    style="width:2rem;height:2rem;"><a
                                        href="{{ route('user.show', ['id' => $user->id]) }}"
                                        class="text-dark">＋</a></button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
                {{ $users->appends(Request::only('keyword'))->links('vendor.pagination.default') }}
            </table>
        </div>

        <!-- ボタン -->
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <button type="button" class="btn btn-outline-dark" margin><a href="{{ route('todo.index') }}"
                    class="text-dark">タスク一覧に戻る</a></button>
        </div>
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
