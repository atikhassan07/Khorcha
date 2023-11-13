<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $allUser = User::where('status',1)->orderBy('id','DESC')->get();
        return view('admin.users.all',compact('allUser'));
    }

    public function add()
    {
        return view('admin.users.add');
    }

    // store
    public function store(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|unique:users',
            'username'=>'required|unique:users,username,',
            'password'=>'required',
            'confirm_password'=>'required',
            'role'=>'required',
        ],[
            'name.required'=>'Please Enter Your Name :)',
            'email.required'=>'Please Enter Your Email :)',
            'username.required'=>'Please Enter Your User Name :)',
            'password.required'=>'Please Enter Your PassWord :)',
            'confirm_password.required'=>'Please Enter Your Confirm PassWord :)',
            'role.required'=>'Please Select Your Role :)',
        ]);

        $insert = User::insertGetId([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'username'=>$request->username,
            'password'=>Hash::make($request->password),
            'role'=>$request->role,
            'created_at'=>Carbon::now()->toDateTimeString(),
        ]);

       if ($insert) {
          Session::flash('success', 'User Registration Successfully...');
          return redirect('dashboard/add/user');
        }else{
            Session::flash('error', 'Opps Something Wrong...');
            return redirect('dashboard/add/user');
        }

}
}
