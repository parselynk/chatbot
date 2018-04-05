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
              @can('sa-create-permission')
                <div class="row">
                  <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            @include('layout.alert')
                            <form class="form-inline" method="POST" action="/permission/create">
                              {{ csrf_field() }}
                              <select id="category-select" class="form-control mb-3 mr-sm-3 col-1" name="category">
                                  <option value>Category</option>
                                  <option value="sa">Super Admin</option>
                                  <option value="a">Admin</option>
                                  <option value="ms">miscellaneous</option>
                              </select>
                              <div class="form-group">
                                <input name="name" type="text" class="form-control mb-3 mr-sm-3" placeholder="Name">
                              </div>
                                  <select id="action-select" class="form-control mb-3 mr-sm-3 col-1" name="action">
                                  <option value>Action</option>
                                  <option value="view">View</option>
                                  <option value="create">Create</option>
                                  <option value="update">Update</option>
                                  <option value="delete">Delete</option>
                              </select>
                                <button type="submit" class="btn btn-primary mb-3">Add permission</button>
                            </form>
                        </div>
                    </div>
                  </div>
                </div>
                @endcan
                @include('dashboard.permission.list')
              </div>         
          </div>
        </div>
    </div>
  </div>
</div>
@endsection
