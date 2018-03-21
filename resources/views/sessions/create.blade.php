@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
    	      <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Login
                    </div>

                    <div class="card-body py-5">
                        <div class="form-group">
                            <label class="form-control-label">Email</label>
                            <input type="email" class="form-control">
                        </div>

                        <div class="form-group">
                            <label class="form-control-label">Password</label>
                            <input type="password" class="form-control">
                        </div>

                        <div class="custom-control custom-checkbox mt-4">
                            <input type="checkbox" class="custom-control-input" id="login">
                            <label class="custom-control-label" for="login">Check this custom checkbox</label>
                        </div>
                    </div>

                    <div class="card-footer">
                        <div class="row">
                            <div class="col-6">
                                <button type="submit" class="btn btn-primary px-5">Login</button>
                            </div>

                            <div class="col-6">
                                <a href="#" class="btn btn-link">Forgot password?</a>
                            </div>
                        </div>
                    </div>
                </div>
              </div>
			</div>
        </div>
    </div>
@endsection