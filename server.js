var io = require('socket.io')(3000);

io.on('connection', function (socket) {
	socket.on('msg', function (data) {
	    console.log(data);
    });
});

var clients = {};
var roomsArray = {};
var rooms = io.of('/room');

rooms.on('connection', function (socket){
    socket.on('join-room', function (data) {
        let room = data.room;
        let userid = data.userid;
        let username = data.username;

        socket.user_id = userid;
        socket.username = username;
        socket.room = room;

        clients[socket.id] = socket;

        if (!(room in roomsArray)) {
            roomsArray[room] = [];
        }

        roomsArray[room].push({ 'user_id': userid, 'username': username });

        socket.join(room);
        rooms.in(room).emit('update-joined-users', roomsArray[room]);

        console.log(socket.username + ' connected to room ' + socket.room);
    });

    socket.on('disconnect', function () {
        console.log(socket.username + ' disconnected from room ' + socket.room);

        let arraySize = roomsArray[socket.room].length;

        for (let i = 0; i < arraySize; i++) {
            if (roomsArray[socket.room][i] && roomsArray[socket.room][i].user_id === socket.user_id) {
                roomsArray[socket.room].splice(i, 1);
            }
        }

        rooms.in(socket.room).emit('update-joined-users', roomsArray[socket.room]);
    });

    socket.on('chat-message', function (data) {
        rooms.in(data.room).emit('message', data.message);
        console.log('Mesajul ' + data.message);
    })
});
