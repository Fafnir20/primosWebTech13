<link rel="stylesheet" href="{{ url('assets/css/leftSide.css') }}">

<div class="left">

    <div class="img">
        <img src="{{ asset('storage/' . $usuarioLogado->foto) }}">
        
        <a href="{{ route('OpenProfile') }}">{{ $usuarioLogado->nome }}</a>
    </div>

    <div class="img">
        <img src="{{url('assets/img/friend.png')}}">
        <p>Friends</p>
    </div>


    <hr>

    <h2>Access Fast</h2>
    <p class="edit">Edit</p>

    <div class="shortcuts">
        <img src="{{url('assets/img/shortcuts_4.png')}}">
        <p>Clubes</p>
    </div>

    <div class="shortcuts">
        <img src="{{url('assets/img/shortcuts_5.webp')}}">
        <p>Eventos</p>
    </div>

    <div class="shortcuts">
        <img src="{{url('assets/img/settings.png')}}">
        <p>Definições</p>
    </div>
    @include('templates.sideRequestFriends', ['pedidosPendentes' => $pedidosPendentes])
</div>


@yield('leftSide')