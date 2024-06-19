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

    public function amizades()
    {
        return $this->hasMany(Amizade::class, 'usuario1_id')
            ->where('status', 'aceito')
            ->orWhere('usuario2_id', $this->id)
            ->where('status', 'aceito');
    }

    public function amigos()
    {
        return $this->belongsToMany(Usuario::class, 'amizades', 'usuario1_id', 'usuario2_id')
            ->wherePivot('status', 'aceito')
            ->withPivot('status', 'data_criacao');
    }
}