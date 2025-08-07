@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Product</h2>
        <form action="{{ route('products.update', $product) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.products._form', ['button' => 'Update'])
        </form>
    </div>
@endsection
