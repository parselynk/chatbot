@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
              <div class="row ">
        <div class="col-md-12">
          @include('layout.alert')
          <div class="card">
              <div class="card-header bg-light">
                  {{ $title }}
              </div>
              <div class="card-body">
                @include('dashboard.permission.table')
              </div>         
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
