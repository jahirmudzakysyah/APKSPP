<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Facades\Auth;

class SppController extends Controller
{
    public function index(){
        $spp = DB::table('spps')->get();
        return view('admin.spp.Vspp', ['spp' => $spp]);
    }

    public function store(Request $request)
    {
    	DB::table('spps')->insert([
			'tahun' => $request->tahun,
			'nominal' => $request->nominal,
        ]);
		return redirect('admin/spp');
    }

    public function update(Request $request){
        DB::table('spps')->where('id',$request->id_spp)->update([
            'tahun'=>$request->tahun,
            'nominal'=>$request->nominal,
        ]);
        return redirect('admin/spp');
    }

    public function destroy(Request $request){
        $id_spp=$request->id_spp;
        DB::table('spps')->where('id',$id_spp)->delete();
        return redirect('admin/spp');
    }

    public function cetakpdf(){
        $spp = DB::table('spps')->get();

        $pdf = PDF::loadview('admin.spp.Vspppdf',['spp'=>$spp]);
    	return $pdf->download('laporan-spp-pdf');
    }
}
