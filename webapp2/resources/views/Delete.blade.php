<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>アカウント削除確認</title>
</head>
<body>
    <h1>アカウント削除確認</h1>
    <p>本当にアカウントを削除してもよろしいですか？</p>
    <form action="{{ route('destroy' }}" method="POST">
        @csrf
        @method('DELETE')
        <label for="password">パスワードを入力してください：</label>
        <input type="password" id="password" name="password" required>
        <button type="submit">削除する</button>
    </form>
    <a href="/home">キャンセル</a>
</body>
</html>
