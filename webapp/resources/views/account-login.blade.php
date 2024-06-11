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
        <label for="">アカウントID</label>
        <input type="text" name="account_id">
        <br>
        <label for="">パスワード</label>
        <input type="text" name="password">
        <br>
        <input type="submit" value="ログイン">
    </form>
    
</body>
</html>