@if($roles && count($roles))
    <div class="row ">
        <div class="col-md-12">
        <div class="card">
            <div class="card-body">
              <div class="table-responsive">
                 <table id="rolesTable" class="table table-hover " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Actions</th>                        
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                            <th>Actions</th>            
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($roles as $role)
                        <tr>
                            <td>{{$role->name}}</td>
                            <td>   
                            @if(count($role->permissions) > 0)     
                                @foreach($role->permissions as $permission) 
                                    <ul class="list-unstyled">
                                        <li>{{ $permission->name }}</li>
                                    </ul>
                                @endforeach
                            @else
                                NA
                            @endif
                            </td>
                            <td>
                            @hasanyrole('super admin')
                                <a class="btn btn-primary" href="{{url('/role/' . $role->id)}}" role="button">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            @else 
                                @can('sa-update-role')
                                    <a class="btn btn-primary" href="{{url('/role/' . $role->id)}}" role="button">
                                        <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                    </a>
                                @endcan
                            @endhasanyrole
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
              </div>
          </div>
          </div>
        </div>
    </div>
@endif