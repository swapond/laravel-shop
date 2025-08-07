@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Products</h2>
        <a href="{{ route('products.create') }}" class="btn btn-primary mb-3">Add Product</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead>
            <tr>
                <th>Image</th><th>Name</th><th>Price</th><th>Stock</th><th>Category</th><th>Actions</th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $product)
                <tr>
                    <td>
                        @if($product->image)
                            <img src="{{ asset('storage/'.$product->image) }}" width="50">
                        @endif
                    </td>
                    <td>{{ $product->name }}</td>
                    <td>{{ number_format($product->price, 2) }}</td>
                    <td>{{ $product->stock }}</td>
                    <td>{{ $product->category->name ?? 'N/A' }}</td>
                    <td>
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('products.destroy', $product) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No products found.</td></tr>
            @endforelse
            </tbody>
        </table>

        {{ $products->links() }}
    </div>
@endsection
