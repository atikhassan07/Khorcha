<?php

namespace App\Http\Controllers;

use App\Exports\IncomeExport;
use Illuminate\Support\Facades\Auth;
use App\Models\Incomecategory;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Income;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;
use PDF;
class IncomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $incomes = Income::where('status',1)->orderBy('id','DESC')->get();

        return view('admin.income.main.all',compact('incomes'));
    }

    public function add()
    {
        $incomeCategory = Incomecategory::where('status', 1)->orderBy('id','DESC')->get();
        return view('admin.income.main.add',compact('incomeCategory'));
    }
    // edit
    public function edit($slug)
    {
        $editIncome = Income::where('status',1)->where('slug',$slug)->firstOrFail();

        return view('admin.income.main.edit',compact('editIncome'));
    }
    // insert
    public function store(Request $request)
    {
        $request->validate([
            'title'=>'required|unique:incomes,title',
            'date'=>'required',
            'ammount'=>'required',
            'incate_id'=>'required',
        ],[
            'title.required'=>'The Title Field Must Be Needed :)',
            'incate_id.required'=>'The Income Category Field Must Be Needed :)',
        ]);

        $slug = 'IC'.'-'.str::lower(str_replace(' ','-',$request->title)).'.'.uniqid();

        $creator = Auth::user()->id;

        Income::insert([
            'incate_id'=>$request->incate_id,
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'date'=>$request->date,
            'ammount'=>$request->ammount,
            'remarks'=>$request->remarks,
            'slug'=>$slug,
            'income_creator'=>$creator,
            'created_at'=>Carbon::now(),
        ]);

        $notification=array('messege' => 'Income  Added Successfuly', 'alert-type' => 'success');


        return back()->with($notification);
    }
    // update
    public function update(Request $request)
    {
        $id = $request->id;
        $slug = $request->slug;

        Income::where('status', 1)->where('id',$id)->update([
            'title'=>$request->title,
            'sub_title'=>$request->sub_title,
            'date'=>$request->date,
            'ammount'=>$request->ammount,
            'remarks'=>$request->remarks,
            'updated_at'=>Carbon::now(),
        ]);

        return back();
    }
    // view
    public function view($slug)
    {

        $viewIncome = Income::where('status', 1)->where('slug',$slug)->firstOrFail();

        return view('admin.income.main.view',compact('viewIncome'));
    }

    // soft Delete
        public function softDelete($id)
        {
            $softDelete = Income::where('status', 1)->where('id',$id)->update([
                'status' => 0,
            ]);

        $notification=array('messege' => 'Income  Soft Delete Successfuly Done :)', 'alert-type' => 'success');


        return back()->with($notification);

        }

    // Delete
        public function delete($id)
        {
            $delete = Income::find($id)->delete();

            $notification=array('messege' => 'Income  Parmatently Delete Successfuly Done :)', 'alert-type' => 'success');


            return back()->with($notification);
        }

        // pdf
        public function pdf(){
            $incomes = Income::all();

            $pdf = PDF::loadView('admin.income.main.pdf',compact('incomes'));

            return $pdf->download('Income'.time());
        }
        //excel
        public function excel(){
            // $incomes = Income::all();
            return Excel::download(new IncomeExport, 'Income'.time().'.xlsx');
        }
}
