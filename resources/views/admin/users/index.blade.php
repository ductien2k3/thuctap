@extends('master')

@section('title')
    List User
@endsection

@section('content')
<h2>
    <a href="{{ route('users.create') }}" class="btn btn-success">Create</a>
</h2>
<table class="table table-bordered table-striped table-hover ">
    <thead>
        <tr>
            <th>ID</th>
            <th>USERNAME</th>
            <th>EMAIL</th>
            <th>PASSWORD</th>
            <th>IMAGE</th>
            <th>ROLE</th>
            <th>ACTION</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($data as $item)
            <tr>
                <td>{{ $item->id }}</td>
                <td>{{ $item->user_name }}</td>
                <td>{{ $item->email }}</td>
                <td>
                    @if(strlen($item->password) > 20)
                        {{ substr($item->password, 0, 20) }}...
                    @else
                        {{ $item->password }}
                    @endif
                </td>
                

                
                <td>
                    <img src="{{ asset($item->image) }}" style="width: 50px" alt="">
                </td>

                <td>{{ $item->role }}</td>
                <td>
                    <div class="from-group mt-2 mb-1">
                    <a href="{{ route('users.show', $item->id ?? '') }}" class="btn btn-info">Detail</a>
                    <a href="{{ route('users.edit', $item->id ?? '') }}" class="btn btn-warning">Update</a>

                    <form action="{{ route('users.destroy', $item->id) }}" method="POST">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger" onclick="return confirm('Are you sure?')">Delete</button>
                    </form>
                    
                    </div>
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
{{ $data->links() }}
@endsection