<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Tas extends Model
{
   use HasApiTokens, HasFactory, Notifiable;
   protected $table = "tas";

    protected $fillable = [
        'id',
        'label'
    ];
}
