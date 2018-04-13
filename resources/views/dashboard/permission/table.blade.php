<form method="POST" action="{{$action}}">
@if(isset($rows) && count($rows) > 0)
  <div class="card">
      <div class="card-header bg-light">
        {{ $title }}
      </div>
      <div class="card-body">
        {{ csrf_field() }}
          <table class="table table-hover table-responsive-md table-light">
            <thead class="text-center">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">View</th>
                <th scope="col">Create</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
             <tfoot class="text-center">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">View</th>
                <th scope="col">Create</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </tfoot>
            <tbody>
              @foreach($rows as $index=>$items )
                <thead class="thead-light">
                  <tr>
                    <th scope="col" colspan="5" class="text-align">{{ title_case($index) }} Permissions 
                     </th>
                  </tr>
                </thead>
                @foreach($items as $index=>$row )
                  <tr class="text-center">
                    <th scope="row">{{ title_case($index) }}</th>
                      <td >
                        @if(array_key_exists('view', $row))
                          <input name="{{$row['view']}}" data-type="view" type="checkbox" value ="{{$row['view']}}" {{($model->hasPermissionTo($row['view'])) ? "checked" : "" }}>
                        @else 
                          NA
                        @endif
                      </td>
                      <td class="text-center">                             
                        @if(array_key_exists('create', $row))
                          <input name="{{$row['create']}}" data-type="create" type="checkbox" value ="{{$row['create']}}" {{($model->hasPermissionTo($row['create'])) ? "checked" : "" }} >
                        @else 
                          NA
                        @endif
                      </td>
                      <td class="text-center">
                        @if(array_key_exists('update', $row))
                          <input name="{{$row['update']}}" data-type="update" type="checkbox" value ="{{$row['update']}}" {{($model->hasPermissionTo($row['update'])) ? "checked" : "" }}>
                        @else 
                          NA
                        @endif
                      </td>
                      <td class="text-center">
                        @if(array_key_exists('delete', $row))
                          <input name="{{$row['delete']}}" data-type="delete" type="checkbox" value ="{{$row['delete']}}" {{($model->hasPermissionTo($row['delete'])) ? "checked" : "" }}>
                        @else 
                          NA
                        @endif
                      </td>
                  </tr>
                @endforeach
              @endforeach
            </tbody>
          </table>
          @if(!isset($ticket_permissions) || count($ticket_permissions) === 0 ) 
            <div class="row float-right p-3">
                <button type="submit" class="btn btn-primary">Save changes</button>
            </div>
          @endif
      </div>
    </div>
    @endif
    @if(isset($ticket_permissions) && count($ticket_permissions) > 0)
      <div class="card">
          <div class="card-header bg-light">
              Access Permissions 
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
@endif 

  @if (isset($model->id))
    <input name="model-id" type="hidden" value ="{{$model->id}}">
  @endif
</form>   

