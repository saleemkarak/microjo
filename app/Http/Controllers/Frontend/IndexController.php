<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Banner;
use App\Models\Brand;
use App\Models\DB;
use App\Models\Category;
use App\Models\Product;
use App\Models\Setting;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;

use Illuminate\Support\Facades\Auth as FacadesAuth;
use Illuminate\Support\Facades\Redirect;

class IndexController extends Controller
{


   public function home(){
    $setting = Setting::where(['status'=>'active'])->limit('1')->first();

       $banners = Banner::where(['status'=>'active','condition'=>'banner'])->orderBy('id','DESC')->limit('2')->get();
       $categories = Category::with('products')->where(['status'=>'active','is_parent'=>1])->orderBy('id','DESC')/*->limit('3')*/->get();
       $categoriesIn = Category::with('childCat')->where(['status'=>'active','is_parent'=>1])->orderBy('id','DESC')/*->limit('3')*/->get();
       $brands = Brand::with('products')->where(['status'=>'active'])->orderBy('id','DESC')->get();
       $recommended_products =Product::where(['status'=>'active','is_recommended'=>'true'])->orderBy('id','DESC')->limit('10')->get();


return view('frontend.index0',compact(['banners','categories','setting','categoriesIn','brands','recommended_products']));
   }

   public function productCategory(Request $request ,$slug){


       $setting = Setting::where(['status'=>'active'])->limit('1')->first();
       $categoriesIn = Category::with('childCat')->where(['status'=>'active','is_parent'=>1])->orderBy('id','DESC')/*->limit('3')*/->get();

       $categories = Category::with('products','productsInChild')->where('slug',$slug)->first();
       $brands = Brand::with('products')->where(['status'=>'active'])->orderBy('id','DESC')->get();

       $setting->title = $categories->title;

        $sort = '';
        if ($request->sort !=null) {
            $sort = $request->sort;
        }
        if ($categories == null) {
            return view('errors.404');
        }
        else{
            if ($sort == 'priceAsc') {

                $products = Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','ASC')->paginate(12);
            }
            elseif($sort == 'priceDesc') {
                $products = Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('offer_price','DESC')->paginate(12);
            }
            elseif($sort == 'discAsc') {
                $products = Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','Asc')->paginate(12);
            }
            elseif($sort == 'discDesc') {
                $products = Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('price','DESC')->paginate(12);
            }
            elseif($sort == 'titleAsc') {
                $products = Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','ASC')->paginate(12);
            }
            elseif($sort == 'titleDesc') {
                $products = Product::where(['status'=>'active','cat_id'=>$categories->id])->orderBy('title','DESC')->paginate(12);
            }
            else {
                $products = Product::where(['status'=>'active','cat_id'=>$categories->id])->paginate(12);

            }
        }

       $route = "product-category";
       if($request->ajax()){

           $view=view('frontend.layouts._single-products0',compact('products'))->render();
           return response()->json(['html'=>$view]);
       }

       return view('frontend.pages.product.product-category0',compact(['categories','categoriesIn','setting','route','products','sort','brands']));
   }
   public function productDetail($slug){
    $categoriesIn = Category::with('childCat')->where(['status'=>'active','is_parent'=>1])->orderBy('id','DESC')/*->limit('3')*/->get();
    $brands = Brand::with('products')->where(['status'=>'active'])->orderBy('id','DESC')->get();

    $setting = Setting::where(['status'=>'active'])->limit('1')->first();

    $product= Product::with('related_products')->where('slug',$slug)->first();

if ($product) {
    return view('frontend.pages.product.product-detail0',compact(['product','setting','categoriesIn','brands']));

}
else{
    return 'Product Not Found';
}
   }


   public function userAuth(){
    $setting = Setting::where(['status'=>'active'])->limit('1')->first();
       return view('frontend.auth.auth' ,compact(['setting']));
   }


   public function loginSubmit(Request $request){


            $this->validate($request,[
        'email'=>'email|required|exists:users,email',
        'password'=>'required|min:4',
            ]);

        if (Auth::attempt(['email' => $request->email, 'password' => $request->password, 'status'=>'active'])) {
            Session::put('user',$request->email);
            if (Session::get('url.intendend')) {
            return Redirect::to(Session::get('url.internded'));
            }

    else {

        $user = User::where(['email'=>$request->email])->limit('1')->first();;

        if($user->role == 'admin'){

           return redirect()->route('admin')->with('success','Successfully login');

        }
        else {
           return redirect()->route('home')->with('success','Successfully login');

        }


    }

}
else{
    return back()->with('error','Invaled Email Or Password');
}

   }

