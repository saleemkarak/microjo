<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Product;
use Illuminate\Http\Resources\MergeValue;
use PhpMyAdmin\Engines\Merge;

class Category extends Model
{
    use HasFactory;
    protected $fillable=['title','slug','summary','photo','status','is_parent','parent_id','added_by'];
    public static function shiftChild($cat_id){

       // return Category::where('id',$cat_id)->update(['is_parent' => 1]);
       return Category::whereIn('id',$cat_id)->update(['is_parent'=>1]);

    }
    public static function getChildByParentID($id){

        // return Category::where('id',$cat_id)->update(['is_parent' => 1]);
        return Category::where('parent_id',$id)->pluck('title','id');

     }


     public function products()
{
$data= $this->hasMany(Product::class,'cat_id','id');


 return $data;

}




     public function productsInChild(){
        return $this->hasMany(Product::class,'child_cat_id','id');
    }

     public function childCat(){
        return $this->hasMany(Category::class,'parent_id','id');
    }
}

