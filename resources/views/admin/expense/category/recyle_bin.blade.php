@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>Recyle Bin
                </div>
                {{-- <div class="col-md-4 card_button_part">
                    <a href="{{ url('add/income/category') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Income Category</a>
                </div> --}}
            </div>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped table-hover custom_table">
                <thead class="table-dark">
                <tr>
                    <th>SL NO:</th>
                    <th>Income Category Name</th>
                    <th>Remaks</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                    @foreach ($recyleBin as $key=> $category)
                    <tr>
                        <td>{{$key+1 }}</td>
                        <td>{{ $category->incate_name }}</td>
                        <td>{{ $category->remarks }}</td>
                        <td>
                            <a href="{{ url('restore/income/category',$category->id) }}" class="btn btn-success btn-sm" id="restore"><i class="fas fa-trash-restore"></i></a>
                            <a href="{{ url('delete/income/category',$category->id) }}" class="btn btn-danger btn-sm" id="delete"><i class="fas fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach


                </tbody>
            </table>
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
