<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // Relasi: Kalau dia seniman, punya banyak karya
    public function karya()
    {
        return $this->hasMany(Karya::class);
    }

    // Relasi: Kalau dia konsumen, punya banyak orders
    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    // Relasi: profil user (admin/seniman/konsumen)
    public function profil()
    {
        return $this->hasOne(Profil::class);
    }
}
