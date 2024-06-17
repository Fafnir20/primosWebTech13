<link rel="stylesheet" href="{{ url('assets/css/PopUp_Post.css') }}">

<div id="popup" class="popup-overlay hidden" style="display: none">
    <div class="allPopUp">
        <div class="wrapper">
            <section class="post">
                <header>Criar Post</header>
                <form action="#">
                    <div class="conteudo">
                        <img src="{{ url('assets/img/inacioRir.jpeg') }}" alt="logo" style="border-radius: 50%">
                        <div class="details">
                            <p>Jose Inacio</p>
                            <div class="privacy">
                                <i class="fas fa-user-friends"></i>
                                <span>Friends</span>
                                <i class="fas fa-caret-down"></i>
                            </div>
                        </div>
                    </div>
                    <textarea placeholder="What's on your mind, CodingNepal?" spellcheck="false" required></textarea>
                    <div class="theme-emoji"></div>
                    <div class="options">
                        <p>Respeite as regras da comunindade!</p>
                    </div>
                    <button type="submit">Post</button>
                </form>
            </section>
        </div>
    </div>
</div>