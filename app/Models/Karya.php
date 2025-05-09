<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Karya extends Model
{
    public function user() {
        return $this->belongsTo(User::class);
    }
    
    public function kategori() {
        return $this->belongsToMany(Kategori::class, 'karya_kategori');
    }
    
    public function orders() {
        return $this->hasMany(Order::class);
    }
    
}
