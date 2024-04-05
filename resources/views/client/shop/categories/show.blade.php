@extends('master')

@section('title', 'Categories Detail : ' . $shop_category->name)

@section('content')
<input type="hidden" name="shop_id" value="{{ $defaultShopId }}">
<table class="table table-bordered table-striped table-hover">
    <thead>
        <tr>
            <th>FIELD</th>
            <th>VALUE</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($shop_category->toArray() as $field => $value)
            <tr>
                <td>{{ ucfirst($field) }}</td>
                <td>
                    @if ($field == 'image')
                        <img src="{{ asset($value) }}" style="width: 50px" alt="">
                    @else
                        {{ $value }}
                    @endif
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
<a href="{{ route('categories.index') }}" class="btn btn-primary">Back</a>
@endsection
