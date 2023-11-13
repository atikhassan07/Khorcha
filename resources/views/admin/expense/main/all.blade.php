@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>All Expense Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{ url('add/expense') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add Expense</a>
                </div>
            </div>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped table-hover custom_table" id="example">
                <thead class="table-dark">
                <tr>
                    <th>SL NO:</th>
                    <th>Title</th>
                    <th>Expense Category Name</th>
                    <th>Expense Ammount</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>

                    @foreach ($expenses as $key=> $expense)
                    <tr>
                        <td>{{$key+1 }}</td>
                        <td>{{ $expense->title }}</td>
                        <td>{{ $expense->rel_to_excategory->expcate_name }}</td>
                        <td>{{ $expense->ammount }}</td>
                        <td>
                            <div class="btn-group btn_group_manage" role="group">
                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="{{ url('view/expense',$expense->slug) }}">View</a></li>
                                <li><a class="dropdown-item" href="{{ url('edit/expense',$expense->slug) }}">Edit</a></li>
                                <li><a class="dropdown-item" href="{{ url('soft/delete/expense',$expense->id) }}">Delete</a></li>
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
                <button type="button" class="btn btn-sm btn-dark">Print</button>
                <a href="{{ url('expense/pdf') }}" class="btn btn-sm btn-secondary">PDF</a>
                <button type="button" class="btn btn-sm btn-dark">Excel</button>
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

