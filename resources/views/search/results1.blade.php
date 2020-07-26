@extends('products.layout')


@section('content')

    <div class="row">
        <h3>Search Results1</h3>
    </div>

    @if(!$search->count())
        <b>Error Search</b>
    @else
        <table class="table table-hover table-dark">
    @foreach($search as $searc)
                <tr>
                    <th>Name</th>
                    <th>Details</th>
                    <th>email</th>
                    <th>created_by</th>
                    <th>status</th>
                    <th>description</th>
                </tr>
                <tr>
                    <td>{{ $searc->name }}</td>
                    <td>{{ $searc->detail }}</td>
                    <td>{{ $searc->email }}</td>
                    <td>{{ $searc->created_by }}</td>
                    <td>{{ $searc->status }}</td>
                    <td>{{ $searc->description }}</td>
                </tr>
    @endforeach
        </table>
    @endif

    <div class="pull-right">
        <a href="{{ route('products.index') }}" class="btn btn-outline-info">Back</a>
    </div>
@endsection
