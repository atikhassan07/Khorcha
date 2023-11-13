<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Expense;
use Carbon\Carbon;
use PDF;


class ExpenseController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $expenses = Expense::where('status', 1)->orderBy('id','DESC')->get();

        return view('admin.expense.main.all',compact('expenses'));
    }

    public function add()
    {
        return view('admin.expense.main.add');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:incomes,title',
            'date'=>'required',
            'ammount'=>'required',
            'expcate_id'=>'required',
        ],[
            'title.required'=>'The Title Field Must Be Needed :)',
            'expcate_id.required'=>'The Expense Category Field Must Be Needed :)',
        ]);

        $slug = 'EX'.'-'.str::lower(str_replace(' ','-',$request->title)).'.'.uniqid();

        $creator = Auth::user()->id;

        Expense::insert([
            'expcate_id'=>$request->expcate_id,
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'date'=>$request->date,
            'ammount'=>$request->ammount,
            'remarks'=>$request->remarks,
            'slug'=>$slug,
            'expense_creator'=>$creator,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Expense  Added Successfuly', 'alert-type' => 'success');


        return back()->with($notification);
    }
    // edit

    public function edit($slug)
    {
        $editExpense = Expense::where('status',1)->where('slug',$slug)->firstOrFail();

        return view('admin.expense.main.edit',compact('editExpense'));
    }

    // update
    public function update(Request $request)
    {
        $id = $request->id;

        $request->validate([
            'title'=>'required|unique:incomes,title,'.$id.'id',
            'ammount'=>'required',
            'expcate_id'=>'required',
        ],[
            'title.required'=>'The Title Field Must Be Needed :)',
            'expcate_id.required'=>'The Expense Category Field Must Be Needed :)',
        ]);

        $slug = 'EX'.'-'.str::lower(str_replace(' ','-',$request->title)).'.'.uniqid();

        $editor = Auth::user()->id;

        Expense::where('status',1)->where('id',$id)->update([
            'expcate_id'=>$request->expcate_id,
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'ammount'=>$request->ammount,
            'remarks'=>$request->remarks,
            'slug'=>$slug,
            'expense_editor'=>$editor,
            'updated_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Expense  Updated Successfuly', 'alert-type' => 'success');


        return redirect('all/expense')->with($notification);
    }

    // view
    public function view($slug)
    {
        $viewExpense = Expense::where('status', 1)->where('slug',$slug)->firstOrFail();

        return view('admin.expense.main.view',compact('viewExpense'));
    }
    // softDelete

    public function softDelete($id)
    {
        $softDelete = Expense::where('status', 1)->where('id',$id)->update([
            'status' => 0,
        ]);

        $notification=array('messege' => 'Soft Delete Successfuly', 'alert-type' => 'success');

        return back()->with($notification);
    }

    // pdf
    public function pdf(){
        $expenses = Expense::all();

        $pdf = PDF::loadView('admin.expense.main.pdf',compact('expenses'));

        return $pdf->download('Expense'.time());
    }
}
