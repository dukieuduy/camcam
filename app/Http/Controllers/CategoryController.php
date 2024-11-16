<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index(Request $request)
    {
        $query = Category::query();

        // Tìm kiếm theo tên danh mục
        if ($request->has('search')) {
            $query->where('category_name', 'like', '%' . $request->search . '%');
        }

        // Sắp xếp theo tên
        if ($request->has('sort_by') && in_array($request->sort_by, ['asc', 'desc'])) {
            $query->orderBy('category_name', $request->sort_by);
        }

        // Phân trang kết quả
        $categories = $query->paginate(10);

        return view('admin.pages.category.index', compact('categories'));
    }

    public function create()
    {
        $categories = Category::whereNull('parent_id')->get(); // chỉ lấy danh mục cấp 1
        return view('admin.pages.category.create', compact('categories'));
    }

    public function store(Request $request)
    {
    
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
            'parent_id' => 'nullable|exists:categories,id', 
        ]);

        Category::create([
            'category_name' => $request->category_name,
            'description' => $request->description,
            'image_url' => $request->image_url,
            'parent_id' => $request->parent_id, 
        ]);

        
        return redirect()->route('categories.index')->with('success', 'Category created successfully.');
    }

    public function edit($id)
    {
        $category = Category::find($id);
        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found');
        }
        $categories = Category::all(); 
        return view('admin.pages.category.edit', compact('category', 'categories'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'image_url' => 'nullable|string',
        ]);

        $category = Category::findOrFail($id);
        $category->update($request->all());

        // Trả về danh sách danh mục sau khi cập nhật
        return redirect()->route('categories.index')->with('success', 'Category updated successfully.');
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        // Trả về danh sách danh mục sau khi xóa
        return redirect()->route('categories.index')->with('success', 'Category deleted successfully.');
    }

}