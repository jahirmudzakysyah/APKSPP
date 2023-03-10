<table class="table table-bordered">
    <tr>
        <th>NISN</th>
        <th>NIS</th>
        <th>Nama</th>
        <th>Kelas</th>
        <th>Alamat</th>
        <th>No Telepon</th>
        <th>SPP</th>
        <th>ID Login</th>
        <th>Image</th>
        <th>Aksi</th>
    </tr>
    @foreach ( $siswa as $get )
    <tr>
        <td>{{$get->nisn}}</td>
        <td>{{$get->nis}}</td>
        <td>{{$get->nama}}</td>
        <td>{{$get->kelas_id}}</td>
        <td>{{$get->alamat}}</td>
        <td>{{$get->no_telp}}</td>
        <td>{{$get->spp_id}}</td>
        <td>
            <a href="#" onclick="ModalEditSiswa('{{ $get->nisn }}' ,'{{ $get->nis }}' , '{{ $get->nama }}' ,'{{ $get->kelas_id }}','{{ $get->alamat }}' ,'{{ $get->no_telp }}' ,'{{ $get->spp_id }}')" class="btn btn-primary" >Edit</a>
            <a href="#" onclick="ModalHapusSiswa('{{ $get->nisn }}')" class="btn btn-danger">Hapus</a>
        </td>
    </tr>
    @endforeach
  </table>
