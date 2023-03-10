<table class="table table-bordered">
    <tr>
        <th>Tahun</th>
        <th>Nominal</th>
    </tr>
    @foreach ( $spp as $get )
    <tr>
        <td>{{$get->tahun}}</td>
        <td>{{$get->nominal}}</td>
    </tr>
    @endforeach
  </table>
