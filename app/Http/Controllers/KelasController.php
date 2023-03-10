<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;

class KelasController extends Controller
{
    public function index(){
        $kelas = DB::table('kelas')->get();
        return view('admin.kelas.Vkelas', ['kelas' => $kelas,]);
    }

    public function store(Request $request)
    {
    	DB::table('kelas')->insert([
			'nama_kelas' => $request->nama_kelas,
			'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);
		return redirect('admin/kelas');
    }

    public function update(Request $request){
        DB::table('kelas')->where('id',$request->id_kelas)->update([
            'nama_kelas' => $request->nama_kelas,
			'kompetensi_keahlian' => $request->kompetensi_keahlian,
        ]);
        return redirect('admin/kelas');
    }

    public function destroy(Request $request){
        $id_kelas=$request->id_kelas;
        DB::table('kelas')->where('id',$id_kelas)->delete();
        return redirect('admin/kelas');
    }

    public function cetakpdf(){
        $kelas = DB::table('kelas')->get();

        $pdf = PDF::loadview('admin.kelas.Vkelaspdf',['kelas'=>$kelas]);
    	return $pdf->download('laporan-kelas-pdf');
    }
}
