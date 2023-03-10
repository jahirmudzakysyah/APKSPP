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
    <div class="row">
        <div class="container">
            <div class="judul">
                <h1>Login Siswa</h1>
            </div>
            <div class="form">
                <form action="{{url('login/siswa')}}" method="post">
                    @csrf
                    <div class="bungkus">
                        <label for="nisn"><b>Nisn</b></label>
                        <input type="text" placeholder="Enter NISN" name="nisn" required>
                        <button type="submit">Login</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
