@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                @if($product->image)
                    <img src="{{ asset('storage/' . $product->image) }}" class="img-fluid" alt="{{ $product->name }}">
                @endif
            </div>
            <div class="col-md-6">
                <h2>{{ $product->name }}</h2>
                <p><strong>Category:</strong> {{ $product->category->name ?? 'N/A' }}</p>
                <p>{{ $product->description }}</p>
                <p><strong>Price:</strong> ${{ number_format($product->price, 2) }}</p>
                <p><strong>Stock:</strong> {{ $product->stock }}</p>

                @auth
                    <form action="{{route('cart.add', $product->id)}}" method="POST">
                        @csrf
                        <button class="btn btn-success" {{ $product->stock == 0 ? 'disabled' : '' }}>
                            {{ $product->stock == 0 ? 'Out of Stock' : 'Add to Cart' }}
                        </button>
                    </form>
                @else
                    <p><a href="{{ route('login') }}">Login</a> to add to cart</p>
                @endauth
            </div>
        </div>
    </div>
@endsection
