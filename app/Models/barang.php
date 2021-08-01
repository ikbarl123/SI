<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class barang extends Model
{
    use HasFactory;
    public $timestamps = false;
    public $incrementing = false;
    protected $table = "barang";
    protected $primaryKey = 'id_barang';
    protected $fillable = [
            'id_barang',
            'nama_barang',
            'harga',
            'stok',
    ];



    public function kurangiStok($id_barang,$jumlah){
        $stok = DB::table('barang')->where('id_barang',$id_barang)->decrement('stok',$jumlah);
    }
        public function tambahStok($id_barang,$jumlah){
        $stok = DB::table('barang')->where('id_barang',$id_barang)->increment('stok',$jumlah);
    }
}
