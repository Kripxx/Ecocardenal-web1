
<div id="chatPopup" class="chat-popup">
    <button class="chat-btn" onclick="toggleChat()">💬</button>
    <div class="chat-box">
        <h4>Déjanos tu reseña</h4>
        <textarea id="comment" placeholder="Escribe aquí..."></textarea>
        <button onclick="sendComment()">Enviar</button>
        <p id="responseMsg"></p>
    </div>
</div>

<style>
    .chat-popup {
        position: fixed;
        bottom: 20px;
        right: 20px;
    }
    .chat-box {
        display: none;
        width: 250px;
        padding: 10px;
        background: white;
        box-shadow: 0 0 10px rgba(0,0,0,0.1);
    }
    .chat-box textarea {
        width: 100%;
        height: 60px;
        margin-bottom: 10px;
    }
</style>

<script>
    function toggleChat() {
        document.querySelector('.chat-box').style.display = 
            document.querySelector('.chat-box').style.display === 'block' ? 'none' : 'block';
    }

    function sendComment() {
    let comment = document.getElementById('comment').value;

    if (!comment.trim()) {
        alert("Por favor, escribe un comentario.");
        return;
    }

    // Obtener el token CSRF
    const csrfToken = document.querySelector('meta[name="csrf-token"]').getAttribute('content');

    fetch('/sentiment-analysis', {
        method: 'POST',
        headers: { 
            'Content-Type': 'application/json',
            'X-CSRF-TOKEN': csrfToken,
            'X-Requested-With': 'XMLHttpRequest',
            'Accept': 'application/json'
        },
        body: JSON.stringify({ comment: comment })
    })
    .then(response => {
        console.log('Respuesta raw:', response);
        if (!response.ok) {
            return response.json().then(errorData => {
                throw new Error(errorData.message || 'Error desconocido');
            });
        }
        return response.json();
    })
    .then(data => {
        console.log('Datos recibidos:', data);
        document.getElementById('responseMsg').textContent = `Sentimiento: ${data.sentiment}`;
    })
    .catch(error => {
        console.error('Error completo:', error);
        document.getElementById('responseMsg').textContent = `Error: ${error.message}`;
    });


}

</script>
