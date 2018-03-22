@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            <div class="row justify-content-center">
    	      <div class="col-md-5">
                @include('layout.alert')
                <div class="card p-4">
                    <div class="card-header text-center text-uppercase h4 font-weight-light">
                        Update Account
                    </div>
                    <form method="POST" action="/profile/update">
                        {{ csrf_field() }}
                        <div class="card-body py-5">
                            <div class="form-group">
                                <label class="form-control-label">Name</label>
                                <input name="name" type="name" class="form-control" value="{{ $user->name }}">
                            </div>

                            <div class="form-group">
                                <label class="form-control-label">Email</label>
                                <input name="email" type="email" class="form-control" value="{{ $user->email }}">
                            </div>
                            @include('layout.error')
                        </div>
                        <div class="card-footer">
                            <button type="submit" class="btn btn-success btn-block">Update</button>
                        </div>
                    </div>
                 </form>
              </div>
			</div>
        </div>
    </div>
@endsection