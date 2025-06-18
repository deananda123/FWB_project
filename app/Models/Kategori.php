<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kategori extends Model
{
     use HasFactory;
    protected $table = 'kategori'; // <-- ini penting!
    protected $fillable = ['nama'];
    public function karya() {
        return $this->belongsToMany(Karya::class, 'karya_kategori');
    }
    
}
