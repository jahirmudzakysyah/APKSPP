<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="content">
        <nav class="sidebar">
            <header>
                <div class="image-text">
                    <span class="image">
                        <i class='bx bxl-graphql'></i>
                    </span>
                    <div class="text header-text">
                        <span class="name">Kaihir</span>
                    </div>
                </div>
            </header>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="/petugas/home">
                                <i class='bx bxs-grid-alt icon'></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="/petugas/pembayaran">
                                <i class='bx bxs-wallet icon' ></i>
                                <span class="text nav-text">Pembayaran</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="/petugas/pembayaran/history">
                                <i class='bx bxs-hourglass icon' ></i>
                                <span class="text nav-text">History Pembayaran</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="">
                        <a href="{{url('logout')}}">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
        <div class="top">
            <p>Aplikasi Pembayaran SPP</p>
            <div class="search-box">
                <i class='bx bx-search' ></i>
                <input type="text" placeholder="Search here...">
            </div>
            <i class='bx bx-user-circle sidebar-toggle' ></i>
        </div>

{{-- ----------------------------------------------- --}}
        <div class="main-content">
            <div>
                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Id Pembayaran</th>
                        <th>Tanggal</th>
                        <th>Petugas</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>bulan dibayar</th>
                        <th>tahun dibayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Tahun</th>
                    </tr>


                    @foreach($pembayaran as $row)
                    <tr>
                        <td>{{isset($i)? ++$i : $i = 1 }}</td>
                        <td>{{$row->id}}</td>
                        <td>{{$row->tgl_bayar}}</td>
                        <td>{{$row->petugas->nama_petugas}}</td>
                        <td>{{$row->siswa->nama}}</td>
                        <td>{{$row->siswa->kelas->nama_kelas}}</td>
                        <td>{{$row->bulan_dibayar}}</td>
                        <td>{{$row->tahun_dibayar}}</td>
                        <td>{{$row->jumlah_bayar}}</td>
                        <td>{{$row->spp->tahun}}</td>
                    </tr>
                    @endforeach
                  </table>
            </div>
        </div>
    </div>



























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
