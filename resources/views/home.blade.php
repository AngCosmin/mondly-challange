@extends('layouts.app')

@section('content')
<div class="container">
    @if (session('status'))
        <div class="alert alert-success">
            {{ session('status') }}
        </div>
    @endif

    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="form-group">
                        <input type="text" name="join-room-name" placeholder="Room name" class="form-control">
                        <div class="btn btn-success">Join</div>
                    </div>
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                        Create
                    </button>

                    <h4 class="card-title">Rooms</h4>
                    <table data-toggle="table" data-height="280" data-mobile-responsive="true" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th data-field="name" data-sortable="true"> Name </th>
                            <th data-field="stargazers_count" data-sortable="true" data-width="100"> Stars </th>
                            <th data-field="forks_count" data-sortable="true" data-width="100"> Forks </th>
                            <th data-field="description" data-sortable="true"> Description </th>
                        </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                            </tr>
                            <tr>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                                <td>asdasd</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Create room modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Create room</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="form-group">
                    
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('after-scripts')
    <script>
        var socket = io('http://localhost:3000/my-namespace');

        socket.on('connect', function () {
            socket.emit('msg', {'title': 'ceva'});
        });

        socket.on('hi', function (data) {
            console.log(data);
        })
    </script>
@endsection
