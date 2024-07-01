
    function reactToPost(postId, reactionType) {
        fetch(`/post/${postId}/react`, {
            method: 'POST',
            headers: {
                'Content-Type': 'application/json',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            },
            body: JSON.stringify({ type: reactionType })
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Atualizar a contagem de reações ou fazer outra ação desejada
                location.reload(); // Por simplicidade, recarregar a página
            } else {
                alert(data.error || 'Erro ao adicionar reação.');
            }
        })
        .catch(error => console.error('Erro:', error));
    }

