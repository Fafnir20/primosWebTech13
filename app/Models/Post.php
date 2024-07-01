<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{

    use HasFactory;
    
    protected $fillable = [
        'usuario_id',
        'texto',
        'imagem',
    ];

    // Relação com os comentários
    public function comments()
    {
        return $this->hasMany(Comment::class, 'posts_id'); // Certifique-se de que 'posts_id' está correto
    }

    // Relação com o usuário
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    public function reactions()
    {
        return $this->hasMany(Reaction::class);
    }
}
