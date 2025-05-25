<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Profil extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    protected $table = 'profil';

    protected $fillable = [
        'user_id',
        'nama_lengkap',
        'no_telepon',
        'alamat',
        'jam_operasional',
        'deskripsi_profil',
    ];
}
