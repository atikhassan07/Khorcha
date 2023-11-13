<?php

namespace App\Http\Controllers;

use App\Models\SocialMedia;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
class SocialmediaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function social()
    {
        $socialMedia = SocialMedia::where('status',1)->where('id',1)->firstOrFail();
        return view('admin.manage.social',compact('socialMedia'));
    }

    public function socialUpdate(Request $request)
    {
        $request->validate([

        ],[

        ]);

        $update = SocialMedia::where('id',1)->update([
            'facebook'=>$request->facebook,
            'twitter'=>$request->twitter,
            'linkedin'=>$request->linkedin,
            'youtube'=>$request->youtube,
            'instagram'=>$request->instagram,
            'pinterest'=>$request->pinterest,
            'behance'=>$request->behance,
            'whatsapp'=>$request->whatsapp,
            'telegram'=>$request->telegram,
            'github'=>$request->github,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Social Media Updated Successfully...');
            return redirect('dashboard/social');
          }else{
              Session::flash('error', 'Opps Something Wrong...');
              return redirect('dashboard/social');
          }
    }
}
