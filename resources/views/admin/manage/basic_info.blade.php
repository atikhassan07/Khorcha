@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{ url('dashboard/basic/info/update') }}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i>App Basic Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>Contact Information</a>
                    </div>
                </div>
              </div>
              <div class="card-body">
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                      @if(Session::has('success'))
                        <div class="alert alert-success alert_success" role="alert">
                           <strong>Success!</strong> {{Session::get('success')}}
                        </div>
                      @endif
                      @if(Session::has('error'))
                        <div class="alert alert-danger alert_error" role="alert">
                           <strong>Opps!</strong> {{Session::get('error')}}
                        </div>
                      @endif
                    </div>
                    <div class="col-md-2"></div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Company<span class="req_star">*</span>:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="company_name" value="{{ $basicInfo->company_name }}">
                      @error('company_name')
                          <span class="text-danger">{{ $message }}</span>
                      @enderror
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Company Title:</label>
                    <div class="col-sm-7">
                      <input type="text" class="form-control form_control" id="" name="company_title" value="{{ $basicInfo->company_title }}">
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Logo:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="main_logo" onchange="document.getElementById('main_logo').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="col-md-2">
                        @if ($basicInfo->main_logo == '')
                           <img height="100" src="{{asset('admin/images/avatar.png')}}" alt="Logo" id="main_logo"/>
                        @else
                           <img height="50" src="{{asset('uploads/logos')}}/{{ $basicInfo->main_logo }}" id="main_logo" alt="Logo"/>
                        @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Favicon:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="favicon" onchange="document.getElementById('favicon').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="col-md-2">
                        @if ($basicInfo->favicon == '')
                        <img height="100" src="{{asset('admin/images/avatar.png')}}" alt="Logo" id="favicon"/>
                     @else
                        <img height="100" src="{{asset('uploads/logos')}}/{{ $basicInfo->favicon }}" alt="Logo" id="favicon"/>
                     @endif
                    </div>
                  </div>
                  <div class="row mb-3">
                    <label class="col-sm-3 col-form-label col_form_label">Footer Logo:</label>
                    <div class="col-sm-4">
                      <input type="file" class="form-control form_control" id="" name="footer_logo" onchange="document.getElementById('footer_logo').src = window.URL.createObjectURL(this.files[0])">
                    </div>
                    <div class="col-md-2">
                        @if ($basicInfo->footer_logo == '')
                        <img height="100" src="{{asset('admin/images/avatar.png')}}" alt="Logo" id="footer_logo"/>
                     @else
                        <img height="50" src="{{asset('uploads/logos')}}/{{ $basicInfo->footer_logo }}" alt="Logo" id="footer_logo"/>
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
