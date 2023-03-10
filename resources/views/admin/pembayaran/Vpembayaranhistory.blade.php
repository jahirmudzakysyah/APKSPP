@extends('layouts.master')
@section('tittle')
Pembayaran
@endsection
@section('content')
<div>
    <table class="table table-bordered">
        <tr>
            <th>No</th>
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
@endsection
