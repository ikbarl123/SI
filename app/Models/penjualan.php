<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class penjualan extends Model
{
    use HasFactory;
        public $timestamps = false;
    public $incrementing = false;
    protected $table = "penjualan";
    protected $primaryKey = 'id_penjualan';
     protected $fillable = [
            'id_penjualan',
            'nama_pembeli',
            'jumlah_pembayaran',
            'tanggal',
            'username',
    ];

        public function barang()
    {
        return $this->belongsToMany(barang::class,'detail_penjualan','id_penjualan','id_barang')->withPivot(['jumlah']);
    }
}