   public function registerSubmit(Request $request){

    $this->validate($request,[
        'full_name'=>'string|required',
        'username'=>'nullable|string',

        'email'=>'email|required|unique:users,email',
        'password'=>'required|min:4|confirmed',
               ]);

       $data= $request->all();

       $check=$this->create($data);

        Session::put('user',$data['email']);
        Auth::login($check);
        if($check){

            request()->session()->flash('success','Successfully registered');
            return redirect()->route('home');
        }
        else{
            request()->session()->flash('error','Please try again!');
            return back();
        }

   }
   public function create(array $data){

    return User::create([
        'full_name'=>$data['full_name'],
        'username'=>$data['username'],
        'email'=>$data['email'],
        'password'=>Hash::make($data['password']),
        'status'=>'active'
        ]);
}
public function userLogout(){
    Session::forget('user');
    Auth::logout();
    return \redirect()->home()->with('success','logout successfully');
}
// User Account functions
 public function userDashboard()
{
    $setting = Setting::where(['status'=>'active'])->limit('1')->first();
    $user = Auth::user();

    return view('frontend.user_account.dashboard',compact('setting','user'));
}
public function userOrder()
{
    $setting = Setting::where(['status'=>'active'])->limit('1')->first();
    $user = Auth::user();

    return view('frontend.user_account.order',compact('setting','user'));
}
public function userAddress()
{
    $setting = Setting::where(['status'=>'active'])->limit('1')->first();
    $user = Auth::user();

    return view('frontend.user_account.address',compact('setting','user'));
}
public function userAccountDetail()
{
    $setting = Setting::where(['status'=>'active'])->limit('1')->first();
    $user = Auth::user();

    return view('frontend.user_account.account',compact('setting','user'));
}
//Address
public function billingAddress(Request $request,$id ){

$user = User::where('id',$id)->update(['country'=>$request->country,'city'=>$request->city,'state'=>$request->state,'postcode'=>$request->postcode,'address'=>$request->address]);
if ($user) {
    return back()->with('success','تم تعديل العنوان بنجاح');
}
else{
    return back()->with('error','فشل في التعديل');

}

}
public function shippingAddress(Request $request,$id ){


    $user = User::where('id',$id)->update(['scountry'=>$request->scountry,'scity'=>$request->scity,'sstate'=>$request->sstate,'spostcode'=>$request->spostcode,'saddress'=>$request->saddress]);
    if ($user) {
        return back()->with('success','تم تعديل عنوان الشحن بنجاح');
    }
    else{
        return back()->with('error','فشل في التعديل');

    }

    }
    // end address
    // Acount edite
    public function updateAccount(Request $request,$id ){

$this->validate($request,
        [
            'full_name'=>'string|required|max:50',
            'username'=>'string|nullable',

            'newpassword'=>'string|required',
            'password'=>'string|required',
            'phone'=>'string|nullable',


        ]);
        $hashpassword=Auth::user()->password;
        if ($request->oldpassword==null && $request->newpassword==null) {

            User::where('id',$id)->update(['full_name'=>$request->full_name,'username'=>$request->username,'phone'=>$request->phone]);
            return back()->with('success','تم التعديل بنجاح');
        }
        else{

           if (\Hash::check($request->oldpassword, $hashpassword)) {

            if (!\Hash::check($request->newpassword, $hashpassword)) {
                $request['newpassword']=Hash::make($request->newpassword);
                User::where('id',$id)->update(['full_name'=>$request->full_name,'username'=>$request->username,'phone'=>$request->phone,'password'=>$request->newpassword]);
                return back()->with('success','تم التعديل بنجاح');
            }
            else{
                return back()->with('error','كلمة مرور مطابقة لكلمةالمرور القديمة');
            }
           }
           else{
            return back()->with('error','كلمة مرور قديمة غير صحيحة');

           }

        }

        }
}
