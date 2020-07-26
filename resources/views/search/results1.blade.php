@extends('products.layout')


@section('content')

    <div class="row">
        <h3>Search Results1</h3>
    </div>

    @if(!$users->count())
        <b>Error Search</b>
    @else
        <table class="table table-hover table-dark">
    @foreach($users as $user)
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th>email</th>
                    <th>created_by</th>
                    <th>status</th>
                    <th>description</th>
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
        <a href="{{ route('products.index') }}" class="btn btn-outline-info">Back</a>
    </div>
@endsection
