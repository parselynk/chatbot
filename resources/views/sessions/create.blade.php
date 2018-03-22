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
                    <form method="POST" action="/login">
                        {{ csrf_field() }}
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input name="email" type="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>
                            @include('layout.error')
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
                    </form>
                </div>
              </div>
			</div>
        </div>
    </div>
@endsection