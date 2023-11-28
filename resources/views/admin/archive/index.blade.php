@extends('layouts.admin')
@section('content')
    @php

    $all_income=App\Models\Income::select(DB::raw('count(*) as total'),DB::raw('YEAR(date) year, MONTH(date) month'))->groupby('year','month')->orderBy('date','DESC')->get();
    echo $all_income;
    @endphp
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>All Income Expense
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
                    <th>Month Name:</th>
                    <th>Total Income</th>
                    <th>Total Expense</th>
                    <th>Savings</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($all_income as $income)
                    <tr>
                        <td>
                            @php
                                $year=$income->year;
                                $month=$income->month;
                                $year_month=$year.'-'.$month;
                                $month_year=date('F-Y', strtotime($year_month));
                                echo $month_year;
                            @endphp
                        </td>
                        <td>
                           @php
                            $total_income=App\Models\Income::where('status',1)->whereYear('date','=',$year)->whereMonth('date','=',$month)->sum('ammount');
                            echo number_format($total_income,2);
                          @endphp
                        </td>
                        <td>
                            @php
                            $total_expense=App\Models\Expense::where('status',1)->whereYear('date','=',$year)->whereMonth('date','=',$month)->sum('ammount');
                            echo number_format($total_expense,2);
                          @endphp
                        </td>
                        <td>
                            @php
                                $total_savings=($total_income - $total_expense-$total_income*(40)/(100));
                            @endphp
                            <span class="text-success "><b>@php echo number_format($total_savings,2);@endphp</b></span>
                        </td>
                        <td class="no_print">
                            <div class="btn-group btn_group_manage" role="group">
                              <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                              <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{url('dashboard/report/'.$month_year)}}">Details</a></li>
                              </ul>
                            </div>
                        </td>

                    </tr>
                    @endforeach
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
