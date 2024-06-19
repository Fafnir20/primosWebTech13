<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amizade extends Model
{
    use HasFactory;

    protected $table = 'amizades';

    protected $fillable = [
        'usuario1_id',
        'usuario2_id',
        'status',
        'data_criacao',
    ];

    public function usuario1(){
        return $this->belongsTo(Usuario::class, 'usuario1_id');
    }

    public function usuario2(){
        return $this->belongsTo(Usuario::class, 'usuario2_id');
}

}