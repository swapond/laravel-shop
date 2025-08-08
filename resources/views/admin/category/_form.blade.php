<div class="mb-3">
    <label>Name</label>
    <input type="text" name="name" value="{{ old('name', $category->name ?? '') }}" class="form-control" required>
</div>

<button class="btn btn-success">{{ $button }}</button>
