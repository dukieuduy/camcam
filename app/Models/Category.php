<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'parent_id',
        'description',
        'image_url',
    ];

    // Quan hệ với danh mục cha
    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Quan hệ với danh mục con
    public function childCategories()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public function getProducts()
    {
        return Product::where('category_id', $this->id)->get();  // Lấy tất cả sản phẩm thuộc danh mục này
    }
}