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
<div class="container-fluid" style="margin-top:1cm;">
    <div class="row" style="height:1.5cm;">
       <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
       </div>
       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color:red;vertical-align: middle;height:1.5cm;width:60%;">
      <b style="vertical-align: middle;margin-top:50px;">SẢN PHẨM MỚI NHẤT</b>
       </div>
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
       </div>
    </div>
    <div class="row">
<div class="container">
@include('partials/cardProduct')
</div>
    </div>
</div>
<div class="container-fluid" style="margin-top:1cm;">
    <div class="row" style="height:1.5cm;">
       <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
       </div>
       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color:red;vertical-align: middle;height:1.5cm;width:60%;">
      <b style="vertical-align: middle;margin-top:50px;">SẢN PHẨM HÓT</b>
       </div>
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
       </div>
    </div>
    <div class="row">
  <div class="container">
  @include('partials/cardProduct')
  </div>
    </div>
</div>
<div class="container-fluid" style="margin-top:1cm;">
    <div class="row" style="height:1.5cm;">
       <div class="col-xs-1 col-sm-1 col-md-1 col-lg-1">
       </div>
       <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4" style="background-color:red;vertical-align: middle;height:1.5cm;width:60%;">
      <b style="vertical-align: middle;margin-top:50px;">SẢN PHẨM GIẢM GIÁ</b>
       </div>
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
       </div>
    </div>
    <div class="row">
   <div class="container">
   <div class="card-deck">
    @foreach($productDiscounts as $product)
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="card border-success text-black bg-light mt-5"
            style="width:100%;height:500px;margin-top:20px;margin-bottom:20px;">
            <div class="card-header">
                @if($product->discount != 0.00 )
                <button class="btn btn-danger" type="button" style="position: absolute; width: 70px;height: 30px;">{{$product->getDiscount()}}</button>
                @endif
                <img class="card-img-top" src="{{'/storage/'. $product->image}}" alt="Card image"
                    style="width:100%;height:250px;"></div>
            <div class="card-body" id="bodyCard">
                <h4 class="card-title" style="text-align:center;">{{$product->name_product}}</h4> <br>
                <p class="card-text" style="color:black;">{{$product->price}}<sub>
                        &emsp;<strike>{{$product->old_price}}</strike></sub></p>
            </div>
            <div class="card-footer">
                @if(Auth::user())
                <div class="row" style="float:left;">
                        <a href="/home/viewDetailProducts/{{$product->slug}}" class="btn btn-info" id="btnbtn"
                            style='font-size:20px;margin-left:5px;width:100px;;' type="button"><i
                                class='fas fa-eye'></i></a>
                        <span><a href="/home/user/product/addtocart/{{$product->slug}}" type="button"
                                id="btnbtn" class="btn btn-info" style='font-size:20px;margin-left:4px;width:100px;;'><i
                                    class="fa fa-shopping-cart"></i></a></span>
                </div>
                @else
                <div class="row" style="float:left;">
                    <a href="/home/viewDetailProducts/{{$product->slug}}" class="btn btn-info" id="btnbtn"
                        style='font-size:20px;margin-left:5px;width:100px;' type="button"><i class='fas fa-eye'></i></a>
                    <span>
                    <a href="#" type="button" id="btnbtn" class="btn btn-info" data-toggle="modal"
                            data-target="#loginModol" style='font-size:20px;margin-left:5px;width:100px;'><i
                                class="fa fa-shopping-cart"></i></a></span>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
   </div>
    </div>
</div>
@endsection
