@extends('managements.layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2 style="color: darkred">Managements</h2>
            </div>
            <div class="pull-right">
                <a href="{{ route('managements.create') }}" class="btn btn-outline-success"> Create New Product</a>
            </div>

        </div>
    </div>
    <br>
    <form action="{{ route('search.results') }}" method="get" class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="text" class="form-control" name="search" placeholder="Search">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Search</button>
    </form>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif

    <table class="table table-hover table-dark">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Details</th>
            <th>Email</th>
            <th>Created_by</th>
            <th>Status</th>
            <th>Description</th>
            <th style="width: 200px">Action</th>
        </tr>
        @foreach ($managements as $management)
            <tr>
                <td>{{ ++$i }}</td>
                <td>{{ $management->name }}</td>
                <td>{{ $management->detail }}</td>
                <td>{{ $management->email }}</td>
                <td>{{ $management->created_by }}</td>
                <td>{{ $management->status }}</td>
                <td>{{ $management->description }}</td>
                <td>
                    <form action="{{ route('managements.destroy',$management->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <a href="{{ route('managements.show',$management->id) }}" class="btn btn-outline-warning">Show</a> <br>
                        <a href="{{ route('managements.edit',$management->id) }}" class="btn btn-outline-primary">Edit</a> <br>
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

    {!! $managements->links() !!}

    <div class="pull-right">
        <a href="{{ route('products.index') }}" class="btn btn-outline-danger">Programing</a>
    </div>

    <div class="pull-right">
        <a href="{{ route('welcome') }}" class="btn btn-outline-secondary"> Back</a>
    </div>
@endsection
