@extends('layouts.master')
@section('content')
@include('partials/logo')
@include('partials/menuUser')
<div class="container" style="height:100%;">
    <br><br>
    @if (session('statuses'))
    <div class="alert alert-danger" style="text-align: center">{{session('statuses')}}</div>
    @elseif(session('statused'))
    <div class="alert alert-success" style="text-align: center">{{session('statused')}}</div>
@endif
@include('partials/cardProduct')
</div>
@endsection
