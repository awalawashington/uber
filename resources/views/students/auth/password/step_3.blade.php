<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1> Pass Verify Email</h1>
@if (session('email'))
    <div class="alert alert-success">
        {{ session('email')}}
    </div>
@endif

    <form action="student-reset-password/step_3" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ session('email')->email }}">
        <input type="text" name="password" placeholder="password">
        <input type="text" name="password_confirmation" placeholder="password confirmation">
        <button>Register</button>
    </form>
</body>
</html>