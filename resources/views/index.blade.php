@extends('layouts.master')
@section('content')
@include('partials/logo')
@include('partials/menuUser')
<div class="container-fluid">
<div class="row" style="margin-bottom:20px;">
@include('partials/categories')
<div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-top:100px;margin-left:100px">
<div id="demo" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <ul class="carousel-indicators">
                        <li data-target="#demo" data-slide-to="0" class="active"></li>
                        <li data-target="#demo" data-slide-to="1"></li>
                        <li data-target="#demo" data-slide-to="2"></li>
                    </ul>
                    <!-- The slideshow -->
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://file.hstatic.net/1000061481/file/2_bb85ff89d4d945f194e524704ccf3e34.jpg"
                                alt="Los Angeles" width="100%" height="500px">
                        </div>
                        <div class="carousel-item">
                            <img src="https://2.bp.blogspot.com/-7eBg-aaj1Tw/VdBVTnW2wcI/AAAAAAAAp1g/J_GZDZy5AZs/s738/Adidas-Eskolaite-Chrome-Pack%2B%25286%2529.jpg"
                                alt="Chicago" width="100%" height="500px">
                        </div>
                        <div class="carousel-item">
                            <img src="https://1.bp.blogspot.com/-LZlUX0mcKN4/VdBVTPAwgxI/AAAAAAAAp10/EAi9mGqS1fE/s738/Adidas-Eskolaite-Chrome-Pack%2B%25284%2529.jpg"
                                alt="New York" width="100%" height="500px">
                        </div>
                    </div>

                    <!-- Left and right controls -->
                    <a class="carousel-control-prev" href="#demo" data-slide="prev">
                        <span class="carousel-control-prev-icon"></span>
                    </a>
                    <a class="carousel-control-next" href="#demo" data-slide="next">
                        <span class="carousel-control-next-icon"></span>
                    </a>
                </div>
</div>
</div>
</div>
@endsection
