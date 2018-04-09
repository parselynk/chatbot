@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
              <div class="row ">
        <div class="col-md-12">
          <div class="card">
              <div class="card-header bg-light">
                  {{ $title }}
              </div>
              <div class="card-body">
                @include('layout.alert')
                  @if(isset($remaining_permissions) && count($remaining_permissions) > 0 ) 
                    @hasanyrole('super admin')
                      <div class="row">
                        <div class="col-md-12">
                          <div class="card">
                              <div class="card-body">
                                  <form class="form-inline" method="POST" action="/permission/create">
                                    {{ csrf_field() }}
                                    <select id="category-select" class="form-control mb-3 mr-sm-3 col-1" name="permission">
                                      <option value>Permissions</option>
                                      @foreach($remaining_permissions as $permission)
                                        <option value={{ $permission }}>{{ $permission }}</option>
                                      @endforeach
                                     </select>
                                    <button type="submit" class="btn btn-primary mb-3">Add permission</button>
                                  </form>
                              </div>
                          </div>
                        </div>
                      </div>
                    @else 
                      @can('sa-create-permission')
                        <div class="row">
                          <div class="col-md-12">
                            <div class="card">
                                <div class="card-body">
                                    <form class="form-inline" method="POST" action="/permission/create">
                                      {{ csrf_field() }}
                                      <select id="category-select" class="form-control mb-3 mr-sm-3 col-1" name="permission">
                                        <option value>Permissions</option>
                                        @foreach($remaining_permissions as $permission)
                                          <option value={{ $permission }}>{{ $permission }}</option>
                                        @endforeach
                                      </select>
                                      <button type="submit" class="btn btn-primary mb-3">Add permission</button>
                                    </form>
                                </div>
                            </div>
                          </div>
                        </div>
                      @endcan
                  @endhasanyrole
                @endif
                @include('dashboard.permission.list')
              </div>         
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
