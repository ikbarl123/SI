<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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



    public function kurangiStok($id,$jumlah){
        $stok = DB::table('barang')->where('id_barang',$id)->decrement('stok',$jumlah);
    }
        public function tambahStok($id,$jumlah){
        $stok = DB::table('barang')->where('id_barang',$id)->increment('stok',$jumlah);
    }
}
