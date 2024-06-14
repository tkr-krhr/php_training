<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel学習記録</title>
</head>
<body>
    <h1>ログイン</h1>
    
    <form action="{{route('login')}}" method="post">
        @csrf
        <label for="">メールアドレス</label>
        <input type="text" name="email" value="{{ old('email') }}" required>
        <br>
        <label for="">パスワード</label>
        <input type="text" name="password">
        <br>
        <input type="submit" value="ログイン">
    </form>

    <form id="logout-form" action="{{ route('register') }}" method="GET" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-register">アカウント登録画面へ</button>
    </form>

    <br>
    <form id="search-form" action="{{ route('search.form') }}" method="GET" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-search">id検索</button>
    </form>

    @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    
</body>
</html>