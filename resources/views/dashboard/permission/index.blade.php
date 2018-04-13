@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
              <div class="row ">
        <div class="col-md-12">
        @include('layout.alert')
          @if(isset($user_role_update) && $user_role_update)
            @include('dashboard.permission.userrole')
          @endif
            @include('dashboard.permission.table')     
          @include('layout.error')
        </div>
    </div>
  </div>
</div>
@endsection
