@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.messages')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Your room</h4>
                        <input type="text" name="chat-message" class="form-control" id="chat-message">
                        <button class="btn btn-primary" id="chat-send">Send</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        var socket = io('http://localhost:3000/room');
        var room =  '{{ $slug }}';

        socket.on('connect', function () {
            socket.emit('join-room', room);
        });

        $('#chat-send').click(function () {
            socket.emit('chat-message', {'room': room, 'message': $('#chat-message').val() });
        });

        socket.on('message', function (data) {
            console.log('Message ' + data);
        })
    </script>
@endsection
