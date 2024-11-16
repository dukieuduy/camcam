<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;
use App\Models\CartItem;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
    public function addToCart(Request $request)
    {
        $validated = $request->validate([
            'product_id' => 'required|integer|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        $product_id = $validated['product_id'];
        $quantity = $validated['quantity'];

        // Kiểm tra nếu người dùng đã đăng nhập
        $cart = $this->getCart();

        // Thêm hoặc cập nhật sản phẩm trong giỏ hàng
        $cartItem = CartItem::updateOrCreate(
            ['cart_id' => $cart->id, 'product_id' => $product_id],
            ['quantity' => DB::raw("quantity + $quantity")]
        );

        session()->flash('success', 'Sản phẩm đã được thêm vào giỏ hàng thành công');
        return redirect()->back();
    }

    private function getCart()
    {
        if (auth()->check()) {
            return Cart::firstOrCreate(['user_id' => auth()->id()]);
        } else {
            return $this->getGuestCart();
        }
    }

    private function getGuestCart()
    {
        $cart_id = Session::get('cart_id');

        if (!$cart_id) {
            // Tạo mới giỏ hàng và lưu vào session
            $cart = Cart::create();
            Session::put('cart_id', $cart->id);
        } else {
            // Tìm giỏ hàng theo cart_id trong session
            $cart = Cart::find($cart_id);
        }

        // Nếu cart không tồn tại (trường hợp hiếm), tạo một cart mới
        if (!$cart) {
            $cart = Cart::create();
            Session::put('cart_id', $cart->id);
        }

        return $cart;
    }

    // Hiển thị giỏ hàng
    public function showCart()
    {
        $cart = $this->getCart();

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty']);
        }

        $totalQuantity = $cart->items->sum('quantity');
        return view('client.pages.cart.show', compact('cart', 'totalQuantity'));
    }

    // Sửa số lượng sản phẩm trong giỏ hàng
    public function updateItem(Request $request, $productId)
    {
        $validated = $request->validate([
            'quantity' => 'required|integer|min:1',
        ]);

        $cart = $this->getCart();

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 404);
        }

        // Cập nhật số lượng sản phẩm
        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->quantity = $validated['quantity'];
            $cartItem->save();
            return response()->json(['message' => 'Đã cập nhật thành công mục giỏ hàng']);
        }

        return response()->json(['message' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }

    // Xóa sản phẩm khỏi giỏ hàng
    public function removeItem($productId)
    {
        $cart = $this->getCart();

        if (!$cart) {
            return response()->json(['message' => 'Cart is empty'], 404);
        }

        // Xóa sản phẩm khỏi giỏ hàng
        $cartItem = CartItem::where('cart_id', $cart->id)->where('product_id', $productId)->first();
        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('message', 'Đã xóa thành công mục giỏ hàng');
        }

        return response()->json(['message' => 'Không tìm thấy sản phẩm trong giỏ hàng'], 404);
    }
}
