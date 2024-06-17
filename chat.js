const ws = new WebSocket('ws://localhost:8080');

ws.onopen = () => {
    console.log('Connected to server');
};

ws.onmessage = (event) => {
    const data = JSON.parse(event.data);
    const chatBox = document.getElementById('chat-box');
    chatBox.innerHTML += `<p><strong>${data.username}:</strong> ${data.message}</p>`;
};

document.getElementById('send').addEventListener('click', () => {
    const message = document.getElementById('message').value;
    ws.send(JSON.stringify({ user_id: userId, username: username, message: message }));
    document.getElementById('message').value = '';
});
