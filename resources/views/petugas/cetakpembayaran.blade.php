<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
<table class="table table-bordered">
    <tr>
        <th>ID</th>
        <th>Petugas</th>
        <th>NISN</th>
        <th>Tanggal</th>
        <th>Bulan</th>
        <th>Tahun</th>
        <th>SPP</th>
        <th>Jumlah Bayar</th>
    </tr>
    @foreach ( $pembayaran as $get )
    <tr>
        <td>{{$get->id}}</td>
        <td>{{$get->petugas_id}}</td>
        <td>{{$get->siswa_id}}</td>
        <td>{{$get->tgl_bayar}}</td>
        <td>{{$get->bulan_dibayar}}</td>
        <td>{{$get->tahun_dibayar}}</td>
        <td>{{$get->spp_id}}</td>
        <td>{{$get->jumlah_bayar}}</td>
    </tr>
    @endforeach
  </table>
</body>
</html>
