var io = require('socket.io')(3000);
var axios = require("axios");

io.on('connection', function (socket) {
	socket.on('msg', function (data) {
	    console.log(data);
    });
});

var clients = {};
var roomsArray = {};
var roomsQuestions = {};
var inProgressRooms = [];
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

    socket.on('start-round', function (data) {
        let room = socket.room;
        let timestamp = Math.round((new Date()).getTime() / 1000);
        let gamemode = data.gamemode;
        let main_language = data.main_language;
        let foreign_language = data.foreign_language;

        inProgressRooms.push({ question_number: 1, room: room });

        console.log(inProgressRooms);

        // const url = "http://mondly.challenge.local:8080/get-question?game_mode=" + gamemode + "&main_language=" + main_language + "&foreign_language=" +foreign_language;


        const url = "http://mondly-challange.local/get-question?game_mode=" + gamemode + "&main_language=" + main_language + "&foreign_language=" +foreign_language;

        // Generate 5 questions
        roomsQuestions[room] = [];
        for (let i = 0; i < 5; i++) {
            axios.get(url).then(response => {
                let result = response.data;
                let object = { 'question': result.question, 'word': result.word, 'options': result.options, 'started_at': 0 }

                roomsQuestions[room].push(object);

                // Send first question to room
                if (i == 0) {
                    let current_timestamp = Math.round((new Date()).getTime() / 1000);
                    roomsQuestions[room][0].started_at = current_timestamp;
                    rooms.in(room).emit('new-question', roomsQuestions[room][0]);
                }
            })
            .catch(error => {
                console.log(error);
            });
        }

        rooms.in(room).emit('start-round');
    });

    socket.on('chat-message', function (data) {
        rooms.in(data.room).emit('message', data.message);
        console.log('Mesajul ' + data.message);
    })
});

setInterval(function() {
    let current_timestamp = Math.round((new Date()).getTime() / 1000);

    // Foreach room in progress
    inProgressRooms.forEach(function (element) {
        let room = element.room;

        if (roomsQuestions[room].length > 0) {
            let started_at = roomsQuestions[room][0].started_at;
            let passed_time = current_timestamp - started_at;

            if (passed_time > 11) {
                // Remove it from the list
                roomsQuestions[room].splice(0, 1)

                // Check if there are questions left for this room
                if (roomsQuestions[room].length > 0) {
                    roomsQuestions[room][0].started_at = current_timestamp;

                    // Send question
                    rooms.in(room).emit('new-question', roomsQuestions[room][0]);
                }
                else {
                    for (let i = 0; i < inProgressRooms.length; i++) {
                        if (inProgressRooms[i].room == room) {
                            inProgressRooms.splice(i, 1);
                        }
                    }

                    rooms.in(room).emit('game-finished');
                }
            }
            else {
                let time_left = 11 - passed_time;
                rooms.in(room).emit('update-time-left', { timeleft: time_left });
            }
        }
    });
}, 1000);
