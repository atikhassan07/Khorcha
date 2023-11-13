<?php

namespace App\Http\Controllers;

use App\Models\Basicinfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class BasicinfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function basicInfo()
    {
        $basicInfo = Basicinfo::where('status',1)->where('id',1)->firstOrFail();
        return view('admin.manage.basic_info',compact('basicInfo'));
    }

    public function basicInfoUpdate(Request $request)
    {
        $request->validate([
            'company_name'=>'required',
        ]);
        // main logo
        if($request->hasFile('main_logo')){
            $logo = $request->file('main_logo');
            $logoName = 'main_logo'.time().'.'.$logo->getClientOriginalExtension();
            Image::make($logo)->save(public_path('uploads/logos/'.$logoName));

            Basicinfo::where('id',1)->update([
                'main_logo'=>$logoName,
            ]);
        }
        // favicon
        if($request->hasFile('favicon')){
            $favicon = $request->file('favicon');
            $faviconName = 'favicon'.time().'.'.$favicon->getClientOriginalExtension();
            Image::make($favicon)->save(public_path('uploads/logos/'.$faviconName));
            Basicinfo::where('id',1)->update([
                'favicon'=>$faviconName,
            ]);
        }

        // Footer Logo
        if($request->hasFile('footer_logo')){
            $fLogo = $request->file('footer_logo');
            $fLogoName = 'footer_logo'.time().'.'.$fLogo->getClientOriginalExtension();
            Image::make($fLogo)->save(public_path('uploads/logos/'.$fLogoName));
            Basicinfo::where('id',1)->update([
                'footer_logo'=>$fLogoName,
            ]);
        }

        $editor = Auth::user()->id;

        $update = Basicinfo::where('id',1)->update([
            'company_name'=>$request->company_name,
            'company_title'=>$request->company_title,
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Basic Information Updated Successfully...');
            return redirect('dashboard/basic/info');
          }else{
              Session::flash('error', 'Opps Something Wrong...');
              return redirect('dashboard/basic/info');
          }
    }
}
