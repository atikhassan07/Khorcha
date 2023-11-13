@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{ url('update/expense') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $editExpense->id }}">
            <input type="hidden" name="slug" value="{{ $editExpense->slug }}">

            <div class="card mb-3">
                <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Edit Expense
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="{{ url('all/expense') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All Expense</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Title<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <input type="text" class="form-control form_control" id="" name="title" value="{{ $editExpense->title }}">
                            @error('title')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Sub Title:</label>
                            <div class="col-sm-7">
                                <input type="text" class="form-control form_control" id="" name="sub_title" value="{{ $editExpense->sub_title }}">
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
                            <label class="col-sm-3 col-form-label col_form_label">Expense Ammount<span class="req_star">*</span>:</label>
                                <div class="col-sm-7">
                                    <input type="number" class="form-control form_control" id="" name="ammount" value="{{ $editExpense->ammount }}">
                                    @error('ammount')
                                    <span class="text-danger">{{ $message }}</span>
                                    @enderror
                                </div>
                            </div>
                    @php
                        $allCategory= App\Models\Expensecategory::where('status',1)->orderBy('id','DESC')->get();
                    @endphp
                    <div class="row mb-3">
                        <label class="col-sm-3 col-form-label col_form_label">Select Category<span class="req_star">*</span>:</label>
                        <div class="col-sm-7">
                            <select name="expcate_id" class="form-control form_control">
                                <option value="" selected disabled>Choosse a Category</option>
                                @foreach ($allCategory as $category)
                                    <option value="{{ $category->id }}" @if ($category->id == $editExpense->id)selected @endif>{{ $category->expcate_name }}</option>
                                @endforeach
                            </select>
                        @error('expcate_id')
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
                <button type="submit" class="btn btn-sm btn-dark">Add Expense</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection
