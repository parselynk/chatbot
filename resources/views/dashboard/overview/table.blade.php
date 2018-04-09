@if(isset($filters) && count($filters) > 0)
    <div class="row">
      <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                Filters
            </div>
            <div class="card-body">
                <form class="form-inline" method="GET" action="{{ request()->path() }}">
                <div class="form-group w-5">
                    <label for="start-date" class="mb-3 mr-1" >Since:</label>
                    <input id="start-date" name="startdate-filter"  class="form-control mb-3 mr-sm-3 datepicker " style="width: auto" value = "{{ empty(request('startdate-filter')) || request('startdate-filter') ? request('startdate-filter') : Carbon\Carbon::today()->subWeek()->format('Y-m-d') }}">
                </div>
                <div class="form-group w-5">
                    <label for="start-date" class="mb-3 mr-1" >Until:</label>
                    <input id="end-date" name="enddate-filter"  class="form-control mb-3 mr-sm-3 datepicker " value = "{{ empty(request('enddate-filter')) || request('enddate-filter') ? request('enddate-filter') : Carbon\Carbon::today()->format('Y-m-d') }}">
                </div>
                    <select id="project-select" class="form-control mb-3 mr-sm-3 col-1" name="project-filter">
                        <option value>All Projects</option>
                        @foreach($filters as $filter)
                            @if($filter['project'])
                                <option value="{{$filter['project']}}" 
                                    @if(request('project-filter') && request('project-filter') == $filter['project']) 
                                        selected
                                    @endif
                                >{{$filter['project']}}
                                </option>
                            @endif
                        @endforeach
                    </select>
                    <select id="channel-select" class="form-control mb-3 mr-sm-3 col-1" name="channel-filter">
                        <option value>All Channels</option>
                        @foreach($filters as $filter)
                            @if($filter['channel'])
                                <option value="{{$filter['channel']}}"
                                @if(request('channel-filter') && request('channel-filter') == $filter['channel']) 
                                    selected
                                @endif
                                >{{$filter['channel']}}</option>
                            @endif
                        @endforeach
                    </select>
                    <select id="assignee-select" class="form-control mb-3 mr-sm-3 col-1" name="assignee-filter">
                        <option value>All Assignees</option>
                        @foreach($filters as $filter)
                            @if($filter['assignee'])
                                <option value="{{$filter['assignee']}}"
                                @if(request('assignee-filter') && request('assignee-filter') == $filter['assignee']) 
                                    selected
                                @endif
                                >{{$filter['assignee']}}</option>
                            @endif
                        @endforeach                             
                    </select>
                    <button type="submit" class="btn btn-primary mb-3 col-1">Search</button>
                    <a class="btn btn-secondary ml-2 mb-3 col-1" href="{{ url()->current() }}" role="button">Reset</a>
                </form>
            </div>
        </div>
      </div>
    </div>
@endif
    <div class="row ">
        <div class="col-md-12">
        <div class="card">
            <div class="card-header bg-light">
                {{ $title }}
            </div>
            @if($tickets && count($tickets) > 0 )
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
          @else 
             <div class="card-body text-center text-danger"><h3 class='p-5'> No ticket has been issued since 7 days ago </h3></div>
          @endif
          </div>
        </div>
    </div>

