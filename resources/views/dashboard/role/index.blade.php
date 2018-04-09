@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
              <div class="row ">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-light">
                  Roles
              </div>
              <div class="card-body">
                @include('dashboard.role.table')
              </div>         
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
