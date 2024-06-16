<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = 'Usuario'; // Especifique o nome da tabela, se diferente do plural do nome do model
    protected $fillable = ['nome', 'foto', 'biografia', 'interesses'];
}
