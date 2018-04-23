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
                      <select id="ticket-project-select" class="form-control mb-3 mr-sm-3" name="ticket-project-filter" {{ $project !== '' ? "disabled" : ""}}>
                        <option value>Select a project</option>
                        @foreach ( $projects as $project_name)
                          <option value="{{$project_name}}"  {{ strtolower($project) ===  strtolower($project_name) ? "selected" : "" }}>{{strtoupper($project_name)}}</option>
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
                    <input name="ticket-permission" data-type="view" type="hidden" value ="ticket-permission" >
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
