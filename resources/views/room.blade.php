@extends('layouts.app')

@section('after-styles')
    <link href="{{ asset('theme/horizontal/css/pages/chat-app-page.css') }}" rel="stylesheet">
@endsection

@section('content')
    <div class="container">
        @include('partials.messages')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="question"></div>

                        <h3 class="m-b-20">
                            <small id="time-left-all" class="pull-right">Time left <span id="time-left">#</span></small>
                        </h3>

                        <br>
                        <form id="answer-form"></form>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                @if(Auth::id() == $room->created_by)
                                    <button class="btn btn-primary btn-block m-b-20" id="start-round">
                                        Start
                                    </button>
                                @endif

                                <div class="table-responsive">
                                    <table class="table color-bordered-table info-bordered-table" style="height: 100%">
                                        <thead>
                                        <tr>
                                            <th>In this room</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr id="connected-users">
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="chat-right-aside">
                                    <div class="card-body">
                                        <div class="row">
                                            <div class="col-8">
                                                <textarea placeholder="Type your message here" class="form-control b-0"
                                                          id="chat-message"></textarea>
                                            </div>
                                            <div class="col-4 text-right">
                                                <button type="button" class="btn btn-primary btn-lg" id="chat-send">
                                                    <i class="fa fa-paper-plane-o"></i>
                                                </button>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="chat-rbox">
                                        <ul class="chat-list">
                                            <li>
                                                <div class="chat-content"></div>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script src="{{ asset('theme/horizontal/js/chat.js') }}"></script>
    <script>
        var gamemode = '{{ $room->game_mode }}';
        var main_language = '{{ $room->known_lang->short_code }}';
        var foreign_language = '{{ $room->foreign_lang->short_code }}';

        $('#time-left-all').hide();

        $('#start-round').click(function () {
            $.ajax({
                url: '{{ route('room.start', $room->slug) }}',
                type: 'GET',
                error: function () {
                    console.log('error')
                },
                success: function (data) {
                    $('#start-round').hide();

                    socket.emit('start-round', {
                        'gamemode': gamemode,
                        'main_language': main_language,
                        'foreign_language': foreign_language
                    });
                }
            });
        });

        var socket = io('http://localhost:3000/room');
        var room = '{{ $room->slug }}';
        var userid = '{{ Auth::id() }}';
        var username = '{{ Auth::user()->name }}';

        socket.on('connect', function () {
            socket.emit('join-room', {'room': room, 'userid': userid, 'username': username});
        });

        $('#chat-send').click(function () {
            if ($('#chat-message').val() != '') {
                socket.emit('chat-message', {'room': room, 'username': username, 'message': $('#chat-message').val()});
                $('#chat-message').val('');
            }
        });

        socket.on('message', function (data) {
            $('.chat-content').prepend(`
                <h5>${data.username}</h5>
                <div class="box bg-light-info">${data.message}</div>
            `);
        });

        socket.on('update-time-left', function (data) {
            $('#time-left').html(data.timeleft);
        });

        socket.on('game-finished', function (data) {
            $('#start-round').show();
            $('.question').html('');
            $('#answer-form').html('');
            $('#time-left-all').hide();
        });

        socket.on('evaluate', function (data) {
           if (data.correct === 'true') {
               $('.question').append('<div class="text-success">Correct</div>');

               $.ajax({
                   url: '{{ route('quiz.points') }}',
                   type: 'GET',
                   data: {
                       user_id: '{{ Auth::id() }}'
                   }
               });
           }
           else {
               $('.question').append('<div class="text-danger">Incorrect</div>');
           }
        });

        socket.on('new-question', function (data) {
            $('#time-left-all').show();
            $('.question').html('');
            $('#answer-form').html('');


            $('.question').append('<h3>' + data.question + '</h3>');
            $('.question').append('<h2>' + data.word + '</h2>');

            if (gamemode == '{{ \App\Models\Enums\GameMode::TRANSLATE_W }}') {
                data.options.forEach(function (element) {
                    $('#answer-form').append(`
                        <input type="radio" class="with-gap radio-col-light-blue" name="answer" value="${element}" id="${element}">
                        <label for="${element}">${element}</label>`
                    );
                });

                $('#answer-form').append('<br><button class="btn btn-primary" id="send-answer">Send Answer</button>');

                $('#send-answer').click(function (e) {
                    e.preventDefault();
                    let answer = $('input[name=answer]:checked').val();

                    socket.emit('answer',  {'answer': answer});
                })
            }
        });

        socket.on('update-joined-users', function (data) {
            $('#connected-users').html('');
            data.forEach(function (element) {
                $('#connected-users').append('<tr id="user-joined-' + element.userid + '"><td>' + element.username + '</td></tr>');
            });
        });
    </script>
@endsection
