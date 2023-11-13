@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{ url('store/income/category') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Add Income Category
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{ url('all/income/category') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Income Category</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">income Category<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="incate_name" value="{{ old('incate_name') }}">
                        @error('incate_name')
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
                <button type="submit" class="btn btn-sm btn-dark">Add Income Category</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
