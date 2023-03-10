@extends('layouts.master')
@section('tittle')
Siswa
@endsection
@section('content')
<div>
    <div class="d-f mb-3 " >
        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#ModalTambahSiswa">
            Tambah
        </button>
        <a href="/admin/siswa/cetakpdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>NISN</th>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Alamat</th>
            <th>No Telepon</th>
            <th>SPP</th>
            <th>Aksi</th>
        </tr>
        @foreach ( $siswa as $get )
        <tr>
            <td>{{$get->nisn}}</td>
            <td>{{$get->nis}}</td>
            <td>{{$get->nama}}</td>
            <td>{{$get->kelas->nama_kelas}}</td>
            <td>{{$get->alamat}}</td>
            <td>{{$get->no_telp}}</td>
            <td>{{$get->spp->tahun}}</td>
            <td>
                <a href="#" onclick="ModalEditSiswa('{{ $get->nisn }}' ,'{{ $get->nis }}' , '{{ $get->nama }}' ,'{{ $get->kelas_id }}','{{ $get->alamat }}' ,'{{ $get->no_telp }}' ,'{{ $get->spp_id }}' )" class="btn btn-primary" >Edit</a>
                <a href="#" onclick="ModalHapusSiswa('{{ $get->nisn }}')" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
      </table>
</div>

<!-- Form Modal Tambah  -->
<form action="{{ route('siswa.store') }}" method="post">
    @csrf
<div class="modal fade" id="ModalTambahSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah Siswa</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">NISN</label>
                <textarea name="nisn" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nis</label>
                <textarea name="nis" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama</label>
                <textarea name="nama" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Kelas</label>
                <select name="id_kelas" id="id_kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ( $kelas as $getk )
                    <option value="{{$getk->id}}"
						@if($getk->id == $getk->id)
						@endif>{{$getk->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label  class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nomor Telepon</label>
                <textarea name="no_telp" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">SPP</label>
                <select name="id_spp" id="id_spp" class="form-control">
                    <option value="">Pilih SPP</option>
                    @foreach ( $spp as $gets )
                    <option value="{{$gets->id}}"
						@if($gets->id == $gets->id)
						@endif>{{$gets->tahun}}</option>
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
<form action="{{ route('siswa.update', ['siswa' => 1]) }}" method="post">
    @csrf
    @method('PUT')
<div class="modal fade" id="ModalEditSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Edit SPP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">NISN</label>
                <textarea name="nisn" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nis</label>
                <textarea name="nis" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nama</label>
                <textarea name="nama" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Kelas</label>
                <select name="id_kelas" id="id_kelas" class="form-control">
                    <option value="">Pilih Kelas</option>
                    @foreach ( $kelas as $getk )
                    <option value="{{$getk->id}}"
						@if($getk->id == $getk->id)
							selected
						@endif>{{$getk->nama_kelas}}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label  class="form-label">Alamat</label>
                <textarea name="alamat" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nomor Telepon</label>
                <textarea name="no_telp" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">SPP</label>
                <select name="id_spp" id="id_spp" class="form-control">
                    <option value="">Pilih SPP</option>
                    @foreach ( $spp as $gets )
                    <option value="{{$gets->id}}"
						@if($gets->id == $gets->id)
							selected
						@endif>{{$gets->tahun}}</option>
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
<form action="{{ route('siswa.destroy', ['siswa' => 1]) }}" method="post">
    @csrf
    @method('DELETE')
<div class="modal fade" id="ModalHapusSiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
            <input type="hidden" name="nisn" class="form-control" required>
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
    function ModalEditSiswa (nisn,nis,nama,kelas,alamat,telepon,spp,login) {
        $('[name="nisn"]').val(nisn);
        $('[name="nis"]').val(nis);
        $('[name="nama"]').val(nama);
        $('[name="id_kelas"]').val(kelas);
        $('[name="alamat"]').val(alamat);
        $('[name="no_telp"]').val(telepon);
        $('[name="id_spp"]').val(spp);
        $('[name="id_login"]').val(login);
        $('#ModalEditSiswa').modal('show');
        }
// Modal Edit
// Modal Hapus
function ModalHapusSiswa ($id) {
        $('[name="nisn"]').val($id);
        $('#ModalHapusSiswa').modal('show');
       }
// Modal Hapus
</script>
@endsection
