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
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Email</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($users as $user)
                        <tr>
                            <td>{{$user->name}}</td>
                            <td>{{$user->email}}</td>
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