<form method="POST" action="{{$action}}">
@if(isset($rows) && count($rows) > 0)
  <div class="card">
      <div class="card-header bg-light">
        {{ $title }}
      </div>
      <div class="card-body">
        {{ csrf_field() }}
          <table class="table table-hover table-responsive-md table-light">
            <thead class="">
              <tr>
                <th scope="col">Action</th>
                <th scope="col">View</th>
                <th scope="col">Create</th>
                <th scope="col">Update</th>
                <th scope="col">Delete</th>
              </tr>
            </thead>
             <tfoot class="">
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
                  <tr class="">
                    <th scope="row">{{ title_case($index) }}</th>
                      <td >
                        @if(array_key_exists('view', $row))
                          <input name="{{$row['view']}}" data-type="view" type="checkbox" value ="{{$row['view']}}" {{($model->hasPermissionTo($row['view'])) ? "checked" : "" }}>
                        @else 
                          NA
                        @endif
                      </td>
                      <td class="">                             
                        @if(array_key_exists('create', $row))
                          <input name="{{$row['create']}}" data-type="create" type="checkbox" value ="{{$row['create']}}" {{($model->hasPermissionTo($row['create'])) ? "checked" : "" }} >
                        @else 
                          NA
                        @endif
                      </td>
                      <td class="">
                        @if(array_key_exists('update', $row))
                          <input name="{{$row['update']}}" data-type="update" type="checkbox" value ="{{$row['update']}}" {{($model->hasPermissionTo($row['update'])) ? "checked" : "" }}>
                        @else 
                          NA
                        @endif
                      </td>
                      <td class="">
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
        @if (isset($model->id))
          <input name="model-id" type="hidden" value ="{{$model->id}}">
        @endif
        <div class="row float-right p-3">
            <button type="submit" class="btn btn-primary">Save changes</button>
        </div>
    </div>
  </div>
@endif
@if( ends_with(get_class($model),'User') && $model->hasRole('miscellaneous') )

</form>   
      <div class="card">
          <div class="card-header bg-light">
              Access Permissions 
          </div>
          <div class="card-body">
          @if(isset($ticket_permissions) && count($ticket_permissions) > 0)
            <table class="table table-hover table-responsive-md table-light">
              <thead class="">
                <tr>
                  <th scope="col">Project</th>
                  <th scope="col">Assignee(s)</th>
                  <th scope="col">Channel(s)</th>
                  <th scope="col">Actions</th>
                </tr>
              </thead>
               <tfoot class="">
                <tr>
                  <th scope="col">Project</th>
                  <th scope="col">Assignee(s)</th>
                  <th scope="col">Channel(s)</th>
                  <th scope="col">Actions</th>
                </tr>
              </tfoot>
              <tbody>
                @foreach($ticket_permissions as $project=>$permissions)
                 <tr class="">
                    <td class="">  
                      {{strtoupper($project)}}
                    </td>
                    <td class="">  
                      @if(isset($permissions['assignees']) && $permissions['assignees'] != '')      
                        <ul class="list-unstyled">                     
                          @foreach($permissions['assignees']  as $assignee=>$items)
                             <li class="mt-1"> - {{title_case($assignee)}}</li>
                          @endforeach
                        </ul>
                      @endif
                    </td>
                    <td class="">  
                      @if(isset($permissions['channels']) && $permissions['channels'] != '')    
                        <ul class="list-unstyled">                     
                          @foreach($permissions['channels']  as $channel=>$items)
                             <li class="mt-1"> - {{title_case($channel)}}</li>
                          @endforeach
                        </ul>
                      @endif
                    </td>
                    <td class="">  
                      <a class="btn btn-primary" href="{{url("permission/{$model->id}/ticket/$project")}}" role="button">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                      </a>
                    </td>
                 </tr>
                @endforeach
              </tbody>
            </table>
           @else
              <p class="text-danger">This user has no permission to access tickets.</p>
           @endif
          <div class="row float-right p-3">
            @if (isset($model->id))
              <a class="btn btn-primary" href="{{url("permission/{$model->id}/ticket")}}" role="button">Add ticket permission</a>
            @endif
          </div>
        </div>
      @endif
      </div>

