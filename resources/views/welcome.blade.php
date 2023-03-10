<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>BayarSPP</title>
    <link rel="stylesheet" href="/css/welcome.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
    <header class="">
        <div class="">
          <nav class="navbar navbar-expand-lg navbar-light">
            <div class="container border-bottom border-secondary">
                <div class="left mb-4 mt-3">
                    <h2>SPP</h2>
                </div>
                <div class="right mb-4 mt-3">
                    <ul class="nav navbar-nav menu_nav ml-auto">
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-dark me-4" href="{{url('/login-siswa', [])}}">Siswa</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn btn-outline-dark" href="{{url('/login', [])}}">Petugas</a>
                        </li>
                    </ul>
                </div>
            </div>
          </nav>
        </div>
      </header>
      <section>
        <div class="content">
            <img src="/image/home.jpg" alt="home">
            <h1>Your School</h1>
        </div>
      </section>
</body>
</html>
