@extends('layouts.admin')
@section('content')
    @php
        $now = Carbon\Carbon::now()->toDateTimeString();
        $month = date('m',strtotime($now));
        $current_month = date('F',strtotime($now));


        $allIncome = App\Models\Income::where('status',1)->whereMonth('date', '=' ,$month)->get();

        $allExpense = App\Models\Expense::where('status',1)->whereMonth('date', '=' ,$month)->get();

        $totalincome = App\Models\Income::where('status',1)->whereMonth('date', '=' ,$month)->sum('ammount');

        $totalexpense = App\Models\Expense::where('status',1)->whereMonth('date', '=' ,$month)->sum('ammount');

        $savings = $totalincome - $totalexpense;
    @endphp
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>{{ $current_month }} :: Income Expense Summery
                </div>
                {{-- <div class="col-md-4 card_button_part">
                    <a href="{{ url('add/income/') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Income</a>
                </div> --}}
            </div>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped table-hover custom_table" id="example">
                <thead class="table-dark">
                <tr>
                    <th>SL NO:</th>
                    <th>Title</th>
                    <th>Category Name</th>
                    <th>Income</th>
                    <th>Expese</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($allIncome as $income)
                    <tr>
                        <td>{{ date('d-F-y', strtotime($income->date)) }}</td>
                        <td>{{ $income->title }}</td>
                        <td>{{ $income->rel_to_incategory->incate_name }}</td>
                        <td>{{ number_format($income->ammount,2) }}</td>
                        <td></td>

                    </tr>
                    @endforeach
                    @foreach ($allExpense as $expense)
                    <tr>
                        <td>{{ date('d-F-y', strtotime($expense->date)) }}</td>
                        <td>{{ $expense->title }}</td>
                        <td>{{ $expense->rel_to_excategory->expcate_name }}</td>
                        <td></td>
                        <td>{{ number_format($expense->ammount,2) }}</td>
                    </tr>
                    @endforeach

                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-end">Total:</th>
                            <th><span class="text-danger"><b>{{ number_format($totalincome,2) }}</b></span></th>
                            <th><span class="text-danger"><b>{{ number_format($totalexpense,2) }}</b></span></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-end">Savings:</th>
                            <th><span class="text-success"><b>{{ number_format($savings,2) }}</b></span></th>
                            <th></th>
                        </tr>

                    </tfoot>




                </tbody>
            </table>
            </div>
            <div class="card-footer">
            <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" onclick="window.print()" class="btn btn-sm btn-dark">Print</button>
                <a href="{{ url('income/pdf') }}" class="btn btn-sm btn-secondary">PDF</a>
                <a href="{{ url('income/excel') }}" class="btn btn-sm btn-dark">Excel</a>
            </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('script')
<script>
    new DataTable('#example');
</script>
@endsection
