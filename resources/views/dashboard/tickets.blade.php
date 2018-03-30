@extends('layout.master')
@section('content')
    <div class="content">
        <div class="container-fluid">
            @include('dashboard.overview.table', ['title' => 'Tickets oververview','filters' => $filters])
        </div>
    </div>
@endsection