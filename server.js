var io = require('socket.io')(3000);

io.on('connection', function (socket) {
	console.log('New connection');

	socket.on('message', function (data) {
	    console.log('New msg' + data);
	});

	socket.on('msg', function (data) {
	    console.log(data);
    })

	socket.on('disconnect', function () {
	    console.log('Disconnect');
	});
});
