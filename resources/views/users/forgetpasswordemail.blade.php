@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
    	      <div class="col-md-5">
                @include('layout.alert')
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Please provide your email
                    </div>
                    <form method="POST" action="/forgotpassword">
                        {{ csrf_field() }}
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input name="email" type="email" class="form-control">
                            </div>
                            @include('layout.error')
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block">Send Email</button>
                        </div>
                    </div>
                 </form>
              </div>
			</div>
        </div>
    </div>
@endsection