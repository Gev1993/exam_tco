@extends('managements.layout')


@section('content')


    <div class="row">
        <h3>Search Results</h3>
    </div>

    @if(!$search->count())
            <p>Search error</p>

        @else

        
    @foreach($search as $searc)
    <table class="table table-hover table-dark">
        <tr>
            <th>Name</th>
            <th>Details</th>
            <th>Email</th>
            <th>Created_by</th>
            <th>Status</th>
            <th>Description</th>
        </tr>
        <tr>
            <td>{{ $searc->name }}</td>
            <td>{{ $searc->detail }}</td>
            <td>{{ $searc->email }}</td>
            <td>{{ $searc->created_by }}</td>
            <td>{{ $searc->status }}</td>
            <td>{{ $searc->description }}</td>
        </tr>
         </table>
    @endforeach

       

    @endif

    <div class="pull-right">
        <a href="{{ route('managements.index') }}" class="btn btn-outline-info"> Back</a>
    </div>
@endsection
