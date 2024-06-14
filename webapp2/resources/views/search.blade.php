<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Email Search</title>
</head>
<body>
    <form action="{{ route('login') }}" method="GET">
        <button type="submit"><</button>
    </form>
    <h1>ユーザーIDを検索する</h1>

    <form action="{{ route('search.byEmail') }}" method="POST">
        @csrf
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required>
        <button type="submit">検索</button>
    </form>

    @if ($errors->any())
        <div>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (is_null($account_id))
    <div>
        <ul>
            <li>ユーザーが見つかりませんでした。</li>
        </ul>
    </div>
    
    @endif

    @if (isset($account_id))
        @if ($account_id)
            <p>Email: {{ $email }}</p>
            <p>ID: {{ $account_id->id }}</p>
        @endif
    @endif
</body>
</html>
