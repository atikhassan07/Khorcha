@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{ url('store/expense/category') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Add Expense Category
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{ url('all/expense/category') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Expense Category</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Expense Category<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="expcate_name" value="{{ old('expcate_name') }}">
                        @error('expcate_name')
                         <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>

                    </div>

                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Remarks:</label>
                    <div class="col-sm-7">
                        <textarea name="remarks" class="form-control"></textarea>
                    </div>
                </div>


                <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm btn-dark">Add Expense Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
