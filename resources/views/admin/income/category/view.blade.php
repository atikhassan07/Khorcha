@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>View Expense Caegory Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{ url('all/expense/category') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Expense Category</a>
                </div>
            </div>
            </div>
            <div class="card-body">
            <div class="row">
                <div class="col-md-2"></div>
                <div class="col-md-8">
                    <table class="table table-bordered table-striped table-hover custom_view_table">
                        <tr>
                        <td>Category Name</td>
                        <td>:</td>
                        <td>{{ $viewCategory->incate_name }}</td>
                        </tr>
                        <tr>
                        <td>Remarks</td>
                        <td>:</td>
                        <td>{{ $viewCategory->remarks }}</td>
                        </tr>
                        <tr>
                        <td>Creator Name</td>
                        <td>:</td>
                        <td>{{ $viewCategory->CreatorInfo->name}}</td>
                        </tr>
                        <tr>
                        <td>Created Time</td>
                        <td>:</td>
                        <td>
                            {{ $viewCategory->created_at->diffForHumans() }}<br>
                        </td>
                        </tr>
                        <tr>
                        <td>Update Time</td>
                        <td>:</td>
                        <td>
                            {{ $viewCategory->updated_at->diffForHumans() }}<br>
                        </td>
                        </tr>
                    </table>
                </div>
                <div class="col-md-2"></div>
            </div>
            </div>
            <div class="card-footer">
            <div class="btn-group" role="group" aria-label="Button group">
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection


