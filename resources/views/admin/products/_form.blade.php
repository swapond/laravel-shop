<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $product->name ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Price</label>
    <input type="number" step="0.01" name="price" value="{{ old('price', $product->price ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Stock</label>
    <input type="number" name="stock" value="{{ old('stock', $product->stock ?? '') }}" class="form-control" required>
</div>

<div class="mb-3">
    <label>Category</label>
    <select name="category_id" class="form-control" required>
        <option value="">-- Select --</option>
        @foreach($categories as $category)
            <option value="{{ $category->id }}" {{ old('category_id', $product->category_id ?? '') == $category->id ? 'selected' : '' }}>
                {{ $category->name }}
            </option>
        @endforeach
    </select>
</div>

<div class="mb-3">
    <label>Description</label>
    <textarea name="description" class="form-control">{{ old('description', $product->description ?? '') }}</textarea>
</div>

<div class="mb-3">
    <label>Image</label>
    <input type="file" name="image" class="form-control">
    @if(isset($product) && $product->image)
        <img src="{{ asset('storage/'.$product->image) }}" width="80" class="mt-2">
    @endif
</div>

<button class="btn btn-success">{{ $button }}</button>
