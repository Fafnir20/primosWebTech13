<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    public function buscaPosts()
    {
        $usuarioLogado = Auth::user();

        if (!$usuarioLogado) {
            return redirect()->route('login')->with('error', 'Por favor, faça login para continuar.');
        }

        // Obter IDs dos amigos
        $amigosIds = $usuarioLogado->amizades->pluck('usuario2_id')->toArray();

        // Obter posts do usuário logado e dos amigos
        $posts = Post::whereIn('usuario_id', array_merge([$usuarioLogado->id], $amigosIds))
            ->orderBy('created_at', 'desc')
            ->get();

        return view('index', [
            'usuarioLogado' => $usuarioLogado,
            'posts' => $posts,
        ]);
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
        $request->validate([
            'texto' => 'nullable|string',
            'imagem' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $data = $request->only(['texto']);
        $data['usuario_id'] = Auth::id();

        if ($request->hasFile('imagem')) {
            $data['imagem'] = $request->file('imagem')->store('imagens', 'public');
        }

        Post::create($data);

        return redirect()->route('indexUser')->with('success', 'Post criado com sucesso!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

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
