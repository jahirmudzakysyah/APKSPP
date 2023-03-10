<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Session;
use App\Models\Pembayaran;

class PetugasController extends Controller
{
    public function index(){
        $petugas = DB::table('users')->get();
        return view('admin.petugas.Vpetugas', ['petugas' => $petugas]);
    }

    public function store(Request $request)
    {
    	DB::table('users')->insert([
			'nama_petugas' => $request->nama_petugas,
			'name' => $request->username,
			'username' => $request->username,
			'password' => bcrypt($request->password),
			'level' => $request->level,
        ]);
		return redirect('admin/petugas');
    }

    public function update(Request $request){
        DB::table('users')->where('id',$request->id_petugas)->update([
			'nama_petugas' => $request->nama_petugas,
			'name' => $request->nama_petugas,
            'username' => $request->username,
			'level' => $request->level,
        ]);
        return redirect('admin/petugas');
    }

    public function destroy(Request $request){
        $id_petugas=$request->id_petugas;
        DB::table('users')->where('id',$id_petugas)->delete();
        return redirect('admin/petugas');
    }

    public function cetakPdf(){
        $petugas = DB::table('users')->get();

        $pdf = PDF::loadview('admin.petugas.Vpetugaspdf',['petugas'=>$petugas]);
    	return $pdf->download('laporan-petugas-pdf');
    }

    public function history(){
        $petugas = DB::table('users')->get();
        $spp = DB::table('spps')->get();
        $siswa = DB::table('siswas')->get();
        $kelas = DB::table('kelas')->get();
        $pembayaran = Pembayaran::orderByDesc('id')->get();

        return view('petugas.historypembayaran',
        ['pembayaran' => $pembayaran,
        'petugas' => $petugas,
        'spp' => $spp,
        'siswa' => $siswa,
        'kelas'=> $kelas]);
    }



}
