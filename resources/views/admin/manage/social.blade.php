@extends('layouts.admin')
@section('content')
<div class="row">
    <div class="col-md-12 ">
        <form method="post" action="{{ url('dashboard/social/update') }}" enctype="multipart/form-data">
          @csrf
            <div class="card mb-3">
              <div class="card-header">
                <div class="row">
                    <div class="col-md-8 card_title_part">
                        <i class="fab fa-gg-circle"></i> Social Media Information
                    </div>
                    <div class="col-md-4 card_button_part">
                        <a href="" class="btn btn-sm btn-dark"><i class="fas fa-th"></i>Basic Information</a>
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
                <div class="row">
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-facebook"></i></span>
                      <input type="text" class="form-control" name="facebook" value="{{ $socialMedia->facebook }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-twitter"></i></span>
                      <input type="text" class="form-control" name="twitter" value="{{ $socialMedia->twitter }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-linkedin"></i></span>
                      <input type="text" class="form-control" name="linkedin" value="{{ $socialMedia->linkedin }}">

                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-youtube"></i></span>
                      <input type="text" class="form-control" name="youtube" value="{{ $socialMedia->youtube }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-instagram"></i></span>
                      <input type="text" class="form-control" name="instagram" value="{{ $socialMedia->instagram }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-pinterest"></i></span>
                      <input type="text" class="form-control" name="pinterest" value="{{ $socialMedia->pinterest }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-behance-square"></i></span>
                      <input type="text" class="form-control" name="behance" value="{{ $socialMedia->behance }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-whatsapp"></i></span>
                      <input type="text" class="form-control" name="whatsapp" value="{{ $socialMedia->whatsapp }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-telegram"></i></span>
                      <input type="text" class="form-control" name="telegram" value="{{ $socialMedia->telegram }}">
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="input-group mb-3">
                      <span class="input-group-text"><i class="fab fa-github"></i></span>
                      <input type="text" class="form-control" name="github" value="{{ $socialMedia->github }}">
                    </div>
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
@section('script')

@endsection
