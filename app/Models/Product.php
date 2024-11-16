<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name', 'description', 'price', 'stock_quantity', 
        'category_id', 'image_url', 'sku', 'is_active', 'vendor_id'
    ];

    // Lấy danh mục thông qua category_id
    public function getCategoryName()
    {
        $category = Category::find($this->category_id);  
        return $category ? $category->category_name : 'Unknown Category';  
    }
}