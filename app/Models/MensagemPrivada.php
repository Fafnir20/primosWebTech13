<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MensagemPrivada extends Model
{
    use HasFactory;

    protected $table = 'MensagemPrivada';

    protected $fillable = [
        'remetente_id',
        'destinatario_id',
        'texto',
    ];

    public function remetente()
    {
        return $this->belongsTo(Usuario::class, 'remetente_id');
    }

    public function destinatario()
    {
        return $this->belongsTo(Usuario::class, 'destinatario_id');
    }
}
