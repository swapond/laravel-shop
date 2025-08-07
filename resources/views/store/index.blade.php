@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Shop</h2>

        <div class="row mb-3">
            <div class="col-md-3">
                <h5>Categories</h5>
                <ul class="list-group">
                    <a href="{{ route('store.index') }}" class="list-group-item {{ request('category') ? '' : 'active' }}">All</a>
                    @foreach($categories as $category)
                        <a href="{{ route('store.index', ['category' => $category->slug]) }}"
                           class="list-group-item {{ request('category') == $category->slug ? 'active' : '' }}">
                            {{ $category->name }}
                        </a>
                    @endforeach
                </ul>
            </div>

            <div class="col-md-9">
                <div class="row">
                    @forelse($products as $product)
                        <div class="col-md-4 mb-4">
                            <div class="card h-100">
                                @if($product->image)
                                    <img src="{{ asset('storage/' . $product->image) }}" class="card-img-top"
                                         alt="{{ $product->name }}">
                                @endif
                                <div class="card-body d-flex flex-column">
                                    <h5 class="card-title">{{ $product->name }}</h5>
                                    <p class="card-text text-truncate">{{ $product->description }}</p>
                                    <p class="card-text"><strong>${{ number_format($product->price, 2) }}</strong></p>
                                    <a href="{{ route('store.show', $product->slug) }}" class="btn btn-primary mt-auto">View
                                        Details</a>
                                </div>
                            </div>
                        </div>
                    @empty
                        <p>No products found.</p>
                    @endforelse
                </div>

                {{ $products->withQueryString()->links() }}
            </div>
        </div>
    </div>
@endsection
