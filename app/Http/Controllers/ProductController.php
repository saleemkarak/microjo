<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products= Product::orderBy('id','DESC')->get();
        return view('backend.product.index',compact('products'));
    }

    public function productStatus(Request $request){
        if ($request->mode=='true') {
            DB::table('products')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('products')->where('id',$request->id)->update(['status'=>'inactive']);
        }
        return response()->json(['msg'=>'Successfully updated status','status'=>true]);
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.product.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|required',
            'description'=>'string|nullable',
            'photo'=>'string|required',
            'size'=>'nullable',
            'stock'=>"nullable|numeric",
            'cat_id'=>'required|exists:categories,id',
            'brand_id'=>'nullable|exists:brands,id',
            'child_cat_id'=>'nullable|exists:categories,id',
            'is_featured'=>'nullable|in:1,0',
            'status'=>'nullable|in:active,inactive',
            'condition'=>'required|in:popular,new,used','',
            'price'=>'nullable|numeric',
            'offer_price'=>'nullable|numeric',
            'discount'=>'nullable|numeric'
        ]);
        $data = $request->all();
        $slug=Str::slug($request->title);
        $count=Product::where('slug',$slug)->count();
        if($count>0){
            $slug=time().'-'.$slug;
        }
        $data['slug']=$slug;
        $data['offer_price']=($request->price-(($request->price*$request->discount)/100));

        $status=Product::create($data);
        if($status){
            request()->session()->flash('success','Product successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('product.index');



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('backend.product.view',compact(['product']));
        } else {
            return back()-with('error','Product not Found');

        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = Product::find($id);
        if ($product) {
            return view('backend.product.edite',compact(['product']));
        } else {
            return back()-with('error','Data not Found');

        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $product = Product::find($id);
        if ($product) {
            $this->validate($request,[
                'title'=>'string|required',
                'summary'=>'string|required',
                'description'=>'string|nullable',
                'photo'=>'string|required',
                'size'=>'nullable',
                'stock'=>"nullable|numeric",
                'cat_id'=>'required|exists:categories,id',
                'brand_id'=>'nullable|exists:brands,id',
                'child_cat_id'=>'nullable|exists:categories,id',
                'is_featured'=>'nullable|in:1,0',
                'status'=>'nullable|in:active,inactive',
                'condition'=>'required|in:popular,new,used','',
                'price'=>'nullable|numeric',
                'offer_price'=>'nullable|numeric',
                'discount'=>'nullable|numeric'
            ]);

            $data = $request->all();
        $data['offer_price']=($request->price-(($request->price*$request->discount)/100));

        $status = $product->fill($data)->save();

        if($status){
            request()->session()->flash('success','Product successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('product.index');

        } else {
            return back()-with('error','Data not Found');

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product= Product::find($id);

        if ($product) {
            $status=$product->delete();
            if ($status) {
                return redirect()->route('product.index')->with('success','Product Successfully deleted');
            }
            else{
                return back()-with('error','Somthing went wrong');
            }
        } else {
            return back()-with('error','Data Not Found');

        }
    }
}