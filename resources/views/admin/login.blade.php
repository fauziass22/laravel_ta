<!DOCTYPE html>
<html>
<head>
    <title>Login</title>
</head>
<body>
    <h1>Login</h1>

    @isset($errorMsg)
        <p>{{ $errorMsg }}</p>
    @endisset

    <form method="POST" action="{{ route('login') }}">
        @csrf
        <label for="username">Username</label>
        <input type="text" id="username" name="username" required><br>

        <label for="password">Password</label>
        <input type="password" id="password" name="password" required><br>

        <button type="submit">Login</button>
    </form>
</body>
</html>
