<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Product extends Model
{
    protected $table = 'products';
    protected $primaryKey = 'pro_id';
    protected $fillable = ['pro_name','pro_price', 'pro_brand', 'pro_cate', 'pro_photo','pro_notes'];
    // public function user() {
    //     return $this->belongsTo(User::class);
    // } 
    public static function validate(array $data) {
        $errors = [];
        if (! $data['pro_name']) {
            $errors['pro_name'] = 'Tên sản phẩm không đươc để trống.';
        } 
        if (! $data['pro_price']) {
            $errors['pro_price'] = 'Giá sản phẩm không đươc để trống.';
        } 
        if (! $data['pro_brand']) {
            $errors['pro_brand'] = 'Thương hiệu không được để trống.';
        }
        if (! $data['pro_cate']) {
            $errors['pro_cate'] = 'Loại sản phẩm không được để trống.';
        }
        if (! $data['pro_photo']) {
            $errors['pro_photo'] = 'Hình ảnh không được để trống.';
        }
        
        if (! $data['pro_notes']) {
            $errors['pro_notes'] = 'Mô tả không được để trống.';
        }
        return $errors;
    }
}