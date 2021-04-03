<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;
    protected $fillable=['title','summary','description','slug','cat_id','child_cat_id','price','offer_price','brand_id','discount','status','photo','size','stock','is_featured','is_recommended','condition','vendor_id'];
public function brand(){
    return $this->belongsTo(Brand::class);
}
public function related_products(){
    return $this->hasMany(Product::class,'cat_id','cat_id')->where('status','active')->limit(4);
}
public static function getProductByCart($id){
return self::where('id',$id)->get()->toArray();
}
public function category(){
    return $this->belongsTo(Category::class,'cat_id','id');
}
}
