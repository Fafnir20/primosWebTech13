<link rel="stylesheet" href="{{ url('assets/css/friendsRequest.css') }}">

<div class="closedFriendsRequest">
    @foreach($pedidosPendentes as $pedido)
        <div class="cardRequest">
            <img src="{{ asset($pedido->usuario1->foto ? 'storage/' . $pedido->usuario1->foto : 'assets/img/default.png') }}" alt="Foto de {{ $pedido->usuario1->nome }}">
            <div class="tags">
                <div class="tag">{{ $pedido->usuario1->nome }}</div>
                <div class="title">
                    <input type="submit" class="btnAcceptFriend" value="Aceitar Amigo" data-usuario-id="{{ $pedido->usuario1_id }}">
                </div>
            </div>
        </div>
    @endforeach
</div>

<script>
    $(document).ready(function() {
        $('.btnAcceptFriend').click(function() {
            var usuario2_id = $(this).data('usuario-id');

            $.ajax({
                url: '{{ route('amizade.aceitar') }}',
                method: 'POST',
                data: {
                    _token: '{{ csrf_token() }}',
                    usuario2_id: usuario2_id
                },
                success: function(response) {
                    alert(response.message);
                    location.reload();
                },
                error: function(response) {
                    alert(response.responseJSON.message);
                }
            });
        });
    });
</script>
