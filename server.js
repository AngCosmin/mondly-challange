var io = require('socket.io')(3000);

io.on('connection', function (socket) {
	socket.on('msg', function (data) {
	    console.log(data);
    });

	socket.on('disconnect', function () {
	    console.log('Disconnect');
	});
});


var rooms = io.of('/room');

rooms.on('connection', function (socket){
    socket.on('join-room', function (room) {
        console.log('Cineva incearca sa intre pe ' + room);
        socket.join(room);
    });

    socket.on('chat-message', function (data) {
        rooms.in(data.room).emit('message', data.message);
        console.log('Mesajul ' + data.message);
    })
});

