@extends('layouts.master')
@section('tittle')
SPP
@endsection
@section('content')
<div>
    <div class="d-f mb-3 " >
        <button type="button" class="btn btn-primary me-3" data-bs-toggle="modal" data-bs-target="#ModalTambahSpp">
            Tambah
        </button>
        <a href="/admin/spp/cetakpdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
    </div>

    <table class="table table-bordered ">
        <tr>
            <th>Tahun</th>
            <th>Nominal</th>
            <th>Aksi</th>
        </tr>
        @foreach ( $spp as $get )
        <tr>
            <td>{{$get->tahun}}</td>
            <td>{{$get->nominal}}</td>
            <td>
                <a href="#" onclick="ModalEditSpp('{{ $get->id }}' ,'{{ $get->tahun }}' , '{{ $get->nominal }}')" class="btn btn-primary" >Edit</a>
                <a href="#" onclick="ModalHapusSpp('{{ $get->id }}')" class="btn btn-danger">Hapus</a>
            </td>
        </tr>
        @endforeach
      </table>
</div>

<!-- Form Modal Tambah  -->
<form action="{{ route('spp.store') }}" method="post">
    @csrf
<div class="modal fade" id="ModalTambahSpp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Tambah SPP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Tahun </label>
                <textarea name="tahun" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nominal</label>
                <textarea name="nominal" class="form-control" required></textarea>
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
<form action="{{ route('spp.update', ['spp'=>1]) }}" method="post">
    @csrf
    @method('PUT')
<div class="modal fade" id="ModalEditSpp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog ">
        <div class="modal-content">
        <div class="modal-header">
            <h5 class="modal-title" >Form Edit SPP</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <div class="mb-3">
                <label  class="form-label">Tahun </label>
                <input type="hidden" name="id_spp" class="form-control" required>
                <textarea name="tahun" class="form-control" required></textarea>
            </div>
            <div class="mb-3">
                <label  class="form-label">Nominal</label>
                <textarea name="nominal" class="form-control" required></textarea>
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
<form action="spp/hapus" method="post">
    @csrf
    @method('DELETE')
<div class="modal fade" id="ModalHapusSpp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
          <div class="modal-footer">
            <input type="hidden" name="id_spp" class="form-control" required>
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
    function ModalEditSpp (id,tahun,nominal) {
        $('[name="id_spp"]').val(id);
        $('[name="tahun"]').val(tahun);
        $('[name="nominal"]').val(nominal);
        $('#ModalEditSpp').modal('show');
        }
// Modal Edit
// Modal Hapus
    function ModalHapusSpp ($id) {
        $('[name="id_spp"]').val($id);
        $('#ModalHapusSpp').modal('show');
       }
// Modal Hapus
</script>
@endsection

