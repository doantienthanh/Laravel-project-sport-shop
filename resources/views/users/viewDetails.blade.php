@extends('layouts.master')
@section('content')
@include('partials/logo')
@include('partials/menuUser')
<div class="container-fluid">
<div class="row">
    @include('partials/categories')
    @foreach ($products as $products)
    <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8" style="margin-top:20px;margin-left:50px;">
        <h1 class="text-center" style="margin-top:20px;margin-bottom:10px;"><b>CHI TIẾT SẢN PHẨM</b></h1>
        <div class="row" style="margin-top:10px;">
        <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
        @if($products->discount != 0.00 )
          <button class="btn btn-danger" type="button" style="position: absolute;width: 75px;height: 40px;font-size: 20px;">{{$products->getDiscount()}}</button>
          @endif
              <img class="card-img-top" src="{{'/storage/'. $products->image}}" alt="Card image"
                  style="width:100%;height:100%;"> <br>
              </div>
          <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7" style="height:90%;">
              <div class="card-footer" style="height:20%;"><h1 style="color:red;"><b> {{$products->name_product}}</b></h1></div>
          <div class="card-body" style="height:60%;">
          <p><b style="color:red;font-size:36px;">{{$products->getPrice()}}</b>&ensp;<sub style="color:darkgray;"><strike>{{$products->getOldPrice()}}</strike></sub></p> <br>
                  <p style="color:black">Nhà cung cấp:&ensp;<b style="font-size:20px;">&ensp;{{$products->company->name_company}}</b></p> <br>
                  <p style="color:black">Loại giày:&ensp;{{$products->category->name_category}}</p> <br>
                  <p style="color:black">Ngày sản xuất:&ensp;{{$products->date_create}}</p> <br>
                  <p style="color:black">Số lượng có hiện tại trong cửa hàng:&ensp;{{$products->quantity}}</p> <br>
                  <p style="color:black">Màu sắc:&ensp;{{$products->detail->color}}</p><br>
                  <p style="color:black">Đế giày:&ensp;{{$products->detail->sole}}</p><br>
                  <p style="color:black">Trọng lượng:&ensp;{{$products->detail->weight}}</p><br>
                  <p style="color:black">Mô tả:&ensp;{{$products->detail->description}}</p><br>
                  <p style="color:black">size hiện có:&ensp;
                @foreach ($products->size as $sizes)
                    <button class="btn btn-light" type="button" style="width: 50px;height: 30px;">{{$sizes->size}}</button>
                @endforeach

                </p><br>

          </div>
        </div>
        </div>
        <button class="btn btn-info" type="button"  style="width:60%;height:1.5cm;margin-top: 30px;margin-left: 20%;">Thêm vào giỏ hàng</button>
      </div>
    @endforeach
  </div>

</div>
@endsection
