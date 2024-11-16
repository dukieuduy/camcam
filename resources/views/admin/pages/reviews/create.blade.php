@extends('admin.app')

@section('content')
<div class="container">
    <h1>Tạo Review Mới</h1>

    <form action="{{ route('admin.reviews.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="product_id">Sản phẩm</label>
            <select name="product_id" class="form-control" required>
                <option value="">Chọn sản phẩm</option>
                @foreach($products as $product)
                    <option value="{{ $product->id }}">{{ $product->name }}</option>
                @endforeach
            </select>
        </div>
        
        <div class="form-group">
            <label for="user_id">Người dùng</label>
            <select name="user_id" class="form-control" required>
                <option value="">Chọn người dùng</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="rating">Đánh giá</label>
            <select name="rating" class="form-control" required>
                <option value="">Chọn đánh giá</option>
                <option value="1">1 Sao</option>
                <option value="2">2 Sao</option>
                <option value="3">3 Sao</option>
                <option value="4">4 Sao</option>
                <option value="5">5 Sao</option>
            </select>
        </div>

        <div class="form-group">
            <label for="comment">Bình luận</label>
            <textarea name="comment" class="form-control" rows="5"></textarea>
        </div>

        <button type="submit" class="btn btn-success">Tạo Review</button>
    </form>
</div>
@endsection
