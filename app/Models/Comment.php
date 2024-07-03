<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{

    use HasFactory;

    protected $table = 'Comentario';

    protected $fillable = ['texto', 'posts_id', 'usuario_id'];

    // Relação com o post
    public function post()
    {
        return $this->belongsTo(Post::class, 'posts_id'); // Certifique-se de que 'posts_id' está correto
    }

    // Relação com o usuário
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}

