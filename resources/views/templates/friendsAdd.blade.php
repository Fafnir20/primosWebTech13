<link rel="stylesheet" href="{{ url('assets/css/closedFriends.css') }}">

<div class="closedFriends">
    @foreach($usuarios as $usuario)
        <div class="card">
            <img src="{{ asset($usuario->foto ? 'storage/' . $usuario->foto : 'assets/img/default-avatar.png') }}" alt="Foto de {{ $usuario->nome }}">
            <div class="tags">
                <div class="tag">{{ $usuario->nome }}</div>
            </div>
            <div class="content">
                <div class="title">
                    <input type="submit" class="btnAddFriend" value="Adicionar Amigo" data-usuario-id="{{ $usuario->id }}">
                </div>
            </div>
        </div>
    @endforeach
</div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        $('.btnAddFriend').click(function() {
            var usuario2_id = $(this).data('usuario-id');

            $.ajax({
                url: '{{ route('amizade.adicionar') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    usuario2_id: usuario2_id
                },
                success: function(response) {
                    alert(response.message);
                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            });
        });
    });
</script>
