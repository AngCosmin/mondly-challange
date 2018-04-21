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
                        @if(Auth::id() == $room->created_by)
                            <button class="btn btn-primary" id="start-round">
                                Start
                            </button>
                        @endif

                        <div class="question">
                            <h3>Question <small class="pull-right">Time left <span id="time-left">#</span></small></h3>

                        </div>
                        <br>
                        <div class="answer">

                        </div>
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
                                    <div class="chat-rbox">
                                        <ul class="chat-list">
                                            <!--chat Row -->
                                            <li>
                                                <div class="chat-content">
                                                    <h5>James Anderson</h5>
                                                    <div class="box bg-light-info">Lorem Ipsum is simply dummy text of
                                                        the printing &amp; type setting industry.
                                                    </div>
                                                </div>
                                                <div class="chat-time">10:56 am</div>
                                            </li>
                                            <!--chat Row -->
                                            <li>
                                                <div class="chat-content">
                                                    <h5>Bianca Doe</h5>
                                                    <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-time">10:57 am</div>
                                            </li>
                                            <li>
                                                <div class="chat-content">
                                                    <h5>Bianca Doe</h5>
                                                    <div class="box bg-light-info">It’s Great opportunity to work.</div>
                                                </div>
                                                <div class="chat-time">10:57 am</div>
                                            </li>
                                        </ul>
                                    </div>
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

        $('#start-round').click(function () {
            $.ajax({
                url: '{{ route('room.join', $room->slug) }}',
                type: 'GET',
                error: function () {
                    console.log('error')
                },
                success: function (data) {
                    $('#start-round').hide();

                    socket.emit('start-round', { 'gamemode': gamemode, 'main_language': main_language, 'foreign_language': foreign_language });
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
            socket.emit('chat-message', {'room': room, 'message': $('#chat-message').val()});
        });

        socket.on('message', function (data) {
            console.log('Message ' + data);
        });

        socket.on('update-time-left', function (data) {
           $('#time-left').html(data.timeleft);
        });

        socket.on('finish-round', function (data) {

        });

        socket.on('new-question', function (data) {
            
        });

        socket.on('update-joined-users', function (data) {
            $('#connected-users').html('');
            data.forEach(function (element) {
                $('#connected-users').append('<tr id="user-joined-' + element.userid + '"><td>' + element.username + '</td></tr>');
            });
        });
    </script>
@endsection
