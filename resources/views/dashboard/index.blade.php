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
                    	<div class="form-group w-5">
    						<label for="start-date" class="mb-3 mr-1" >Since:</label>
                    		<input id="start-date" name="startdate-filter"  class="form-control mb-3 mr-sm-3 datepicker " style="width: auto" value = "{{ !empty(request('startdate-filter')) ? request('startdate-filter') : Carbon\Carbon::today()->subWeek()->format('Y-m-d') }}">
                    	</div>
                    	<div class="form-group w-5">
    						<label for="start-date" class="mb-3 mr-1" >Until:</label>
                    		<input id="end-date" name="enddate-filter"  class="form-control mb-3 mr-sm-3 datepicker " value = "{{ !empty(request('enddate-filter')) ? request('enddate-filter') : Carbon\Carbon::today()->format('Y-m-d') }}">
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
            @include('dashboard.overview.table', ['title' => 'Overal Overview'])
        </div>
    </div>
@endsection