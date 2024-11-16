@extends('admin.app')

@section('content')
<!-- Add Bootstrap CSS link -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container mt-5">
    @if(session('error'))
        <div class="alert alert-danger">
            {{ session('error') }}
        </div>
    @endif

    <form method="GET" action="{{ route('categories.index') }}" class="row g-3">
        <div class="col-md-8">
            <input type="text" name="search" placeholder="Search categories" value="{{ request('search') }}" class="form-control">
        </div>
        <div class="col-md-4">
            <select name="sort_by" class="form-select">
                <option value="asc" {{ request('sort_by') == 'asc' ? 'selected' : '' }}>A-Z</option>
                <option value="desc" {{ request('sort_by') == 'desc' ? 'selected' : '' }}>Z-A</option>
            </select>
        </div>
        <div class="col-md-12">
            <button type="submit" class="btn btn-primary">Search</button>
        </div>
    </form>

    

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Name</th>
                <th>Description</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @if($categories->isEmpty())
                <tr>
                    <td colspan="3" class="text-center">No categories found.</td>
                </tr>
            @else
                @foreach($categories as $category)
                    <tr>
                        <td>
                            <!-- Hiển thị danh mục cấp 1, cấp 2, cấp 3 -->
                            @if($category->parent)
                                <span class="ms-3">--> {{ $category->category_name }}</span> <!-- Dấu mũi tên cho cấp 2 và 3 -->
                            @else
                                {{ $category->category_name }} <!-- Cấp 1 -->
                            @endif
                            
                        </td>
                        <td>{{ $category->description }}</td>
                        <td>
                            <a href="{{ route('categories.edit', $category->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            <form action="{{ route('categories.destroy', $category->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Nếu có danh mục con, hiển thị danh mục con của category này -->
                    @if($category->children && $category->children->isNotEmpty())
                        @foreach($category->children as $child)
                            <tr>
                                <!-- Indent child categories by adding "ms-4" class for larger indent -->
                                <td class="ms-4">→ {{ $child->category_name }}</td> <!-- Cấp 2 -->
                                <td>{{ $child->description }}</td>
                                <td>
                                    <a href="{{ route('categories.edit', $child->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('categories.destroy', $child->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                    </form>
                                </td>
                            </tr>

                            <!-- Hiển thị danh mục con của cấp 2 (cấp 3) -->
                            @if($child->children && $child->children->isNotEmpty())
                                @foreach($child->children as $grandchild)
                                    <tr>
                                        <!-- Indent grandchild categories even further with "ms-5" -->
                                        <td class="ms-5">→ {{ $grandchild->category_name }}</td> <!-- Cấp 3 -->
                                        <td>{{ $grandchild->description }}</td>
                                        <td>
                                            <a href="{{ route('categories.edit', $grandchild->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                            <form action="{{ route('categories.destroy', $grandchild->id) }}" method="POST" style="display:inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            @endif
                        @endforeach
                    @endif
                @endforeach
            @endif
        </tbody>
    </table>

    <!-- Pagination Links -->
    {{ $categories->links() }}
</div>

@endsection
