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
                <input type="text" id="search" placeholder="What's on your mind, {{ $usuarioLogado->nome }}?" onclick="openPopUp()">
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

        <!-- PopUp para criação de post -->
        <div id="postPopUp" style="display:none;">
            <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <textarea name="texto" placeholder="What's on your mind, {{ $usuarioLogado->nome }}?"></textarea>
                <input type="file" name="imagem">
                <button type="submit">Post</button>
            </form>
        </div>

        <!-- Publicações dos amigos-->
        @if($amigos)
            @foreach ($amigos as $amigo)
            <div class="friends_post">
                <div class="friend_post_top">
                    <div class="img_and_name">
                        @if($amigo->foto)
                        <img src="{{ asset('storage/' . $amigo->foto) }}" alt="{{ $amigo->nome }}" width="100">
                        @endif
                        <div class="friends_name">
                            <p class="friends_name">{{ $amigo->nome }}</p>
                            <p class="time">{{ $amigo->created_at->diffForHumans() }}<i class="fa-solid fa-user-group"></i></p>
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
                        <input type="submit" value="comment" id="btnComment">
                    </div>
                </div>
            </div>
            @endforeach
        @endif

        <!-- Exibir publicações -->
        @if($posts)
            @foreach ($posts as $post)
            <div class="friends_post">
                <div class="friend_post_top">
                    <div class="img_and_name">
                        <img src="{{ asset('storage/' . $post->usuario->foto) }}" alt="{{ $post->usuario->nome }}" width="50" style="border-radius: 50%;">
                        <div class="friends_name">
                            <p class="friends_name">{{ $post->usuario->nome }}</p>
                            <p class="time">{{ $post->created_at->diffForHumans() }}<i class="fa-solid fa-user-group"></i></p>
                        </div>
                    </div>
                    <div class="menu">
                        <i class="fa-solid fa-ellipsis"></i>
                    </div>
                </div>
                @if($post->imagem)
                <img src="{{ asset('storage/' . $post->imagem) }}" alt="Post image" width="100%">
                @endif
                <div class="post_content">
                    <p class="description-post">{{ $post->texto }}</p>
                </div>
                <div class="info">
                    <div class="emoji_img">
                        <img src="{{ url('assets/img/like.png') }}">
                        <img src="{{ url('assets/img/haha.png') }}">
                        <img src="{{ url('assets/img/heart.png') }}">
                        <p>You, Disanayaka and 25K others</p>
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
                        <i class="fa-solid fa-message" onclick="toggleComments({{ $post->id }})"></i>
                        <p>Comments</p>
                    </div>
                    <div class="like_icon">
                        <i class="fa-solid fa-share"></i>
                        <p>Share</p>
                    </div>
                </div>
                <hr>
                <div id="comments-{{ $post->id }}" class="comment_section" style="display: none;">
                    <!-- Formulário para adicionar um novo comentário -->
                    <div class="comment_warpper">
                        <img src="{{ asset('storage/' . $usuarioLogado->foto) }}" alt="{{ $usuarioLogado->nome }}" width="50" style="border-radius: 50%;">
                        <div class="circle"></div>
                        <form action="{{ route('comments.store') }}" method="POST" id="formAdicionarComment">
                            @csrf
                            <div class="comment_search">
                                <input type="hidden" name="posts_id" value="{{ $post->id }}">
                                <input type="text" name="texto" id="inputComment" placeholder="Write a comment" required>
                                <input type="submit" value="Comment" id="btnComment">
                            </div>
                        </form>
                    </div>
                    <!-- Exibição dos comentários existentes -->
                    @if($post->comments)
                        @foreach ($post->comments as $comment)
                        <div class="comment_warpper">
                            <img src="{{ asset('storage/' . $comment->usuario->foto) }}" alt="{{ $comment->usuario->nome }}" width="50" style="border-radius: 50%;">
                            <div class="comment_content">
                                <p><strong>{{ $comment->usuario->nome }}</strong> {{ $comment->texto }}</p>
                            </div>
                        </div>
                        @endforeach
                    @endif
                </div>
                
            </div>
            @endforeach
        @endif
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
<script>
    function openPopUp() {
        document.getElementById('popup').style.display = 'block';
    }

    function closePopUp() {
        document.getElementById('popup').style.display = 'none';
    }

    function toggleComments(postId) {
        var element = document.getElementById('comments-' + postId);
        if (element.style.display === "none") {
            element.style.display = "block";
        } else {
            element.style.display = "none";
        }
    }
</script>
@endsection
