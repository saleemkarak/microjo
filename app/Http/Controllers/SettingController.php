<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Str;
class SettingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $settings= Setting::orderBy('id','DESC')->get();
        return view('backend.setting.index',compact('settings'));
    }

    public function settingStatus(Request $request){
        if ($request->mode=='true') {
            DB::table('settings')->where('id',$request->id)->update(['status'=>'active']);
        } else {
            DB::table('settings')->where('id',$request->id)->update(['status'=>'inactive']);
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
        return view('backend.setting.create');
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
            'email'=>'string|required',
            'facebook'=>'string|required',
            'twitter'=>'string|nullable',
            'insta'=>'string|required',
            'opentime'=>'string|nullable',
            'about'=>'string|nullable',
            'photo'=>'string|required',
            'phone'=>"string|nullable",
            'status'=>'nullable|in:active,inactive',

        ]);
        $data = $request->all();
        $slug=Str::slug($request->title);
        $count=Setting::where('slug',$slug)->count();
        if($count>0){
            $slug=time().'-'.$slug;
        }
        $data['slug']=$slug;

        $status=Setting::create($data);
        if($status){
            request()->session()->flash('success','Setting successfully added');
        }
        else{
            request()->session()->flash('error','Error occurred, Please try again!');
        }
        return redirect()->route('setting.index');
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
        $setting = Setting::find($id);
        if ($setting) {
            return view('backend.setting.edite',compact('setting'));
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
        $setting = Setting::find($id);
        if ($setting) {

        $this->validate($request,[
            'title'=>'string|required',
            'email'=>'string|required',
            'facebook'=>'string|required',
            'twitter'=>'string|nullable',
            'insta'=>'string|required',
            'opentime'=>'string|nullable',
            'about'=>'string|nullable',
            'photo'=>'string|required',
            'phone'=>"string|nullable",
            'status'=>'nullable|in:active,inactive',
                    ]);
                    $data = $request->all();

                  $status = $setting->fill($data)->save();
                    if ($status) {
                        return redirect()->route('setting.index')->with('success','Successfully update Setting');
                    } else {
                        return back()->with('error','Somthing went wrong');
                    }
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
        $setting = Setting::find($id);

        if ($setting) {
            $status = $setting->delete();
            if ($status) {
                return redirect()->route('setting.index')->with('success','Setting Successfully deleted');
            }
            else{
                return back()-with('error','Somthing went wrong');
            }
        } else {
            return back()-with('error','Data Not Found');

        }
    }
}
