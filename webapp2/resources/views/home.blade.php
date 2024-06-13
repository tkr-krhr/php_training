<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laravel学習記録</title>
</head>
<body>
    <h1>ログイン成功の画面</h1>
    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: inline;">
    @csrf
    <button type="submit" class="btn btn-primary">ログアウト</button>
</form>
</body>
</html>