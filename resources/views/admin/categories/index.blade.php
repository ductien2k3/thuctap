@extends('master')

@section('title')
    Categories
@endsection

@section('content')
<h2>
    <a href="{{ route('admin.categories.create') }}" class="btn btn-success">Create</a>
</h2>
    <table class="table table-bordered table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>IMAGE</th>
                <th>ACTION</th>
            </tr>
        </thead>

        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->name }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" style="width: 50px" alt="">
                    </td>
                    <td>
                     
                        <a href="{{ route('admin.categories.show', $item->id ?? '') }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('admin.categories.edit', $item->id ?? '') }}" class="btn btn-warning">Update</a>
                        <form action="{{ route('admin.categories.destroy', $item->id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger mt-1" onclick="return confirm('Are you sure?')">Delete</button>
                        </form>
            
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $data->links() }}
@endsection
