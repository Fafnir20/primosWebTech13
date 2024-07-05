<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <link rel="stylesheet" href="{{ url('assets/css/header.css') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
   
    @yield('estilos') <!-- Adicionar a seção de estilos -->

</head>
<body>

    <nav>
        <div class="left">
            <div class="logo">
                <img src="{{url('assets/img/SOGA.png')}}">
            </div>
            <div class="search_bar">
                <i class="fa-solid fa-magnifying-glass"></i>
                <input type="text" placeholder="Search EBook">
            </div>
        </div>
    
        <div class="center">
            <i class="fa-solid fa-house"></i>
            <i class="fa-solid fa-store"></i>
            <i class="fa-solid fa-users"></i>
        </div>

        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
        </form>
    
        <div class="right">
            <i style="color: white" class="fa-solid fa-list-ul"></i>
            <i style="color: white" class="fa-brands fa-facebook-messenger" onclick="showMessageFriends()"></i>
            <i style="color: white" class="fa-solid fa-bell"></i>
            <a href="#" style="color: red" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                <i class="fa-solid fa-sign-out"></i>
            </a>
            <img src="{{ asset('storage/' . $usuarioLogado->foto) }}">
        </div>
        
    </nav>
       
        @yield('conteudo') <!-- Garantir que o nome da seção corresponda -->
    
        @yield('javaScript')
        
<script>

function showMessageFriends() {
    var messageFriends = document.getElementById('message-friends');

    if (messageFriends.style.display == 'block') {
        messageFriends.style.display = 'none';
    } else {
        messageFriends.style.display = 'block';
    }
}

function showMessageLayout(friendId, friendName, friendPhoto) {
    var messageLayout = document.getElementById('message-layout');
    var friendPhotoElement = document.getElementById('message-friend-photo');
    var friendNameElement = document.getElementById('message-friend-name');
    var messageArea = document.getElementById('message-area');
    var currentFriendIdInput = document.getElementById('current-friend-id');

    // Definir a foto e o nome do amigo
    friendPhotoElement.src = friendPhoto;
    friendNameElement.textContent = friendName;

    // Limpar a área de mensagens
    messageArea.innerHTML = '';

    // Definir o ID do amigo atual
    currentFriendIdInput.value = friendId;

    // Carregar mensagens do servidor usando AJAX
    fetch(`/messages/${friendId}`)
        .then(response => response.json())
        .then(messages => {
            messages.forEach(message => {
                messageArea.innerHTML += `<p>${message.texto}</p>`;
            });
        })
        .catch(error => console.error('Erro ao carregar mensagens:', error));

    messageLayout.style.display = 'block';
}

function sendMessage() {
    var currentFriendId = document.getElementById('current-friend-id').value;
    var texto = document.getElementById('message-input').value;

    fetch('/enviar-mensagem', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': document.querySelector('meta[name="csrf-token"]').getAttribute('content')
        },
        body: JSON.stringify({
            destinatario_id: currentFriendId,
            texto: texto
        })
    })
    .then(response => response.json())
    .then(data => {
        if (data) {
            // Atualizar a interface com a nova mensagem
            var messageArea = document.getElementById('message-area');
            var newMessage = document.createElement('p');
            newMessage.textContent = data.texto;
            messageArea.appendChild(newMessage);
            document.getElementById('message-input').value = '';
        } else {
            console.error('Erro ao enviar mensagem:', data);
        }
    })
    .catch(error => {
        console.error('Erro ao enviar mensagem:', error);
    });
}

</script>

</body>
</html>
