var io = require('socket.io')(3000);

io.on('connection', function (socket) {
	console.log('New connection');

	socket.on('msg', function (data) {
	    console.log(data);
    });

	socket.on('disconnect', function () {
	    console.log('Disconnect');
	});
});


var room = io.of('/room');

room.on('connection', function (socket){
    socket.on('room', function (room) {
        socket.join(room);
    })
});

room.in('asdsa-171').emit('message', 'Salut!');