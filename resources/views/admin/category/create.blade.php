@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Add Product</h2>
        <form action="{{ route('categories.store') }}" method="POST">
            @csrf
            @include('admin.category._form', ['button' => 'Create'])
        </form>
    </div>
@endsection
