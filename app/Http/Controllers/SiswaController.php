<?php

namespace App\Http\Controllers;

use App\Models\Siswa;
use App\Models\Pembayaran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;

class SiswaController extends Controller
{
    public function index(){
        $kelas = DB::table('kelas')->get();
        $spp = DB::table('spps')->get();
        $siswa = Siswa::orderByDesc('id')->get();

        return view('admin.siswa.Vsiswa', ['siswa' => $siswa, 'kelas'=>$kelas, 'spp'=>$spp]);
    }

    public function store(Request $request)
    {
    	DB::table('siswas')->insert([
			'nisn' => $request->nisn,
			'nis' => $request->nis,
			'nama' => $request->nama,
			'kelas_id' => $request->id_kelas,
			'alamat' => $request->alamat,
			'no_telp' => $request->no_telp,
			'spp_id' => $request->id_spp,
        ]);
		return redirect('admin/siswa');
    }

    public function update(Request $request){
        DB::table('siswas')->where('nisn',$request->nisn)->update([
            'nisn' => $request->nisn,
			'nis' => $request->nis,
			'nama' => $request->nama,
			'kelas_id' => $request->id_kelas,
			'alamat' => $request->alamat,
			'no_telp' => $request->no_telp,
			'spp_id' => $request->id_spp,
        ]);
        return redirect('admin/siswa');
    }

    public function destroy(Request $request){
        $nisn=$request->nisn;
        DB::table('siswas')->where('nisn',$nisn)->delete();
        return redirect('admin/siswa');
    }

    public function cetakpdf(){
        $siswa = DB::table('siswas')->get();

        $pdf = PDF::loadview('admin.siswa.Vsiswapdf',['siswa'=>$siswa]);
    	return $pdf->download('laporan-siswa-pdf');
    }

    public function viewHomeSiswa()
    {
    	$nisn = Session::get('nisn');
        $siswa = Siswa::where('nisn', $nisn)->get()->first();
    	$pembayaran = Pembayaran::where('siswa_id',$siswa->id)->get();
    	if (!Session::get('login')) {
    		return redirect('/');
    	}else{
    		if (!Session::get('level')) {
    			return view('siswa.home',compact('pembayaran'));
            }else{
                return redirect('/');
            }

    	}
    }
}
