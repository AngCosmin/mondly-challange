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
                                    <button id="button-join-room" class="btn btn-primary" type="button">Join</button>
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
                            <th> Players </th>
                            <th> Created by </th>
                            <th> Status </th>
                            <th> Actions </th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($rooms as $room)

                                <tr>
                                    <td>{{ $room->slug }}</td>
                                    <td>{{ $room->known_lang->name }}</td>
                                    <td>{{ $room->foreign_lang->name }}</td>
                                    <td>{{ $room->max_players }}</td>
                                    <td>{{ $room->created_by_user->name }}</td>
                                    @if($room->status == \App\Models\Enums\RoomStatus::OPEN)
                                        <td><span class="label label-success">Open</span></td>
                                    @elseif($room->status == \App\Models\Enums\RoomStatus::IN_PROGRESS)
                                        <td><span class="label label-danger">In Progress</span></td>
                                    @endif
                                    <td>
                                        <a href="{{ route('room.join', $room->slug) }}">
                                            <button class="btn btn-sm btn-primary" type="button">Join</button>
                                        </a>
                                    </td>
                                </tr>

                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create room modal -->
<div class="modal fade" id="createRoomModal" tabindex="-1" role="dialog" aria-labelledby="createRoomModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">

            {{ Form::open(['route' => 'room.create', 'method' => 'POST']) }}

            <div class="modal-header">
                <h5 class="modal-title" id="createRoomModalLabel">Create room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">

                    <div class="form-group">
                        <label>Room name</label>
                        {{ Form::text('name', null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Known language</label>
                        {{ Form::select('known_language', $all_languages, null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Foreign language</label>
                        {{ Form::select('foreign_language', $all_languages, null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Max players</label>
                        {{ Form::select('max_players', [2 => '2', 3 => '3', 4 => '4'], null, ['class' => 'form-control']) }}
                    </div>

                    <div class="form-group">
                        <label>Game Mode</label>
                        {{ Form::select('game_mode',
                        [\App\Models\Enums\GameMode::TRANSLATE_W => 'Words',
                        \App\Models\Enums\GameMode::TRANSLATE_P => 'Phrases',
                        \App\Models\Enums\GameMode::PICTURE => 'Pictures'], null, ['class' => 'form-control']) }}
                    </div>

                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                {{ Form::submit('Create', ['class' => 'btn btn-primary']) }}
            </div>

            {{ Form::close() }}

        </div>
    </div>
</div>
@endsection

@section('after-scripts')
    <script>
        $('#button-join-room').click(function () {
             let room_name = $('input[name=join-room-name]').val();

            window.location.href = '/room/' + room_name;
        });
    </script>
@endsection
