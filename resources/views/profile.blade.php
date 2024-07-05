@extends('templates.template')

@section('title', 'Profile')

@section('estilos')
<link rel="stylesheet" href="{{ url('assets/css/profile.css') }}">  
@endsection

@section('conteudo')
<div class="profile-container">
    <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}" class="cover-img">

    <div class="pd-left">
      <div class="pd-row">
          <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}" class="pd-image">
          <div>
              <h3>{{ $amigo->nome }}</h3>
              <p>{{ count($amigo->amizades) }} amigos - {{ count($amigosEmComum) }} em comum</p>
              @foreach($amigosEmComum as $amigoComum)
                  <img src="{{ asset('storage/' . $amigoComum->foto) }}">
              @endforeach
          </div>
      </div>
  </div>

  <div class="pd-right">
    @if($saoAmigos)
        <button type="button"><img src="{{ asset('img/add-friends.png') }}">Amigo</button>
    @else
        <button type="button"><img src="{{ asset('img/add-friends.png') }}">Adicionar Amigo</button>
    @endif
    <button type="button"><img src="{{ asset('img/message.png') }}">Message</button><br>
    <a href=""><img src="{{ asset('img/more.png') }}"></a>
</div>
</div>

<div class="main">
<div class="sideAbout">
    <div class="profile-details">
    <div class="profile-info">
        <div class="info-col">
            <div class="profile-intro">
                <h3>Intro</h3>
                <p class="intro-text">{{ $amigo->biografia }}<img src="{{ asset('img/feeling.png') }}"></p>
                <hr>
                <ul>
                    <li><img src="{{ asset('img/profile-job.png') }}"> {{ $amigo->trabalho }}</li>
                    <li><img src="{{ asset('img/profile-study.png') }}"> {{ $amigo->estudo }}</li>
                    <li><img src="{{ asset('img/profile-study.png') }}"> {{ $amigo->escola }}</li>
                    <li><img src="{{ asset('img/profile-home.png') }}"> {{ $amigo->residencia }}</li>
                    <li><img src="{{ asset('img/profile-location.png') }}"> {{ $amigo->localizacao }}</li>
                </ul>
            </div>

            <div class="profile-intro">
                <div class="title-box">
                    <h3>Friends</h3>
                    <a href="">All Friends</a>
                </div>
                <p>{{ count($amigo->amizades) }} ({{ count($amigosEmComum) }} mutual)</p>
                <div class="friends-box">
                    @foreach($amigo->amizades as $amigoAmizade)
                        <div>
                            <img src="{{ asset('storage/' . $amigoAmizade->foto) }}">
                            <p>{{ $amigoAmizade->nome }}</p>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    </div>
</div>
<div class="sidePosts">
        <div class="post-col">
            @foreach($posts as $post)
                <div class="post">
                    <div class="post-header">
                        <div>
                            <h3>{{ $post->usuario->nome }}</h3>
                            <span>{{ $post->created_at->diffForHumans() }}</span>
                        </div>
                    </div>
                    <div class="post-body">
                        <h3>{{ $post->titulo }}</h3>
                        <p>{{ $post->conteudo }}</p>
                        @if($post->imagem)
                            <img src="{{ asset('storage/' . $post->imagem) }}" class="post-image">
                        @endif
                    </div>
                    <div class="post-footer">
                        <span>{{ $post->comments_count }} comentários</span>
                    </div>
                </div>
            @endforeach
        </div>
</div>
</div>

</div>
@endsection

@section('javascript')
<script src="{{ url('js/app.js') }}"></script>
@endsection
