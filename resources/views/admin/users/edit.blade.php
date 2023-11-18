@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="POST" action="{{ url('dashboard/update/user') }}" enctype="multipart/form-data">
            @csrf
                <input type="hidden" name="id" value="{{$users->id}}">
                <input type="hidden" name="slug" value="{{$users->slug}}">
            <div class="card mb-3">
                <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>Update User Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="all-user.html" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>All User</a>
                    </div>
                </div>
                </div>
                <div class="card-body">
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Name<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="name" value="{{ $users->name }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Phone:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="phone" value="{{ $users->phone }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Email<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="email" class="form-control form_control" id="" name="email" value="{{ $users->email }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Username<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control form_control" id="" name="username" value="{{ $users->username }}">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Password<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control form_control" id="" name="">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Confirm-Password<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                        <input type="password" class="form-control form_control" id="" name="">
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">User Role<span class="req_star">*</span>:</label>
                    <div class="col-sm-4">
                        @php
                          $allRole=App\Models\Role::where('role_status',1)->orderBy('id','ASC')->get();
                        @endphp
                        <select class="form-control form_control" id="" name="role_id">
                        <option>Select Role</option>
                            @foreach ($allRole as $role)
                            <option value="{{ $role->id }}" @if( $role->id == $users->role) selected @endif>{{ $role->role_name }}</option>
                            @endforeach
                        </select>
                    </div>
                    </div>
                    <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Photo:</label>
                    <div class="col-sm-4">
                        <input type="file" class="form-control form_control" id="" name="image" id="" name="footer_logo" onchange="document.getElementById('blah').src = window.URL.createObjectURL(this.files[0])">

                    </div>
                    <div class="col-sm-5">

                            @if ($users->image == null)
                                <img id="blah" width="100px" src="{{ asset('admin/images/avatar.png') }}" alt="">
                            @else
                                <img id="blah" width="100px"  src="{{ asset('uploads/user_image'.$users->image) }}" alt="">
                            @endif

                    </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                <button type="submit" class="btn btn-sm btn-dark">UPDATE</button>
                </div>
            </div>
        </form>
    </div>
</div>
 @endsection
