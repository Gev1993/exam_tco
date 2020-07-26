@extends('managements.layout')


@section('content')


    <div class="row">
        <h3>Search Results</h3>
    </div>

    @if(!$users->count())
            <p>Search error</p>

        @else

        <table class="table table-hover table-dark">
    @foreach($users as $user)
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Email</th>
            <th>Created_by</th>
            <th>Status</th>
            <th>Description</th>
        </tr>
        <tr>
            <td>{{ $user->name }}</td>
            <td>{{ $user->detail }}</td>
            <td>{{ $user->email }}</td>
            <td>{{ $user->created_by }}</td>
            <td>{{ $user->status }}</td>
            <td>{{ $user->description }}</td>
        </tr>
    @endforeach

        </table>

    @endif

    <div class="pull-right">
        <a href="{{ route('managements.index') }}" class="btn btn-outline-info"> Back</a>
    </div>
@endsection
