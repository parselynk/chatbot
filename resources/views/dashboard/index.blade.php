@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
        @hasanyrole('super admin')
            @include('dashboard.overview.card', ['items' => $projects , 'title' => 'Projects Overview'])
            @include('dashboard.overview.card', ['items' => $assignees , 'title' => 'Assignees Overview'])
            @include('dashboard.overview.card', ['items' => $channels , 'title' => 'Channels Overview'])
		@else
            @can('sa-view-ticket')
                @include('dashboard.overview.table', ['title' => 'Tickets oververview'])
            @endcan
        @endhasanyrole
        </div>
    </div>
@endsection