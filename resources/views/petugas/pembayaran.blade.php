<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pembayaran</title>
    <link rel="stylesheet" href="/css/sidebar.css">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">

</head>
<body>
    <div class="content">
        <nav class="sidebar">
            <header>
                <div class="image-text">
                    <span class="image">
                        <i class='bx bxl-graphql'></i>
                    </span>
                    <div class="text header-text">
                        <span class="name">Kaihir</span>
                    </div>
                </div>
            </header>
            <div class="menu-bar">
                <div class="menu">
                    <ul class="menu-links">
                        <li class="nav-link">
                            <a href="/petugas/home">
                                <i class='bx bxs-grid-alt icon'></i>
                                <span class="text nav-text">Dashboard</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="/petugas/pembayaran">
                                <i class='bx bxs-wallet icon' ></i>
                                <span class="text nav-text">Pembayaran</span>
                            </a>
                        </li>
                        <li class="nav-link">
                            <a href="/petugas/pembayaran/history">
                                <i class='bx bxs-hourglass icon' ></i>
                                <span class="text nav-text">History Pembayaran</span>
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="bottom-content">
                    <li class="">
                        <a href="{{url('logout')}}">
                            <i class='bx bx-log-out icon' ></i>
                            <span class="text nav-text">Logout</span>
                        </a>
                    </li>
                </div>
            </div>
        </nav>
        <div class="top">
            <p>Aplikasi Pembayaran SPP</p>
            <div class="search-box">
                <i class='bx bx-search' ></i>
                <input type="text" placeholder="Search here...">
            </div>
            <i class='bx bx-user-circle sidebar-toggle' ></i>
        </div>

