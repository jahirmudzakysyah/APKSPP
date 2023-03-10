<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pembayaran extends Model
{
    protected $table = "pembayarans";

    protected $fillable = ['petugas_id','siswa_id','tgl_bayar','bulan_dibayar', 'tahun_dibayar', 'spp_id', 'jumlah_bayar'];

    public function petugas()
    {
        return $this->belongsTo(User::class, 'petugas_id', 'id');
    }

    public function siswa()
    {
        return $this->belongsTo(Siswa::class, 'siswa_id', 'id');
    }

    public function spp()
    {
        return $this->belongsTo(Spp::class, 'spp_id', 'id');
    }
}
