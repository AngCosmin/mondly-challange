@extends('layouts.app')

@section('content')
<div class="container">
    @include('partials.messages')

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Leaderboard</h4>
                    <table data-toggle="table" data-height="280" data-mobile-responsive="true" data-sort-order="desc" class="table">
                        <thead>
                        <tr>
                            <th> Name </th>
                            <th> Points </th>
                            <th></th>
                        </tr>
                        </thead>
                        <tbody>

                            @foreach ($users as $user)

                                <tr>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->total_points }}</td>
                                    <td>
                                        <a href="#">
                                            <button class="btn btn-sm btn-primary pull-right" type="button">View Profile</button>
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
@endsection

@section('after-scripts')
@endsection
