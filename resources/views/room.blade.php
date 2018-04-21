@extends('layouts.app')

@section('content')
    <div class="container">
        @include('partials.messages')

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <div class="row m-b-30">
                            <div class="col-md-2 m-b-10">
                                <button type="button" class="btn btn-primary btn-block" data-toggle="modal" data-target="#createRoomModal">
                                    Create
                                </button>
                            </div>
                            <div class="col-md-10">
                                <div class="input-group">
                                    <input type="text" name="join-room-name" placeholder="Room name" class="form-control">
                                    <span class="input-group-btn">
                                    <button class="btn btn-primary" type="button">Join</button>
                                </span>
                                </div>
                            </div>
                        </div>


                        <h4 class="card-title">Rooms</h4>
                        <table data-toggle="table" data-height="280" data-mobile-responsive="true" data-sort-order="desc" class="table">
                            <thead>
                            <tr>
                                <th> Name </th>
                                <th> Known language </th>
                                <th> Foreign language </th>
                                <th> Max Players </th>
                                <th> Created by </th>
                                <th> Actions </th>
                            </tr>
                            </thead>
                            <tbody>

                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('after-scripts')
    <script>
        var socket = io('http://localhost:3000/room');

        socket.on('connect', function () {
            socket.emit('room', 'asdsa-171')
        });

        socket.on('message', function (data) {
            console.log('Message ' + data);
        })
    </script>
@endsection
