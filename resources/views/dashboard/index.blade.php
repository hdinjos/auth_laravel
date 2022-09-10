<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Dashboard</title>
</head>
<body>
    <h2>Wellcome user {{Auth::user()->name}}</h2>

    <br/>
    <br/>
    <br/>
    <br/>
    <br/>
    <a href="/logout">Logout</a>
    
</body>
</html>