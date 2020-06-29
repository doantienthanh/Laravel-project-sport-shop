@extends('layouts.master')
@section('content')
@include('partials/logo')
@include('partials/menuUser')
<div class="container-fluid">
<div class="row">
    @include('partials/categories')
    @include('partials/cardProduct')
  </div>

</div>
@endsection
