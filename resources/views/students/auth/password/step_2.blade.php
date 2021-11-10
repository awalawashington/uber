<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<h1> Pass Verify Code</h1>
@if (session('email'))
    <div class="alert alert-success">
        {{ session('email')->reset_password_verification_code }}
    </div>
@endif
    <form action="student-reset-password/step_2" method="POST">
        @csrf
        <input type="hidden" name="email" value="{{ session('email')->email }}">
        <input type="text" name="reset_password_verification_code" placeholder="enter code">
        <button>Verify</button>
    </form>
</body>
</html>