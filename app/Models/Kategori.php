<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
    public function karya() {
        return $this->belongsToMany(Karya::class, 'karya_kategori');
    }
    
}
