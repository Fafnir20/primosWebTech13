<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

class Usuario extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'Usuario';
    protected $fillable = ['nome', 'foto', 'biografia', 'interesses', 'email', 'password'];

    protected $hidden = ['password', 'remember_token'];
}