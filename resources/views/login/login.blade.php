<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Cakra | Login</title>
</head>
<body>
<form action="/authenticate" method="post">
    @csrf
<input type="text" name="nisn" id="nisn" placeholder="NISN">
<input type="password" name="password" id="password" placeholder="Password">
<button> BUTTON </button>
</form>
</body>
</html>
