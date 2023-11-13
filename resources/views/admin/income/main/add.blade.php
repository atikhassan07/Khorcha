@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{ url('store/income') }}">
            @csrf
            <div class="card mb-3">
                <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Add Income
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{ url('all/income') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Income</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" id="" name="title" value="{{ old('title') }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Sub Title:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="sub_title" value="{{ old('sub_title') }}">
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Select Date<span class="req_star">*</span>:</label>
                                <div class="col-sm-7">
                                    <input type="date" class="form-control form_control" id="" name="date" value="{{ old('date') }}">
                                    @error('date')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                            <div class="row mb-3">
                            <label class="col-sm-3 col-form-label col_form_label">Income Ammount<span class="req_star">*</span>:</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control form_control" id="" name="ammount" value="{{ old('ammount') }}">
                                    @error('ammount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                    @php
                        $allCategory= App\Models\IncomeCategory::where('status',1)->orderBy('id','DESC')->get();
                    @endphp
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Select Category<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <select name="incate_id" class="form-control form_control">
                                <option value="" selected disabled>Choosse a Category</option>
                                @foreach ($allCategory as $category)
                                    <option value="{{ $category->id }}">{{ $category->incate_name }}</option>
                                @endforeach
                            </select>
                        @error('incate_id')
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
                <button type="submit" class="btn btn-sm btn-dark">Add Income</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
