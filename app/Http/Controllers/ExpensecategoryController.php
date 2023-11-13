<?php

namespace App\Http\Controllers;

use App\Models\Expensecategory;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PhpParser\Node\Expr\FuncCall;
use Illuminate\Support\Str;


class ExpensecategoryController extends Controller
{
    public function __construct()
    {
       $this->middleware('auth');
    }

    public function index()
    {
        $expenseCategory = Expensecategory::where('status',1)->orderBy('id','DESC')->get();

        return view('admin.expense.category.all',compact('expenseCategory'));
    }

    public function add()
    {
        return view('admin.expense.category.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'expcate_name'=>'required|unique:expensecategories,expcate_name'
        ],[
            'expcate_name.required'=>'The Expense Category Field Must Be Needed :)',
        ]);

        $slug = 'IC'.'-'.str::lower(str_replace(' ','-',$request->expcate_name)).'.'.uniqid();

        $creator = Auth::user()->id;

        Expensecategory::insert([
            'expcate_name'=>$request->expcate_name,
            'remarks'=>$request->remarks,
            'slug'=>$slug,
            'expcate_creator'=>$creator,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Expense Catagory Added Successfuly', 'alert-type' => 'success');


        return back()->with($notification);
    }

    // view category
    public function view($slug)
    {
        $viewCategory = Expensecategory::where('status', 1)->where('slug',$slug)->firstOrFail();

        return view('admin.expense.category.view',compact('viewCategory'));

    }
    public function edit($slug)
    {
        $editExpense = Expensecategory::where('status',1)->where('slug',$slug)->firstOrFail();

        return view('admin.expense.category.edit',compact('editExpense'));
    }
    // update expense
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'expcate_name'=>'required|unique:expensecategories,expcate_name,'.$id.'id',
        ],[
            'expcate_name.required'=>'The Expense Category Field Must Be Needed :)',
        ]);

        $slug = 'IC'.'-'.str::lower(str_replace(' ','-',$request->expcate_name)).'.'.uniqid();

        $editor = Auth::user()->id;

        Expensecategory::where('status',1)->where('id',$id)->update([
            'expcate_name'=>$request->expcate_name,
            'remarks'=>$request->remarks,
            'slug'=>$slug,
            'expcate_editor'=>$editor,
            'updated_at'=>Carbon::now()->toDateString(),
        ]);

        $notification=array('messege' => 'Expense Catagory Updated Successfuly', 'alert-type' => 'success');

        return redirect('view/expense/category/'.$slug)->with($notification);
    }

    // Soft Delete
    public function softDelete($id)
    {
        $softDelete = Expensecategory::where('status',1)->where('id',$id)->update([
            'status' => 0,
        ]);


        $notification=array('messege' => 'Expense Catagory Recyle Bin Successfuly', 'alert-type' => 'success');

        return back()->with($notification);
    }

    // delete
    public function delete($id)
    {
        Expensecategory::find($id)->delete();

        return back();


    }

}
