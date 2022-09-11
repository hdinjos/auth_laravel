<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Login</title>
</head>
<body>
    <h2>Login Here</h2>
    @if(count($errors) > 0)
    {{$errors}}
    @endif
    <form method="POST" action="{{route('login_process')}}">
        @csrf
        <label>username</label>
        <input name="username" type="text"/>
        <label>password</label>
        <input name="password" type="text"/>
        <div>
            <label>Remember me</label>
            <input name="remember" type="checkbox" />
        </div>
        <button>Login</button>
    </form>
</body>
</html>