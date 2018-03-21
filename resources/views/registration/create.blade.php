@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
    	      <div class="col-md-5">
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Register a new User
                    </div>
                    <form method="POST" action="/register">
                        {{ csrf_field() }}
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input name="name" type="name" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input name="email" type="email" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Password</label>
                                <input name="password" type="password" class="form-control">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Confirm Password</label>
                                <input name="password_confirmation" id="password_confirmation" type="password" class="form-control">
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block">Create User</button>
                        </div>
                    </div>
                 </form>
              </div>
			</div>
        </div>
    </div>
@endsection