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
                    <form method="POST" action="/resetpassword">
                        {{ csrf_field() }}
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Current Password</label>
                                <input name="current-password" type="password" class="form-control">
                            </div>
                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input name="new-password" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Confirm Password</label>
                                <input name="new-password_confirmation" id="new-password_confirmation" type="password" class="form-control">
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