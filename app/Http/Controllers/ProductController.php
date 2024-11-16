<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Review;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    // Hiển thị danh sách sản phẩm
        public function index(){
            
            $products = Product::all();
            $categories = Category::all();

            // Lấy danh sách sản phẩm và group theo category_id
            $productsByCategory = Product::all()->groupBy('category_id');

            // Tạo mảng để chứa số sao trung bình của từng sản phẩm
            $productRatings = [];

            // Lặp qua tất cả sản phẩm để tính số sao trung bình cho mỗi sản phẩm
            foreach ($products as $product) {
                // Lấy tất cả đánh giá của sản phẩm này
                $reviews = Review::where('product_id', $product->id)->get();

                // Tính số sao trung bình, nếu không có đánh giá thì gán mặc định là 0
                $averageRating = $reviews->avg('rating') ?? 0;

                // Lưu số sao trung bình vào mảng
                $productRatings[$product->id] = round($averageRating, 1);  // Làm tròn số sao trung bình
            }

            // Trả về view sau khi đã hoàn thành xử lý tất cả sản phẩm
            return view('client.pages.home', compact('products', 'productRatings','categories','productsByCategory'));

    }
    // Hiển thị form tạo mới sản phẩm
    public function create()
    {
        $categories = Category::all();  // Lấy tất cả danh mục
        return view('products.create', compact('categories'));
    }

    // Lưu sản phẩm mới
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        Product::create([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url,
            'sku' => $request->sku,
            'is_active' => $request->is_active ?? true,
            'vendor_id' => auth()->id(),  // Ví dụ, lấy vendor_id từ người dùng đã đăng nhập
        ]);

        return redirect()->route('products.index')->with('success', 'Product created successfully');
    }

    // Hiển thị form chỉnh sửa sản phẩm
    public function edit(Product $product)
    {
        $categories = Category::all();  // Lấy tất cả danh mục
        return view('products.edit', compact('product', 'categories'));
    }

    // Cập nhật sản phẩm
    public function update(Request $request, Product $product)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
            'price' => 'required|numeric',
            'stock_quantity' => 'required|integer',
            'category_id' => 'nullable|exists:categories,id',
        ]);

        $product->update([
            'name' => $request->name,
            'description' => $request->description,
            'price' => $request->price,
            'stock_quantity' => $request->stock_quantity,
            'category_id' => $request->category_id,
            'image_url' => $request->image_url,
            'sku' => $request->sku,
            'is_active' => $request->is_active ?? true,
            'vendor_id' => auth()->id(),  // Ví dụ, lấy vendor_id từ người dùng đã đăng nhập
        ]);

        return redirect()->route('products.index')->with('success', 'Product updated successfully');
    }

    // Xóa sản phẩm
    public function destroy(Product $product)
    {
        $product->delete();
        return redirect()->route('products.index')->with('success', 'Product deleted successfully');
    }
    public function showProductsByCategory($categoryId)
    {
        // Lấy danh mục
        $category = Category::find($categoryId);

        if (!$category) {
            return redirect()->route('categories.index')->with('error', 'Category not found.');
        }

        // Lấy tất cả sản phẩm thuộc danh mục này
        $products = $category->getProducts();

        return view('products.index', compact('products', 'category'));
    }

        public function show($id)
    {
        $product = Product::findOrFail($id);
        $reviews = Review::where('product_id', $id)->get(); 

        // Tính số sao trung bình
        $averageRating = $reviews->avg('rating');


        return view('client.pages.detail', compact('product', 'reviews', 'averageRating'));
    }


    
}