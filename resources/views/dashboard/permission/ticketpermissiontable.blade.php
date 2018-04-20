<!-- @if(isset($ticket_permissions) && count($ticket_permissions) > 0)
  <div class="card">
      <div class="card-header bg-light">
          Ticket Permissions 
      </div>
        <div class="card-body">
          <div class="card-group">
            @foreach($ticket_permissions as $title=>$permissions)
              <div class="card m-4 p-0 ">
                <div class="card-block ">
                      <span class="h4 d-block font-weight-normal p-2">{{ $title }}</span>
                    <ul class="list-group list-group-flush">
                        @foreach($permissions as $permission=>$row)
                            <li class="list-group-item"> 
                              @if(array_key_exists('view', $row))
                                &nbsp;&nbsp;<input name="{{title_case($row['view'])}}" data-type="view" type="checkbox" value ="{{strtolower($row['view'])}}" 
                                {{ (in_array(strtolower($row['view']), $registered_permissions)) ? ($model->hasPermissionTo(strtolower($row['view']))) ? "checked" : "" : ""}} >
                                <strong>{{ title_case($permission) }} </strong>
                              @endif
                            </li>
                        @endforeach
                    </ul> 
                  </div>
              </div>
            @endforeach
          </div> 
          <div class="row float-right p-3">
              <button type="submit" class="btn btn-primary">Save changes</button>
          </div>
      </div>
    </div>
@endif  -->
@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
      <div class="row ">
        <div class="col-md-12">
          @include('layout.alert')
          <div class="card">
            <div class="card-header bg-light">
                {{ $page_title }}
            </div>
              <div class="card-body">
                <div class="card md-col-6">
                  <div class="card-header bg-light">
                   <form class="form-inline" method="post" action="{{ $action }}">
                    <div class="form-group">
                      <label for="ticket-project-select" class="mb-3 mr-1" >Project:</label>
                      <select id="ticket-project-select" class="form-control mb-3 mr-sm-3" name="ticket-project-filter">
                        <option value>Select a project</option>
                        @foreach ( $projects as $project_name)
                          <option value="{{$project_name}}"  {{ strtolower($project) ===  strtolower($project_name) ? "selected" : "" }}>{{$project_name}}</option>
                        @endforeach
                      </select>  
                    </div>
                  </form>
                  </div>
                  @if(isset($ticket_permissions[$project]) && count($ticket_permissions[$project]) > 0)
                  <form method="post" action="/permission">
                        {{ csrf_field() }}
                   <div class="card-group">
                     <div class="card m-4">
                        <span class="h4 d-block font-weight-normal p-2">Assignees</span>
                        <ul class="list-group list-group-flush">
                        @foreach($ticket_permissions[$project]['assignees'] as $key => $value)
                          <li class="list-group-item"> 
                            &nbsp;&nbsp;<input name="{{strtolower($value)}}" data-type="view" type="checkbox" value ="{{strtolower($value)}}" {{ (in_array(strtolower($value), $registered_permissions)) ? ($user->hasPermissionTo(strtolower($value))) ? "checked" : "" : "" }} >
                            <strong>{{ title_case($key) }}</strong>
                          </li>
                        @endforeach
                        </ul> 
                      </div>
                      <div class="card m-4">
                        <span class="h4 d-block font-weight-normal p-2">Channels</span>
                        <ul class="list-group list-group-flush">
                          @foreach($ticket_permissions[$project]['channels'] as $key => $value)
                          <li class="list-group-item"> 
                            &nbsp;&nbsp;<input name="{{strtolower($value)}}" data-type="view" type="checkbox" value ="{{strtolower($value)}}" {{ (in_array(strtolower($value), $registered_permissions)) ? ($user->hasPermissionTo(strtolower($value))) ? "checked" : "" : "" }} >
                            <strong>{{ title_case($key) }}</strong>
                          </li>
                        @endforeach
                        </ul> 
                      </div>
                  </div>
                    <input name="model-id" data-type="view" type="hidden" value ="{{ $user->id }}" >
                    <div class="form-group float-right p-3 mr-2">
                      <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                  @endif
                  </div>

                </div> 
            </div>
          </div>
          @include('layout.error')
        </div>
    </div>
  </div>
</div>
@endsection
