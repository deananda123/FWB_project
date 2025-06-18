<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    protected $table = 'karya';
   protected $fillable = [
    'user_id','kategori_id','judul', 'deskripsi', 'harga', 'stok', 'gambar', 'status'
];

    
    public function user() {
        return $this->belongsTo(User::class);
    }
    
   public function kategoris() {
    return $this->belongsToMany(Kategori::class, 'karya_kategori');
}

    
    public function orders() {
        return $this->hasMany(Order::class);
    }
    
}
