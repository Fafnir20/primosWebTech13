<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Reaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReactionController extends Controller
{
    public function reactToPost(Request $request, $postId)
    {
        $usuarioLogado = Auth::user();

        if (!$usuarioLogado) {
            return response()->json(['error' => 'Por favor, faça login para continuar.'], 401);
        }

        $post = Post::findOrFail($postId);

        // Remover reação anterior se existir
        $existingReaction = Reaction::where('post_id', $postId)
            ->where('usuario_id', $usuarioLogado->id)
            ->first();

        if ($existingReaction) {
            $existingReaction->delete();
        }

        // Adicionar nova reação
        $reaction = new Reaction([
            'post_id' => $postId,
            'usuario_id' => $usuarioLogado->id,
            'type' => $request->input('type')
        ]);

        $reaction->save();

        return response()->json(['success' => true, 'message' => 'Reação adicionada com sucesso.']);
    }
}
