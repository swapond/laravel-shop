@extends('layouts.app')

@section('content')
    <div class="container">
        <a href="{{ route('products.index') }}" class="btn btn-primary mb-3">Products</a>
        <a href="{{ route('categories.index') }}" class="btn btn-primary mb-3">Categories</a>
    </div>
@endsection
