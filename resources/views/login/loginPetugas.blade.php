<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login</title>
    <link rel="stylesheet" href="/css/login.css">
</head>
<body>
    <section class="container">
        <div class="judul">
            <h1>Login Petugas</h1>
        </div>
        <div class="form">
            <form action="{{url('login/petugas')}}" method="post">
                @csrf
                <div class="bungkus">
                    <label for="username"><b>Username</b></label>
                    <input type="text" placeholder="Enter Username" name="username" id="username" required>
                    <label for="password"><b>Password</b></label>
                    <input type="password" placeholder="Enter Password" name="password" id="password" required>
                    <button type="submit">Login</button>
                </div>
            </form>
        </div>
    </section>
</body>
</html>
