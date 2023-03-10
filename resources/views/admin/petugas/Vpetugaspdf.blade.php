<table class="table table-bordered">
    <tr>
        <th>Nama Petugas</th>
        <th>Username</th>
        <th>level</th>
    </tr>
    @foreach ( $petugas as $get )
    <tr>
        <td>{{$get->nama_petugas}}</td>
        <td>{{$get->username}}</td>
        <td>{{$get->level}}</td>
    </tr>
    @endforeach
  </table>
