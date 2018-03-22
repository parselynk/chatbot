@if($tickets && count($tickets))
    <div class="row ">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                {{ $title }}
            </div>
            <div class="card-body">
              <div class="table-responsive">
                 <table id="example" class="table table-hover " cellspacing="0" width="100%">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Client</th>
                            <th>Department</th>
                            <th>Channel</th>
                            <th>Project</th>
                            <th>Date</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>ID</th>
                            <th>Title</th>
                            <th>Body</th>
                            <th>Client</th>
                            <th>Department</th>
                            <th>Channel</th>
                            <th>Project</th>
                            <th>Date</th>
                        </tr>
                    </tfoot>
                    <tbody>
                    @foreach($tickets as $ticket)
                        <tr>
                            <td>{{$ticket->id}}</td>
                            <td>{{$ticket->title}}</td>
                            <td>{{$ticket->body}}</td>
                            <td class="text-nowrap">{{$ticket->client->name . ' - ' .$ticket->client->email }}</td>
                            <td>{{$ticket->assignee->name }}</td>
                            <td>{{$ticket->channel}}</td>
                            <td>{{$ticket->project}}</td>
                            <td class="text-nowrap">{{$ticket->created_at}}</td>
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