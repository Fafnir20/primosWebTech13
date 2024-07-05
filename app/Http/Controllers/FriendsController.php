<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Amizade;
use App\Models\Usuario;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;



class FriendsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    // Método para enviar pedido de amizade
    public function adicionar(Request $request)
    {
        $usuario1_id = Auth::id(); // ID do usuário logado
        $usuario2_id = $request->input('usuario2_id'); // ID do usuário a ser adicionado

        // Verifica se a amizade já existe
        $amizadeExistente = Amizade::where(function($query) use ($usuario1_id, $usuario2_id) {
            $query->where('usuario1_id', $usuario1_id)
                  ->where('usuario2_id', $usuario2_id);
        })->orWhere(function($query) use ($usuario1_id, $usuario2_id) {
            $query->where('usuario1_id', $usuario2_id)
                  ->where('usuario2_id', $usuario1_id);
        })->first();

        if ($amizadeExistente) {
            return response()->json(['message' => 'Pedido de amizade já enviado ou amizade já existente'], 400);
        }

        // Cria o pedido de amizade
        Amizade::create([
            'usuario1_id' => $usuario1_id,
            'usuario2_id' => $usuario2_id,
            'status' => 'pendente',
        ]);

        return response()->json(['message' => 'Pedido de amizade enviado com sucesso']);
    }

       // Método para aceitar pedido de amizade
    public function aceitar(Request $request)
    {
        $usuario1_id = Auth::id(); // ID do usuário logado
        $usuario2_id = $request->input('usuario2_id'); // ID do usuário que enviou o pedido

        $amizade = Amizade::where('usuario1_id', $usuario2_id)
                          ->where('usuario2_id', $usuario1_id)
                          ->where('status', 'pendente')
                          ->first();

        if ($amizade) {
            $amizade->status = 'aceito';
            $amizade->save();

            return response()->json(['message' => 'Pedido de amizade aceito com sucesso']);
        }

        return response()->json(['message' => 'Pedido de amizade não encontrado'], 404);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
  /*  public function show($id)
    {
        $usuarioLogado = Auth::user();
    
        if (!$usuarioLogado) {
            return redirect()->route('login')->with('error', 'Por favor, faça login para continuar.');
        }
    
        // Obter o usuário do perfil
        $usuarioPerfil = Usuario::findOrFail($id);
    
        // Obter amizades do usuário logado
        $amizades = $usuarioLogado->amizades->pluck('usuario2_id')->toArray();
    
        // Verificar se o usuário logado já é amigo do usuário do perfil
        $saoAmigos = in_array($usuarioPerfil->id, $amizades);
    
        // Obter amigos em comum
        $amigosComuns = $usuarioLogado->amizades->whereIn('usuario2_id', $usuarioPerfil->amizades->pluck('usuario2_id'))->all();
    
        // Obter posts do usuário do perfil
        $postsPerfil = Post::with(['comments.usuario', 'reactions'])
            ->where('usuario_id', $usuarioPerfil->id)
            ->withCount('comments')
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('profile', [
            'usuarioLogado' => $usuarioLogado,
            'usuarioPerfil' => $usuarioPerfil,
            'saoAmigos' => $saoAmigos,
            'amigosComuns' => $amigosComuns,
            'postsPerfil' => $postsPerfil
        ]);
    }/*

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
