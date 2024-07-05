<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\Usuario;
use App\Models\Amizade;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash; 
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class UsuarioController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $usuarioLogado = Auth::user();

        if (!$usuarioLogado) {
            return redirect()->route('login')->with('error', 'Por favor, faça login para continuar.');
        }

        // Obter amizades do usuário logado
        $amizades = $usuarioLogado->amizades;
        $amigosIds = $amizades->pluck('usuario2_id')->toArray();

        // Obter amigos
        $amigos = Usuario::whereIn('id', $amigosIds)->get();

        // Obter amigos online
        $amigosOnline = $amigos->where('status', 'online');

        // Obter posts com comentários
        $posts = Post::with(['comments.usuario', 'reactions'])
        ->whereIn('usuario_id', array_merge([$usuarioLogado->id], $amigosIds))
        ->withCount('comments') // Adiciona a contagem de comentários
        ->orderBy('created_at', 'desc')    
        ->get();

        // Obter pedidos de amizade pendentes
        $pedidosPendentes = Amizade::where('usuario2_id', $usuarioLogado->id)
                                   ->where('status', 'pendente')
                                   ->with('usuario1') // Carregar o modelo Usuario associado
                                   ->get();

        // Obter 4 usuários aleatórios, exceto o usuário logado e seus amigos
        $usuarios = Usuario::where('id', '!=', $usuarioLogado->id)
                           ->whereNotIn('id', $amigosIds)
                           ->inRandomOrder()
                           ->take(4)
                           ->get();

        // Passar dados para a view
        return view('index', [
            'usuarioLogado' => $usuarioLogado,
            'amigos' => $amigos,
            'amigosOnline' => $amigosOnline,
            'posts' => $posts,
            'pedidosPendentes' => $pedidosPendentes,
            'usuarios' => $usuarios
        ]);
    }

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
        return view('login');
    }

    public function buscarUsuarios()
    {

        $usuarioLogado = Auth::user();

        // Obter amizades do usuário logado
        $amizades = $usuarioLogado->amizades;

        // Obter IDs dos amigos
        $amigosIds = $amizades->pluck('usuario2_id')->toArray();

        // Obter informações dos amigos
        $amigos = Usuario::whereIn('id', $amigosIds)->get();

        return view('index', compact('usuarioLogado', 'amigos'));
    }


    public function buscarAmigosOnline()
    {
        $usuarioLogado = Auth::user();

        if (!$usuarioLogado) {
            return redirect()->route('login')->with('error', 'Por favor, faça login para continuar.');
        }

        // Obter amizades do usuário logado
        $amizades = $usuarioLogado->amizades;

        // Obter IDs dos amigos
        $amigosIds = $amizades->pluck('usuario2_id')->toArray();

        // Obter informações dos amigos que estão online
        $amigosOnline = Usuario::whereIn('id', $amigosIds)
            ->where('status', 'online')
            ->get();

        return $amigosOnline;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validação
        $request->validate([
            'nome' => 'required|max:100',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'biografia' => 'nullable',
            'interesses' => 'nullable',
            'email' => 'required|max:100|unique:usuario,email',
            'password' => 'required|max:50',
        ]);

        // Preparar dados para salvar
        $data = $request->all();

        // Hash da senha
        $data['password'] = Hash::make($data['password']);

        // Lógica para upload da foto
        if ($request->hasFile('foto')) {
            $data['foto'] = $request->file('foto')->store('fotos', 'public');
        }

        // Criar usuário
        Usuario::create($data);

        // Redirecionar com mensagem de sucesso
        return redirect()->route('usuarios.create')->with('success', 'Usuário cadastrado com sucesso!');
    }


    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            // Atualize o status do usuário para online
            $user = Auth::user(); // Obtenha o usuário autenticado
            $user->status = 'online';
            $user->save();

            //return redirect()->intended('indexUser'); // Redireciona para a página desejada
            return Redirect::route('indexUser')->with('success','Login feito');
        }

        return back()->withErrors([
            'email' => 'As credenciais fornecidas não correspondem aos nossos registros.',
        ]);
    }


    public function logout(Request $request)
    {
        // Atualize o status do usuário para offline
        $user = Auth::user(); // Obtenha o usuário autenticado
        if ($user) {
            $user->status = 'offline';
            $user->update(['status' => 'offline']);
        }

        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/');
    }

    public function OpenProfile(){

        $usuarioLogado = Auth::user();

        if (!$usuarioLogado) {
            return redirect()->route('login')->with('error', 'Por favor, faça login para continuar.');
        }

        // Obter amizades do usuário logado
        $amizades = $usuarioLogado->amizades;
        $amigosIds = $amizades->pluck('usuario2_id')->toArray();

        // Obter amigos
        $amigos = Usuario::whereIn('id', $amigosIds)->get();

        // Obter amigos online
        $amigosOnline = $amigos->where('status', 'online');

        // Passar dados para a view
        return view('profile', [
            'usuarioLogado' => $usuarioLogado,
            'amigos' => $amigos,
            'amigosOnline' => $amigosOnline
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        $usuarioLogado = Auth::user();

        if (!$usuarioLogado) {
            return redirect()->route('login')->with('error', 'Por favor, faça login para continuar.');
        }
    
        $amigo = Usuario::with(['amizades'])->find($id);
    
        if (!$amigo) {
            return redirect()->route('indexUser')->with('error', 'Usuário não encontrado.');
        }
    
        // Verificar se são amigos
        $saoAmigos = $usuarioLogado->amizades()->where('usuario2_id', $amigo->id)->exists();

        // Obter amigos em comum
        $amizadesLogado = $usuarioLogado->amizades->pluck('usuario2_id')->toArray();
        $amizadesAmigo = $amigo->amizades->pluck('usuario2_id')->toArray();
        $amigosEmComumIds = array_intersect($amizadesLogado, $amizadesAmigo);
        $amigosEmComum = Usuario::whereIn('id', $amigosEmComumIds)->get();
    
        // Obter posts do dono do perfil
        $posts = Post::with(['comments.usuario', 'reactions'])
            ->where('usuario_id', $amigo->id)
            ->withCount('comments') // Adiciona a contagem de comentários
            ->orderBy('created_at', 'desc')
            ->get();
    
        return view('profile', [
            'usuarioLogado' => $usuarioLogado,
            'amigo' => $amigo,
            'saoAmigos' => $saoAmigos,
            'amigosEmComum' => $amigosEmComum,
            'posts' => $posts,
        ]);
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
