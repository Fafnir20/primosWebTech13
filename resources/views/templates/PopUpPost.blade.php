<link rel="stylesheet" href="{{ url('assets/css/PopUp_Post.css') }}">

<div id="popup" class="popup-overlay hidden" style="display: none">
    <div class="allPopUp">
        <div class="wrapper">
            <section class="post">
                <header>Criar Post</header>
                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="conteudo">
                        <img src="{{ asset('storage/' . $usuarioLogado->foto) }}" alt="logo" style="border-radius: 50%">
                        <div class="details">
                            <p> {{$usuarioLogado->nome}} </p>
                            <div class="privacy">
                                <i class="fas fa-user-friends"></i>
                                <span>Friends</span>
                                <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    <textarea placeholder="What's on your mind?" name="texto" spellcheck="false" required></textarea>
                    <div class="theme-emoji"></div>
                    <div class="options">
                        <input type="file" name="imagem" id="foto">
                       
                    </div>
                    <button type="submit">Postar</button>
                </form>
            </section>
        </div>
    </div>
</div>