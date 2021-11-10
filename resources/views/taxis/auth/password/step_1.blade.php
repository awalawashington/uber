<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Pass Enter Email</h1>
    <form action="student-reset-password/step_1" method="POST">
        @csrf
        <input type="text" name="email">
        <button>Login</button>
    </form>
</body>
</html>