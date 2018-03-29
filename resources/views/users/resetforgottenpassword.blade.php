@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
    	      <div class="col-md-5">
                @include('layout.alert')
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Reset Password 
                    </div>
                    <form method="POST" action="/resetforgottenpassword">
                        {{ csrf_field() }}
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Confirm Password</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control">
                                 <input name="email" id="email" type="hidden" value="{{ $user->email }}" class="form-control">

                            </div>
                            @include('layout.error')
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block">Reset Password</button>
                        </div>
                    </div>
                 </form>
              </div>
			</div>
        </div>
    </div>
@endsection