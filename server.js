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


var nsp = io.of('/my-namespace');
nsp.on('connection', function(socket){
    console.log('someone connected');

});

setInterval(function () {
    nsp.emit('hi', {'who': 'everyone!'});
}, 1000);
