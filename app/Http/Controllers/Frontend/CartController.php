<?php
namespace App\models;
namespace App\Http\Controllers\Frontend;
use App\Models\Setting;
use App\Http\Controllers\Controller;
use App\Models\Product;
use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function cartStore( Request $request){
       $product_qty= $request->input('product_qty');
       $product_id= $request->input('product_id');
       $product = Product::getProductByCart($product_id);
       $price = $product[0]['offer_price'];
        $photo=$product[0]['photo'];
       $cart_array=[];
       foreach(Cart::instance('shopping')->content() as $item){
        $cart_array[]=$item->id;
       }
       $result = Cart::instance('shopping')->add($product_id,$product[0]['title'],$product_qty,$price)->associate('App\Models\Product');

       if($result){
           $response['status']=true;
           $response['product_id']=$product_id;
           $response['total']=Cart::subtotal();
           $response['cart_count']=Cart::instance('shopping')->count();
           $response['message']="تم اضافة المنتج ل سلة الشراء ";
       }

       if($request->ajax()){
        $setting = Setting::where(['status'=>'active'])->limit('1')->first();
        $header= view('frontend.layouts.header0', compact('setting'))->render();
        $response['header']=$header;

    }

       return json_encode($response);
    }
}
