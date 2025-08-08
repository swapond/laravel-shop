@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>All Categories</h2>
        <a href="{{ route('categories.create') }}" class="btn btn-primary mb-3">Add Category</a>

        @if(session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <tbody>
            @forelse($categories as $category)
                <tr>
                    <td>{{ $category->name }}</td>
                    <td>
                        <a href="{{ route('categories.edit', $category) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('categories.destroy', $category) }}" method="POST" class="d-inline"
                              onsubmit="return confirm('Delete this product?')">
                            @csrf @method('DELETE')
                            <button class="btn btn-sm btn-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            @empty
                <tr><td colspan="6">No categories found.</td></tr>
            @endforelse
            </tbody>
        </table>

        {{ $categories->links() }}
    </div>
@endsection
