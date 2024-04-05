@extends('master')

@section('title')
    Products
@endsection

@section('content')
    <h2>
        <a href="{{ route('products.create') }}" class="btn btn-success">Create</a>
    </h2>
    <table class="table table-bordered table-striped table-hover ">
        <thead>
            <tr>
                <th>ID</th>
                <th>CATEGORY</th>
                <th>Name</th>
                <th>SKU</th>
                <th>IMAGE</th>
                <th>PRICE</th>
                <th>ACTION</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->category->name }}</td>
                    <td>{{ $item->name }}</td>
                    <td>{{ $item->sku }}</td>
                    <td>
                        <img src="{{ asset($item->image) }}" style="width: 50px" alt="">
                    </td>

                    <td>{{ $item->price }}</td>
                    <td>
                        <div class="from-group mt-1 mb-1">
                        <a href="{{ route('products.show', $item->id ?? '') }}" class="btn btn-info">Detail</a>
                        <a href="{{ route('products.edit', $item->id ?? '') }}" class="btn btn-warning">Update</a>

                        <form action="{{ route('products.destroy', $item->id) }}" method="POST">
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
