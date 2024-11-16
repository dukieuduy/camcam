@extends('admin.app')

@section('content')
<div class="container mt-5">
    <h2>{{ isset($category) ? 'Edit Category' : 'Create Category' }}</h2>
    <form action="{{ isset($category) ? route('categories.update', $category->id) : route('categories.store') }}" method="POST">
        @csrf
        @if(isset($category))
            @method('PUT')
        @endif

        <div class="mb-3">
            <label for="category_name" class="form-label">Category Name</label>
            <input type="text" class="form-control" name="category_name" value="{{ old('category_name', $category->category_name ?? '') }}" required>
        </div>

        <div class="mb-3">
            <label for="description" class="form-label">Description</label>
            <textarea class="form-control" name="description">{{ old('description', $category->description ?? '') }}</textarea>
        </div>

        <div class="mb-3">
            <label for="image_url" class="form-label">Image URL</label>
            <input type="text" class="form-control" name="image_url" value="{{ old('image_url', $category->image_url ?? '') }}">
        </div>

        <div class="mb-3">
            <label for="parent_id" class="form-label">Parent Category</label>
            <select class="form-select" name="parent_id">
                <option value="">No Parent</option>
                @foreach($categories as $cat)
                    <option value="{{ $cat->id }}" {{ isset($category) && $category->parent_id == $cat->id ? 'selected' : '' }}>
                        {{ $cat->category_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-success">{{ isset($category) ? 'Update Category' : 'Create Category' }}</button>
        <a href="{{ route('categories.index') }}" class="btn btn-secondary">Back to Categories</a>
    </form>
</div>
@endsection
