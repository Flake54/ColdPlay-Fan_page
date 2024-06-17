const WebSocket = require('ws');
const wss = new WebSocket.Server({ port: 8080 });

wss.on('connection', function connection(ws) {
    console.log('Client connected');

    ws.on('message', function incoming(message) {
        console.log('Received message:', message);

        // Broadcast the message to all clients
        wss.clients.forEach(function each(client) {
            if (client.readyState === WebSocket.OPEN) {
                client.send(message);
            }
        });
    });

    ws.on('close', function() {
        console.log('Client disconnected');
    });

    ws.send(JSON.stringify({ username: 'Server', text: 'Welcome to the chat!' }));
});

console.log('WebSocket server running on ws://localhost:8080');
