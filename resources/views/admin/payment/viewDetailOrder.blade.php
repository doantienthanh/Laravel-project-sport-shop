@extends('layouts.masterAdmin')
@section('content')
<div class="container-fluid" style="margin-top:50px;height:600px;">
    <h1 class="text-center"><b>QUẢN LÍ THANH TOÁN</b></h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped table-bordered overflow-auto">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>id</th>
                    <th>Tên sản phẩm</th>
                    <th>Image</th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;
                ?>
                @foreach($products as $product)
                <tr>
                    <td><?php echo $i+=1;?></td>
                    <td class="text-center">{{$product->id}}</td>
                    <td class="text-center">{{$product->name_product}}</td>
                    <td> <img src="{{'/storage/'. $product->image}}" style="width:60px;hieght:60px;">
                </tr>
                @endforeach
            </tbody>
        </table>
</div>
<div class="row" style="margin-top:20px;">
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
        <p style="color: black;">Tên người đặt hàng: <b style="color: red">{{$users->fullName}}</b> </p> <br><br>
        <p style="color: black;">Email người nhận: <b style="color: red">{{$users->email}}</b></p><br><br>
        <p style="color: black;">Địa chỉ người nhận: <b style="color: red">{{$users->address}}</b></p><br><br>
        <p style="color: black;">Ngày đặt hàng: <b style="color: red">{{$orders->created_at}}</b></p><br><br>
   <form action="/admin/orderProductsToUsers/{{$orders->id}}" method="get">
@csrf
    <button class="btn btn-light" type="submit" style="width:50%; height:1.5cm;margin-top:20px; margin-bottom: 20px;">TIẾN HÀNH GIAO HÀNG</button>
   </form>
    </div>
    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
    <button class="btn btn-light" type="button" style="width:50%; height:1.5cm;margin-top:20px;float:right;color:red;" name="total_priceOrder"><b>{{$orders->getTotalPriceOrder()}}</b></button>
    </div>
</div>
</div>
        @endSection
