<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1>Taxy Home</h1>
<a href="admin-logout">Logout</a>
{{$admin->name}}
{{$admin->email}}

<form action="location" method="POST">
        @csrf
        <input type="text" name="name" placeholder="name">
        <input type="text" name="address" placeholder="address">
        <input type="text" name="latitude" placeholder="latitude">
        <input type="text" name="longitude" placeholder="longitude">
        <button>Register</button>
    </form>
</body>
</html>