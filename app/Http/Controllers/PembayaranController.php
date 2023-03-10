<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Pembayaran;
use Barryvdh\DomPDF\Facade\PDF;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class PembayaranController extends Controller
{
    public function index(){
        $petugas = DB::table('users')->get();
        $spp = DB::table('spps')->get();
        $siswa = DB::table('siswas')->get();
        $kelas = DB::table('kelas')->get();
        $pembayaran = Pembayaran::orderByDesc('id')->get();

        return view('admin.pembayaran.Vpembayaran',
        ['pembayaran' => $pembayaran,
        'petugas' => $petugas,
        'spp' => $spp,
        'siswa' => $siswa,
        'kelas'=> $kelas]);
    }

    public function store(Request $request)
    {
    	DB::table('pembayarans')->insert([
			'petugas_id' => $request->id_petugas ?? Auth::user()->id,
			'siswa_id' => $request->siswa_id,
			'tgl_bayar' => $request->tgl_bayar,
			'bulan_dibayar' => $request->bulan_dibayar,
			'tahun_dibayar' => $request->tahun_dibayar,
			'spp_id' => $request->id_spp,
			'jumlah_bayar' => $request->jumlah_bayar,
        ]);
		return redirect('admin/pembayaran');
    }

    public function update(Request $request){
        $update = DB::table('pembayarans')->where('id',$request->id_pembayaran)->update([
			'petugas_id' => $request->id_petugas ?? Auth::id(),
			'siswa_id' => $request->siswa_id,
			'tgl_bayar' => $request->tgl_bayar,
			'bulan_dibayar' => $request->bulan_dibayar,
			'tahun_dibayar' => $request->tahun_dibayar,
			'spp_id' => $request->id_spp,
			'jumlah_bayar' => $request->jumlah_bayar,
        ]);
        return redirect('admin/pembayaran');
    }

    public function destroy(Request $request){
        $id_pembayaran=$request->id_pembayaran;
        DB::table('pembayarans')->where('id',$id_pembayaran)->delete();
        return redirect('admin/pembayaran');
    }

    public function cetakPdf(){
        $pembayaran = Pembayaran::all();

        $pdf = PDF::loadview('admin.pembayaran.Vpembayaranpdf',['pembayaran'=>$pembayaran]);
    	return $pdf->download('laporan-pembayaran-pdf');
    }

    public function history(){
        $petugas = DB::table('users')->get();
        $spp = DB::table('spps')->get();
        $siswa = DB::table('siswas')->get();
        $kelas = DB::table('kelas')->get();
        $pembayaran = Pembayaran::orderByDesc('id')->get();

        return view('admin.pembayaran.Vpembayaranhistory',
        ['pembayaran' => $pembayaran,
        'petugas' => $petugas,
        'spp' => $spp,
        'siswa' => $siswa,
        'kelas'=> $kelas]);
    }

    public function historySiswa()
    {
        $petugas = DB::table('users')->get();
        $spp = DB::table('spps')->get();
        $siswa = DB::table('siswas')->get();
        $kelas = DB::table('kelas')->get();
        $pembayaran = Pembayaran::whereSiswaId(Session::get('siswa_id'))->orderByDesc('id')->get();

        return view('admin.pembayaran.Vpembayaranhistory',
        ['pembayaran' => $pembayaran,
        'petugas' => $petugas,
        'spp' => $spp,
        'siswa' => $siswa,
        'kelas'=> $kelas]);
    }

}
