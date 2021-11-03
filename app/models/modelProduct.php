<?php

namespace App\Models;

use App\Models\modelCate;
use  Illuminate\Database\Eloquent\Model;

class modelProduct extends Model
{
    // Vì trong thư viện của laravel cần có 2 col update at va create at nên cần thuộc tĩnh này để ko bị lỗi.
    public $timestamps = false;
    protected $table = "table_product";

    // Lưu ý ảnh không cho vào mảng này 
    public $fillable = ['product_name', 'product_price', 'product_quantity', 'cate_id', 'product_intro', 'product_description'];

    // Hàm inner join sản phẩm với anh mục.
    public function category()
    {
        return $this->belongsTo(modelCate::class, 'cate_id');
    }
}
