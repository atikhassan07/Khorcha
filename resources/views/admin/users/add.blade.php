@extends('layouts.admin')
@section('content')
<div class="row">
<div class="col-md-12 ">
    <form method="post" action="{{ url('dashboard/store/user') }}" enctype="multipart/form-data">
        @csrf
        <div class="card mb-3">
            <div class="card-header">
            <div class="row">
                <div class="col-md-8 card_title_part">
                    <i class="fab fa-gg-circle"></i>User Registration
                </div>
                <div class="col-md-4 card_button_part">
                    <a href="{{ url('dashboard/all/user') }}" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                </div>
            </div>
            </div>
            <div class="card-body">
                <div class="row mb-3">
                    @if(Session::has('success'))
                        <div class="alert alert-success alart_success" role="alart">
                            <strong>Success!</strong>{{Session::get('success')}}
                        </div>
                        @endif
                        @if(Session::has('error'))
                            <div class="alert alert-danger alart_error" role="alart">
                                <strong>Opps!</strong>{{Session::get('error')}}
                            </div>
                        @endif
                    <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="name" value="{{ old('name') }}">
                        @error('name')
                                <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="phone" value="{{ old('phone') }}">
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control form_control" id="" name="email" value="{{ old('email') }}">
                            @error('email')
                                <span class="text-danger"><b>{{ $message }}</b></span>
                            @enderror
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="username" value="{{ old('username') }}">
                        @error('username')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control form_control" id="" name="password">
                            @error('password')
                                <span class="text-danger"><b>{{ $message }}</b></span>
                            @enderror
                    </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control form_control" id="" name="confirm_password">
                            @error('confirm_password')
                                    <span class="text-danger"><b>{{ $message }}</b></span>
                            @enderror
                    </div>
                </div>
                <div class="row mb-3">
                  <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                        @php
                            $roles = App\Models\Role::where('role_status',1)->get();
                        @endphp
                            <select class="form-control form_control" id="" name="role">
                                <option>Select Role</option>
                                @foreach ($roles as $role)
                                    <option value="{{ $role->id }}">{{ $role->role_name }}</option>
                                @endforeach
                            </select>
                        @error('role')
                            <span class="text-danger"><b>{{ $message }}</b></span>
                        @enderror
                    </div>
                </div>
                <div class="row mb-3">
                <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                <div class="col-sm-4">
                    <input type="file" class="form-control form_control" id="" name="image">
                </div>
                </div>
            </div>
            <div class="card-footer text-center">
            <button type="submit" class="btn btn-sm btn-dark">REGISTRATION</button>
            </div>
        </div>
    </form>
</div>
</div>
@endsection
