<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class DetailPengguna extends Model
{
   use HasApiTokens, HasFactory, Notifiable;
   protected $table = "detail_pengguna";

    protected $fillable = [
        'id',
        'id_pengguna',
        'id_tas',
        'id_alat'
    ];
}
