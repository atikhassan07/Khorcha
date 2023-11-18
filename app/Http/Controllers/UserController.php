<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

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

        $slug='U'.uniqid('20');

        $insert = User::insertGetId([
            'name'=>$request->name,
            'phone'=>$request->phone,
            'email'=>$request->email,
            'slug'=>$slug,
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

    public function edit($slug)
    {
        $users=User::where('status',1)->where('slug',$slug)->firstOrFail();
        return view('admin.users.edit',compact('users'));
    }

    public function update(Request $request)
    {

        $id=$request['id'];

        $slug=$request['slug'];

        if($request->hasFile('image') == null)
        {
            User::where('id',$id)->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
            return redirect('dashboard/all/user');
        }
        else{
            if($request->hasFile('image')){
                $image = $request->file('image');
                $imageName ='U-'.'-'.time().'.'.$image->getClientOriginalExtension();
                Image::make($image)->save(public_path('uploads/user_image'.$imageName));
            }
            User::where('id',$id)->update([
                'name'=>$request->name,
                'phone'=>$request->phone,
                'email'=>$request->email,
                'image'=>$imageName,
                'updated_at'=>Carbon::now()->toDateTimeString(),
            ]);
            return redirect('dashboard/all/user');
        }
    }

    public function delete($id){
        User::where('status',1)->where('id',$id)->update([
            'status'=> 0,
        ]);
        return redirect('dashboard/all/user');
    }
}
