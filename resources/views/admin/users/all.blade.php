@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="card mb-3">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>All User Information
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{ url('dashboard/add/user') }}" class="btn btn-sm btn-dark"><i class="fas fa-plus-circle"></i>Add User</a>
                </div>
            </div>
            </div>
            <div class="card-body">
            <table class="table table-bordered table-striped table-hover custom_table" id="example">
                <thead class="table-dark">
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Username</th>
                    <th>Role</th>
                    <th>Manage</th>
                </tr>
                </thead>
                <tbody>
                        @php
                            $roles = App\Models\Role::where('role_status',1)->get();
                        @endphp
                    @foreach ($allUser as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->phone }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->username }}</td>
                        <td>{{ $user->role }}</td>
                        <td>
                            <div class="btn-group btn_group_manage" role="group">
                            <button type="button" class="btn btn-sm btn-dark dropdown-toggle" data-bs-toggle="dropdown" aria-expanded="false">Manage</button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="view-user.html">View</a></li>
                                <li><a class="dropdown-item" href="edit-user.html">Edit</a></li>
                                <li><a class="dropdown-item" href="#">Delete</a></li>
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
                <button type="button" class="btn btn-sm btn-secondary">PDF</button>
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
