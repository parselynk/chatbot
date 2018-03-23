@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            @include('dashboard.overview.card', ['items' => $projects , 'title' => 'Projects Overview'])
            @include('dashboard.overview.card', ['items' => $assignees , 'title' => 'Assignees Overview'])
            @include('dashboard.overview.card', ['items' => $channels , 'title' => 'Channels Overview'])
            <div class="row">
    	      <div class="col-md-12">
                <div class="card">
                    <div class="card-header bg-light">
                        Filters
                    </div>
                    <div class="card-body">
                    	<form class="form-inline" method="GET" action="/">
                            <select id="date-select" class="form-control mb-3 mr-sm-3 col-2" name="date-filter">
	                            <option value>Select Date</option>
	                            <option value="2 weeks ago"
	        						@if(request('date-filter') && request('date-filter') == '2 weeks ago') 
										selected
									@endif
	                            >Last 2 weeks</option>
	                            <option value="3 weeks ago"
				        			@if(request('date-filter') && request('date-filter') == '3 weeks ago') 
										selected
									@endif
	                            >Last 3 weeks</option>
	                            <option value="last month"
				        			@if(request('date-filter') && request('date-filter') == 'last month') 
										selected
									@endif
	                            >Last Month</option>
	                            <option value="first day of this month"
				        			@if(request('date-filter') && request('date-filter') == 'first day of this month') 
										selected
									@endif
	                            >This Month</option>	                            
	                            <option value="2 months ago"
				        			@if(request('date-filter') && request('date-filter') == '2 months ago') 
										selected
									@endif	  
								>Last 2 Months</option>
	                            <option value="3 months ago"
				        			@if(request('date-filter') && request('date-filter') == '3 months ago') 
										selected
									@endif	 
	                            >Last 3 Months</option>
	                            <option value="first day of january this year"
				        			@if(request('date-filter') && request('date-filter') == 'first day of january this year') 
										selected
									@endif	 	                            
								>This Year</option>
	                            <option value="last year"
				        			@if(request('date-filter') && request('date-filter') == 'last year') 
										selected
									@endif	 
	                            >Since Last Year</option>
	                            <option value="2 years ago"
				        			@if(request('date-filter') && request('date-filter') == '2 years ago') 
										selected
									@endif	 
	                            >Since 2 years ago</option>
	                            <option value="3 years ago"
									@if(request('date-filter') && request('date-filter') == '3 years ago') 
										selected
									@endif	 
	                            >Since 3 years ago</option>
	                            <option value="all"
									@if(request('date-filter') && request('date-filter') == 'all') 
										selected
									@endif	 
	                            >All</option>
	                        </select>
	                        <select id="project-select" class="form-control mb-3 mr-sm-3 col-2" name="project-filter">
	                            <option value>Select Project</option>
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
	                        <select id="channel-select" class="form-control mb-3 mr-sm-3 col-2" name="channel-filter">
	                            <option value>Select Channel</option>
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
	                        <select id="assignee-select" class="form-control mb-3 mr-sm-3 col-2" name="assignee-filter">
	                            <option value>Select Assignee</option>
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
            @include('dashboard.overview.table', ['title' => 'Overal Overview'])
        </div>
    </div>
@endsection