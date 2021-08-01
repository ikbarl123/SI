<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class restok extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = "restok";
    protected $primaryKey = 'id_restok';
    protected $fillable = [
            'id_restok',
            'id_barang',
            'nama_supplier',
            'tanggal',
            'total_pembayaran',
            'status',
            'jumlah',
            'username',
    ];

        public function barang()
    {
        return $this->belongsTo(Barang::class,'id_barang','id_barang');
    }
}
