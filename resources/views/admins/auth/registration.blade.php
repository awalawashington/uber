<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Verify Email</h1>

    <form action="admin-registration" method="POST">
        @csrf
        <input type="text" name="email" placeholder="email">
        <input type="text" name="name" placeholder="name">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="password_confirmation" placeholder="password confirmation">
        <button>Register</button>
    </form>
</body>
</html>