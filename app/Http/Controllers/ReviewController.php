<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Review;
use App\Models\User;
use Illuminate\Http\Request;

class ReviewController extends Controller
{
    // Hiển thị danh sách tất cả các review
    public function index()
    {
        $reviews = Review::all();
        foreach ($reviews as $review) {
            $review->product = Product::find($review->product_id);
            $review->user = User::find($review->user_id);
        }
        return view('admin.pages.reviews.index', compact('reviews'));
    }

    // Hiển thị form tạo review mới
    public function create()
    {
        $products = Product::all(); 
        $users = User::all(); 
        return view('admin.pages.reviews.create', compact('products', 'users'));
    }

    // Lưu review mới vào cơ sở dữ liệu
    public function store(Request $request)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        Review::create($request->all()); // Lưu review vào bảng reviews

        return redirect()->route('admin.reviews.index')->with('success', 'Review đã được tạo.');
    }

    // Hiển thị form chỉnh sửa review
    public function edit($id)
    {
        $review = Review::findOrFail($id); // Lấy review cần chỉnh sửa
        $products = Product::all(); // Lấy tất cả sản phẩm
        $users = User::all(); // Lấy tất cả người dùng
        return view('admin.pages.reviews.edit', compact('review', 'products', 'users'));
    }

    // Cập nhật review
    public function update(Request $request, $id)
    {
        $request->validate([
            'product_id' => 'required|exists:products,id',
            'user_id' => 'required|exists:users,id',
            'rating' => 'required|integer|min:1|max:5',
            'comment' => 'nullable|string|max:255',
        ]);

        $review = Review::findOrFail($id);
        $review->update($request->all()); // Cập nhật review

        return redirect()->route('admin.reviews.index')->with('success', 'Review đã được cập nhật.');
    }

    // Xóa review
    public function destroy($id)
    {
        $review = Review::findOrFail($id);
        $review->delete(); // Xóa review

        return redirect()->route('admin.reviews.index')->with('success', 'Review đã được xóa.');
    }

   
}