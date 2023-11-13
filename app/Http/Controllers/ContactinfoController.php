<?php

namespace App\Http\Controllers;

use App\Models\Contactinfo;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class ContactinfoController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function contactInfo()
    {
        $contactInfo = Contactinfo::where('status',1)->where('id',1)->firstOrFail();
        return view('admin.manage.contact',compact('contactInfo'));
    }

    public function contactInfoUpdate(Request $request)
    {

        $editor = Auth::user()->id;

        $update = Contactinfo::where('id',1)->update([
            'phone1'=>$request->phone1,
            'phone2'=>$request->phone2,
            'phone3'=>$request->phone3,
            'phone4'=>$request->phone4,
            'email1'=>$request->email1,
            'email2'=>$request->email2,
            'email3'=>$request->email3,
            'email4'=>$request->email4,
            'address1'=>$request->address1,
            'address2'=>$request->address2,
            'address3'=>$request->address3,
            'address4'=>$request->address4,
            'editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateTimeString(),
        ]);

        if ($update) {
            Session::flash('success', 'Contact Information Updated Successfully...');
            return redirect('dashboard/contact/info');
          }else{
              Session::flash('error', 'Opps Something Wrong...');
              return redirect('dashboard/contact/info');
          }
    }
}
