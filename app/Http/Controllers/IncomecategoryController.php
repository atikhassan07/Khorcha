<?php

namespace App\Http\Controllers;

use App\Models\Incomecategory;
use Illuminate\Support\Str;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
class IncomecategoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $incomeCategories = Incomecategory::where('status', 1)->orderBy('id', 'DESC')->get();
        return view('admin.income.category.all',compact('incomeCategories'));
    }

    public function add()
    {
        return view('admin.income.category.add');
    }


    public function store(Request $request)
    {
        $request->validate([
            'incate_name'=>'required|unique:incomecategories,incate_name'
        ],[
            'incate_name.required'=>'The Income Category Field Must Be Needed :)',
        ]);

        $slug = 'IC'.'-'.str::lower(str_replace(' ','-',$request->incate_name)).'.'.uniqid();

        $creator = Auth::user()->id;

        Incomecategory::insert([
            'incate_name'=>$request->incate_name,
            'remarks'=>$request->remarks,
            'slug'=>$slug,
            'incate_creator'=>$creator,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Income Catagory Added Successfuly', 'alert-type' => 'success');


        return back()->with($notification);
    }



    public function view($slug)
    {

        $viewCategory = Incomecategory::where('status', 1)->where('slug',$slug)->firstOrFail();

        return view('admin.income.category.view',compact('viewCategory'));
    }
    // Edit Code
    public function edit($slug)
    {
        $editCategory = Incomecategory::where('status', 1)->where('slug',$slug)->firstOrFail();

        return view('admin.income.category.edit',compact('editCategory'));

    }
    // update code
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'incate_name'=>'required|unique:incomecategories,incate_name,'.$id.'id',
        ],[
            'incate_name.required'=>'The Income Category Field Must Be Needed :)',
        ]);


        $slug = 'IC'.'-'.str::lower(str_replace(' ','-',$request->incate_name)).'.'.uniqid();

            Incomecategory::where('status',1)->where('id',$id)->update([

            'incate_name'=>$request->incate_name,
            'remarks'=>$request->remarks,
            'slug'=>$slug,
            'updated_at'=>Carbon::now(),
        ]);


            $notification=array('messege' => 'Income Catagory Updated Successfuly', 'alert-type' => 'success');

            return redirect('edit/income/category/'.$slug)->with($notification);

    }
    // soft delete
    public function softDelete($id)
    {
        $softDelete = Incomecategory::where('status', 1)->where('id',$id)->update([
            'status' => 0,
        ]);


        $notification=array('messege' => 'Income Catagory Soft Delete Successfully Done', 'alert-type' => 'success');

        return back()->with($notification);
    }

    // Recyle Bin

    public function recyleBin()
    {
        $recyleBin = Incomecategory::where('status', 0)->orderBy('id', 'ASC')->get();

        return view('admin.income.category.recyle_bin',compact('recyleBin'));

    }
    // Restore Code
    public function restoreCategory($id)
    {
        $restore = Incomecategory::where('status', 0)->where('id',$id)->update([
            'status' => 1,
        ]);

        $notification=array('messege' => 'Income Catagory Restore Successfully Done', 'alert-type' => 'success');

        return redirect('all/income/category')->with($notification);
    }

    // parmanent Delete
        public function delete($id)
        {
            $delete = Incomecategory::find($id)->delete();

            return back();
        }
}
