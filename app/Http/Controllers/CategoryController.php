<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories= Category::orderBy('id','DESC')->get();
        return view('backend.category.index',compact('categories'));
    }
    public function categoryStatus(Request $request){
        if ($request->mode=='true') {
            DB::table('categories')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('categories')->where('id',$request->id)->update(['status'=>'inactive']);
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
        $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();
        return view('backend.category.create')->with('parent_cats',$parent_cats);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // return $request->all();
        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable',
            'photo'=>'string|nullable',
            'status'=>'required|in:active,inactive',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
        ]);
        $data= $request->all();
        $slug=Str::slug($request->title);
        $count=Category::where('slug',$slug)->count();
        if($count>0){
            $slug=$slug.'-'.date('ymdis').'-'.rand(0,999);
        }
        $data['slug']=$slug;
        $data['is_parent']=$request->input('is_parent',0);
        // return $data;
        $status=Category::create($data);
        if($status){
            request()->session()->flash('success','Category successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* $parent_cats=Category::where('is_parent',1)->get();
        $category=Category::findOrFail($id);
        return view('backend.category.edit')->with('category',$category)->with('parent_cats',$parent_cats); */
        $parent_cats=Category::where('is_parent',1)->orderBy('title','ASC')->get();
        $category = Category::find($id);
        if ($category) {
            return view('backend.category.edite',compact(['category','parent_cats']));
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
//return $request->all();
        $category = Category::find($id);
        if ($category) {

        $this->validate($request,[
            'title'=>'string|required',
            'summary'=>'string|nullable',
            'photo'=>'string|nullable',
            'status'=>'nullable|in:active,inactive',
            'is_parent'=>'sometimes|in:1',
            'parent_id'=>'nullable|exists:categories,id',
        ]);

        $data= $request->all();
        if ($request->is_parent==1) {
            $data['parent_id']==null;
        }
        $data['is_parent']=$request->input('is_parent',0);
        // return $data;
        $status = $category->fill($data)->save();

        if($status){
            request()->session()->flash('success','Category successfully updated');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('category.index');

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
        $categories = Category::find($id);
        $child_cat_id=Category::where('parent_id',$id)->pluck('id');

        if ($categories) {

            $status = $categories->delete();

            if ($status) {

                if(count($child_cat_id)>0){

                    Category::shiftChild($child_cat_id);
                }

                return redirect()->route('category.index')->with('success','Category Successfully deleted');
            }
            else{
                return back()-with('error','Somthing went wrong');
            }
        } else {
            return back()-with('error','Data Not Found');

        }
    }
    public function getChildByParentID(Request $request){

       $category=Category::findOrFail($request->id);
       if ($category) {
           $child_cat=Category::getChildByParentID($request->id);
           // return $child_cat;
       if(count($child_cat)<=0){
           return response()->json(['status'=>false,'msg'=>'','data'=>null]);
       }
       return response()->json(['status'=>true,'msg'=>'','data'=>$child_cat]);

       }
       else{
           return response()->json(['status'=>false,'msg'=>'','data'=>null]);

       }
    }
}
