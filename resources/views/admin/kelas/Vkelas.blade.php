@extends('layouts.master')
@section('tittle')
Kelas
@endsection
@section('content')
<div>
    <div class="d-f mb-3 " >
        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#ModalTambahKelas">
            Tambah
        </button>
        <a href="/admin/kelas/cetakpdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
    </div>

    <table class="table table-bordered">
        <tr>
            <th>Kelas</th>
            <th>Kompetensi Keahlian</th>
            <th>Aksi</th>
        </tr>
        @foreach ( $kelas as $get )
        <tr>
            <td>{{$get->nama_kelas}}</td>
            <td>{{$get->kompetensi_keahlian}}</td>
            <td>
                <a href="#" onclick="ModalEditKelas('{{ $get->id }}' ,'{{ $get->nama_kelas }}' , '{{ $get->kompetensi_keahlian }}')" class="btn btn-primary" >Edit</a>
                <a href="#" onclick="ModalHapusKelas('{{ $get->id }}')" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
      </table>
</div>
<!-- Form Modal Tambah  -->
<form action="{{ route('kelas.store') }}" method="post">
    @csrf
<div class="modal fade" id="ModalTambahKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah Kelas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Kelas</label>
                <textarea name="nama_kelas" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Kompetensi Keahlian</label>
                <textarea name="kompetensi_keahlian" class="form-control" required></textarea>
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
<form action="{{ route('kelas.update', ['kela' => 1]) }}" method="post">
    @csrf
    @method('PUT')
<div class="modal fade" id="ModalEditKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Edit Kelas</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Kelas</label>
                <input type="hidden" name="id_kelas" class="form-control" required>
                <textarea name="nama_kelas" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Kompetensi Keahlian</label>
                <textarea name="kompetensi_keahlian" class="form-control" required></textarea>
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
<form action="{{ route('kelas.destroy', ['kela' => 1]) }}" method="post">
    @csrf
    @method('DELETE')
<div class="modal fade" id="ModalHapusKelas" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
            <input type="hidden" name="id_kelas" class="form-control" required>
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
    function ModalEditKelas (id,nama,kk) {
        $('[name="id_kelas"]').val(id);
        $('[name="nama_kelas"]').val(nama);
        $('[name="kompetensi_keahlian"]').val(kk);
        $('#ModalEditKelas').modal('show');
        }
// Modal Edit
// Modal Hapus
function ModalHapusKelas ($id) {
        $('[name="id_kelas"]').val($id);
        $('#ModalHapusKelas').modal('show');
       }
// Modal Hapus
</script>
@endsection
