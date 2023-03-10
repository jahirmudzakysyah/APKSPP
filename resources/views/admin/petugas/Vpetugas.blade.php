@extends('layouts.master')
@section('tittle')
Petugas
@endsection
@section('content')
<div>
    <div class="d-f mb-3 " >
        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#ModalTambahPetugas">
            Tambah
        </button>
        <a href="/admin/petugas/cetakpdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Nama Petugas</th>
            <th>Username</th>
            <th>level</th>
            <th>Aksi</th>
        </tr>
        @foreach ( $petugas as $get )
        <tr>
            <td>{{$get->nama_petugas}}</td>
            <td>{{$get->username}}</td>
            <td>{{$get->level}}</td>
            <td>
                <a href="#" onclick="ModalEditPetugas('{{ $get->id }}' ,'{{ $get->nama_petugas }}' , '{{ $get->username }}' , '{{ $get->password }}' ,  '{{ $get->level }}' )" class="btn btn-primary" >Edit</a>
                <a href="#" onclick="ModalHapusPetugas('{{ $get->id }}')" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
      </table>
</div>

<!-- Form Modal Tambah  -->
<form action="{{ route('petugas.store') }}" method="post">
    @csrf
<div class="modal fade" id="ModalTambahPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah Petugas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Nama Petugas</label>
                <textarea name="nama_petugas" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Username</label>
                <textarea name="username" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>
            <div class="mb-3">
                <label  class="form-label">Level</label>
                <select name="level" id="level" class="form-control">
					<option value="">pilih level</option>
                    @php
                        $levels = ['admin', 'petugas'];
                    @endphp
                    @foreach ($levels as $level)
                        <option value="{{$level}}">{{ucfirst($level)}}</option>
                    @endforeach
				</select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>
<!-- Form Modal Tambah  -->
<!-- Form Modal Edit  -->
<form action="{{ route('petugas.update', ['petuga' => 1]) }}" method="post">
    @csrf
    @method('PUT')
<div class="modal fade" id="ModalEditPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Edit Petugas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <input type="hidden" name="id_petugas" class="form-control" required></textarea>
            <div class="mb-3">
                <label  class="form-label">Nama Petugas</label>
                <textarea name="nama_petugas" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Username</label>
                <textarea name="username" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Level</label>
                <select name="level" id="level" class="form-control">
					<option value="">pilih level</option>
                    @php
                        $levels = ['admin', 'petugas'];
                    @endphp
                    @foreach ($levels as $level)
                        <option value="{{$level}}">{{ucfirst($level)}}</option>
                    @endforeach
				</select>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
            <input type="submit" class="btn btn-primary" name="simpan" value="Simpan">
        </div>
        </div>
    </div>
</div>
</form>
<!-- Form Modal Edit  -->
<!-- Form Modal Hapus -->
<form action="{{ route('petugas.destroy', ['petuga' => 1]) }}" method="post">
    @csrf
    @method('DELETE')
<div class="modal fade" id="ModalHapusPetugas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
            <input type="hidden" name="id_petugas" class="form-control" required>
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
              <input type="submit" class="btn btn-primary" name="simpan" value="Hapus">
          </div>
      </div>
    </div>
  </div>
</form>
<!-- Form Modal Hapus -->

<script>
// Modal Edit
    function ModalEditPetugas (id,nama,user,pw,level) {
        $('[name="id_petugas"]').val(id);
        $('[name="nama_petugas"]').val(nama);
        $('[name="username"]').val(user);
        $('[name="password"]').val(pw);
        $('[name="level"]').val(level);
        $('#ModalEditPetugas').modal('show');
        }
// Modal Edit
// Modal Hapus
function ModalHapusPetugas ($id) {
        $('[name="id_petugas"]').val($id);
        $('#ModalHapusPetugas').modal('show');
       }
// Modal Hapus
</script>
@endsection