{{-- ----------------------------------------------- --}}
        <div class="main-content">
            <div>
                <div class="d-f mb-3 " >
                    <button type="button" class="btn btn-primary me-3 " data-bs-toggle="modal" data-bs-target="#ModalTambahPembayaran">
                        Tambah
                    </button>
                    <a href="/petugas/pembayaran/cetakpdf" class="btn btn-primary" target="_blank">CETAK PDF</a>
                </div>

                <table class="table table-bordered">
                    <tr>
                        <th>No</th>
                        <th>Tanggal</th>
                        <th>Petugas</th>
                        <th>Nama Siswa</th>
                        <th>Kelas</th>
                        <th>Bulan Di Bayar</th>
                        <th>Tahun Di Bayar</th>
                        <th>Jumlah Bayar</th>
                        <th>Tahun</th>
                        <th>Aksi</th>
                    </tr>
                    @foreach ( $pembayaran as $get )
                    <tr>
                        <td>{{isset($i)? ++$i : $i = 1 }}</td>
                        <td>{{$get->tgl_bayar}}</td>
                        <td>{{$get->petugas->nama_petugas}}</td>
                        <td>{{$get->siswa->nama}}</td>
                        <td>{{$get->siswa->kelas->nama_kelas}}</td>
                        <td>{{$get->bulan_dibayar}}</td>
                        <td>{{$get->tahun_dibayar}}</td>
                        <td>{{$get->jumlah_bayar}}</td>
                        <td>{{$get->spp->tahun ?? '-'}}</td>
                        <td>
                            <a href="#" onclick="ModalEditPembayaran('{{ $get->id }}' ,'{{ $get->petugas->nama_petugas }}' , '{{ $get->siswa->nama }}' ,'{{ $get->tgl_bayar }}' ,'{{ $get->bulan_dibayar }}' ,'{{ $get->tahun_dibayar }}' ,'{{ $get->spp_id }}' ,'{{ $get->jumlah_bayar }}')" class="btn btn-primary" >Edit</a>
                            <a href="#" onclick="ModalHapusPembayaran('{{ $get->id }}')" class="btn btn-danger">Hapus</a>
                        </td>
                    </tr>
                    @endforeach
                  </table>
            </div>

            <!-- Form Modal Tambah  -->
            <form action="pembayaran/tambah" method="post">
                @csrf
            <div class="modal fade" id="ModalTambahPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Form Tambah Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label   class="form-label">Petugas </label>
                            <select type="hidden"  name="id_petugas" id="id_petugas">
                                <option value="">Pilih Petugas</option>
                                @foreach ( $petugas as $getk )
                                <option value="{{$getk->id}}"
                                    @if($getk->id == $getk->id)
                                        selected
                                    @endif @selected($getk->id == Auth::id())>{{$getk->nama_petugas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Siswa </label>
                            <select name="siswa_id" id="siswa_id">
                                <option value="">Pilih Siswa</option>
                                @foreach ( $siswa as $getk )
                                <option value="{{$getk->id}}"
                                    @if($getk->id == $getk->id)
                                        selected
                                    @endif>{{$getk->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tanggal</label>
                            <input type="date" name="tgl_bayar" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Bulan Dibayar</label>
                            <textarea name="bulan_dibayar" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tahun DiBayar</label>
                            <textarea name="tahun_dibayar" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">ID SPP</label>
                            <select name="id_spp" id="id_spp">
                                <option value="">Pilih Kelas</option>
                                @foreach ( $spp as $getk )
                                <option value="{{$getk->id}}"
                                    @if($getk->id == $getk->id)
                                        selected
                                    @endif>{{$getk->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Jumlah Bayar</label>
                            <textarea name="jumlah_bayar" class="form-control" required></textarea>
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
            <form action="pembayaran/edit" method="post">
                @csrf
                <input type="hidden" name="id_pembayaran" class="form-control" required>
            <div class="modal fade" id="ModalEditPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog ">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" >Form Edit Pembayaran</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="mb-3">
                            <label  class="form-label">Petugas </label>
                            <select name="id_petugas" id="id_petugas">
                                <option value="">Pilih Petugas</option>
                                @foreach ( $petugas as $getk )
                                <option value="{{$getk->id}}"
                                    @if($getk->id == $getk->id)
                                        selected
                                    @endif>{{$getk->nama_petugas}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Siswa </label>
                            <select name="siswa_id" id="siswa_id">
                                <option value="">Pilih Siswa</option>
                                @foreach ( $siswa as $getk )
                                <option value="{{$getk->id}}"
                                    @if($getk->id == $getk->id)
                                        selected
                                    @endif>{{$getk->nama}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tanggal</label>
                            <input type="date" name="tgl_bayar" class="form-control" required>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Bulan Dibayar</label>
                            <textarea name="bulan_dibayar" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Tahun DiBayar</label>
                            <textarea name="tahun_dibayar" class="form-control" required></textarea>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">ID SPP</label>
                            <select name="id_spp" id="id_spp">
                                <option value="">Pilih Kelas</option>
                                @foreach ( $spp as $getk )
                                <option value="{{$getk->id}}"
                                    @if($getk->id == $getk->id)
                                        selected
                                    @endif>{{$getk->tahun}}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label  class="form-label">Jumlah Bayar</label>
                            <textarea name="jumlah_bayar" class="form-control" required></textarea>
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
            <form action="pembayaran/hapus" method="post">
                @csrf
            <div class="modal fade" id="ModalHapusPembayaran" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="exampleModalLabel">Form Hapus</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">Data yang dihapus tidak akan bisa dikembalikan.</div>
                      <div class="modal-footer">
                        <input type="hidden" name="id_pembayaran" class="form-control" required>
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
            function ModalEditPembayaran (id,petugas,nisn,tgl,bulan,tahun,spp,bayar) {
                    $('[name="id_pembayaran"]').val(id);
                    $('[name="nama_petugas"]').val(petugas);
                    $('[name="nama"]').val(nisn);
                    $('[name="tgl_bayar"]').val(tgl);
                    $('[name="bulan_dibayar"]').val(bulan);
                    $('[name="tahun_dibayar"]').val(tahun);
                    $('[name="id_spp"]').val(spp);
                    $('[name="jumlah_bayar"]').val(bayar);
                    $('#ModalEditPembayaran').modal('show');
                    }
            // Modal Edit
            // Modal Hapus
            function ModalHapusPembayaran ($id) {
                    $('[name="id_pembayaran"]').val($id);
                    $('#ModalHapusPembayaran').modal('show');
                   }
            // Modal Hapus
            </script>
        </div>
    </div>



























    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js" integrity="sha384-oBqDVmMz9ATKxIep9tiCxS/Z9fNfEXiDAYTujMAeBAsjFuCZSmKbSSUnQlmh/jp3" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.min.js" integrity="sha384-mQ93GR66B00ZXjt0YO5KlohRA5SY2XofN4zfuZxLkoj1gXtW8ANNCe9d5Y3eG5eD" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
</body>
</html>
