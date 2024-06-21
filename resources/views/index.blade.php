@extends('templates.template')
@extends('templates.PopUpPost')

@section('title', 'Principal')

@section('estilos')
<link rel="stylesheet" href="{{ url('assets/css/index.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/PopUp_Post.css') }}">
<link rel="stylesheet" href="{{ url('assets/css/rightSide.css') }}">
@endsection

@section('conteudo')
<div class="main">
    <div class="center">
        <div class="my_post">
            <div class="post_top">
                <img src="{{ asset('storage/' . $usuarioLogado->foto) }}">
                <input type="text" id="search" placeholder="What's on your mind, John?">
            </div>
            <hr>
            <div class="post_bottom">
                <div class="post_icon">
                    <i class="fa-solid fa-images green"></i>
                    <p>Photo/video</p>
                </div>
                <div class="post_icon">
                    <i class="fa-regular fa-face-grin yellow"></i>
                    <p>Feeling/activity</p>
                </div>
            </div>
        </div>

        <!-- Publicacoes dos amigos-->
        @foreach ($amigos as $amigo)
        <div class="friends_post">
            <div class="friend_post_top">
                <div class="img_and_name">
                    @if($amigo->foto)
                    <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}" width="100">
                    @endif
                    <div class="friends_name">
                        <p class="friends_name">{{ $amigo->nome }}</p>
                        <p class="time">16h.<i class="fa-solid fa-user-group"></i></p>
                    </div>
                </div>
                <div class="menu">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
            @if($amigo->foto)
            <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}" width="100">
            @endif
            <div class="info">
                <div class="emoji_img">
                    <img src="{{ url('assets/img/like.png') }}">
                    <img src="{{ url('assets/img/haha.png') }}">
                    <img src="{{ url('assets/img/heart.png') }}">
                    <p>You, Charith Disanayaka and 25K others</p>
                </div>
                <div class="comment">
                    <p>421 Comments</p>
                    <p>1.3K Shares</p>
                </div>
            </div>
            <hr>
            <div class="like">
                <div class="like_icon">
                    <i class="fa-solid fa-thumbs-up activi"></i>
                    <p>Like</p>
                </div>
                <div class="like_icon">
                    <i class="fa-solid fa-message"></i>
                    <p>Comments</p>
                </div>
                <div class="like_icon">
                    <i class="fa-solid fa-share"></i>
                    <p>Share</p>
                </div>
            </div>
            <hr>
            <div class="comment_warpper">
                @if($amigo->foto)
                <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}" width="100">
                @endif
                <div class="circle"></div>
                <div class="comment_search">
                    <input type="text" placeholder="Write a comment">
                    <i class="fa-regular fa-face-smile"></i>
                    <i class="fa-solid fa-camera"></i>
                    <i class="fa-regular fa-note-sticky"></i>
                </div>
            </div>
        </div>
        @endforeach
    </div>

    @include('templates.leftSide')

    <div class="right">
        <div class="first_warpper">
            <div class="page">
                <h2>Your Pages and profiles</h2>
                <div class="menu">
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
            <div class="page_img">
                <img src="{{ url('assets/img/page.jpg') }}">
                <p>Web Designer</p>
            </div>
            <div class="page_icon">
                <i class="fa-regular fa-bell"></i>
                <p>20 Notifications</p>
            </div>
            <div class="page_icon">
                <i class="fa-solid fa-bullhorn"></i>
                <p>Create promotion</p>
            </div>
        </div>
        <hr>
        <div class="third_warpper">
            <div class="contact_tag">
                <h2>Contacts</h2>
                <div class="contact_icon">
                    <i class="fa-solid fa-video"></i>
                    <i class="fa-solid fa-magnifying-glass"></i>
                    <i class="fa-solid fa-ellipsis"></i>
                </div>
            </div>
            @if($amigosOnline->isNotEmpty())
                @foreach($amigosOnline as $amigo)
                <div class="contact">
                    <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}">
                    <p>{{ $amigo->nome }}</p>
                </div>
                @endforeach
            @else
                <p>No friends online</p>
            @endif
        </div>
    </div>
</div>
@endsection

@section('javaScript')
<script src="{{ url('assets/js/popUpPost.js') }}"></script>
@endsection
