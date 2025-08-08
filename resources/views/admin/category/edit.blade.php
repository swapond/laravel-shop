@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Category</h2>
        <form action="{{ route('categories.update', $category) }}" method="POST" enctype="multipart/form-data">
            @csrf @method('PUT')
            @include('admin.category._form', ['button' => 'Update'])
        </form>
    </div>
@endsection
