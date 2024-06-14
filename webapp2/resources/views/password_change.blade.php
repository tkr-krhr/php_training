<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>パスワード変更</title>
</head>
<body>
    <h1>パスワード変更</h1>

    @if (session('error'))
        <div>{{ session('error') }}</div>
    @endif

    @if (session('success'))
        <div>{{ session('success') }}</div>
    @endif

    <form action="{{ route('home') }}" method="GET">
        <button type="submit"><</button>
    </form>

    <form action="{{ route('password.change.submit') }}" method="POST">
        @csrf
        <label for="current_password">現在のパスワード:</label>
        <input type="password" id="current_password" name="current_password" required>
        <br>
        <label for="password">新しいパスワード:</label>
        <input type="password" id="new_password" name="password" required>
        <br>
        <label for="password_confirmation">パスワード確認:</label>
        <input type="password" id="password_confirmation" name="password_confirmation" required>
        <br>
        <button type="submit">パスワード変更</button>
    </form>
</body>
</html>
