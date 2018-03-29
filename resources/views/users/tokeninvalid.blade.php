@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
    	      <div class="col-md-5">
                    <div class="card p-4">
                        <div class="card-header text-center text-uppercase h4 font-weight-light">
                            {{ $message }}
                        </div>
                        <div class="card-footer">
                            Please click <strong> <u><a href="/forgotpassword"> here</a></u></strong> to try again.
                        </div>
                    </div>
                </div>
              </div>
			</div>
        </div>
@endsection