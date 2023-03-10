<table class="table table-bordered">
    <tr>
        <th>Kelas</th>
        <th>Kompetensi Keahlian</th>
    </tr>
    @foreach ( $kelas as $get )
    <tr>
        <td>{{$get->nama_kelas}}</td>
        <td>{{$get->kompetensi_keahlian}}</td>
    </tr>
    @endforeach
  </table>
