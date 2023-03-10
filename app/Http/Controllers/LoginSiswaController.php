<?php

namespace App\Http\Controllers;

use App\Models\Pembayaran;
use App\Models\Siswa;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class LoginSiswaController extends Controller
{
    public function index()
    {
        return view('auth.login-siswa');
    }

    public function store(Request $request)
    {
        $siswa = Siswa::whereNisn($request->nisn)->first();

        if(!$siswa){
            return redirect('/login-siswa')->with('error', 'Nisn tidak ditemukan.');
        }

        Session::put('name', $siswa->nama);
        Session::put('level', 'siswa');
        Session::put('siswa_id', $siswa->id);

        $petugas = DB::table('petugas')->get();
        $spp = DB::table('spps')->get();
        $siswa = DB::table('siswas')->get();
        $kelas = DB::table('kelas')->get();
        $pembayaran = Pembayaran::orderByDesc('id')->get();

        return redirect('/dashboard-siswa');
    }

    public function destroy()
    {
        Session::forget('name');
        Session::forget('level');
        Session::forget('siswa_id');

        return redirect('/');
    }
}
