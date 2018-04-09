@if($users && count($users))
    <div class="row ">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                {{ $title }}
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table id="usersTable" class="table table-hover " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>                        
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Actions</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
                            <td>   
                            @if(count($user->getRoleNames()) > 0)     
                                @foreach($user->getRoleNames() as $role) 
                                    <ul class="list-unstyled">
                                        <li>{{ $role }}</li>
                                    </ul>
                                @endforeach
                            @else
                                NA
                            @endif
                            </td>
                            <td>
                            @hasanyrole('super admin')
                                 <a class="btn btn-primary" href="{{url('/permission/' . $user->id)}}" role="button">
                                            <i class="fa fa-pencil-square-o" aria-hidden="true"></i>
                                </a>
                            @else 
                                 @can('sa-update-user')
                                    <a class="btn btn-primary" href="{{url('/permission/' . $user->id)}}" role="button">
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