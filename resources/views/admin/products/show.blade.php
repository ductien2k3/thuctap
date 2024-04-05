@extends('master')

@section('title', 'Product Detail: ' . $product->name)

@section('content')
    <table class="table table-bordered table-striped table-hover">
        <thead>
            <tr>
                <th>FIELD</th>
                <th>VALUE</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($product->toArray() as $field => $value)
                <tr>
                    <td>{{ ucfirst($field) }}</td>
                    <td>
                        @if ($field == 'image')
                            <img src="{{ asset($value) }}" style="width: 50px" alt="">
                        @elseif($field == 'category_id')
                        {{$product->category->name}}
                        @else
                            {{ $value }}
                        @endif
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <a href="{{ route('products.index') }}" class="btn btn-primary">Back</a>
@endsection
