@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Product</h2>
        <form action="{{ route('products.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @include('admin.products._form', ['button' => 'Create'])
        </form>
    </div>
@endsection
