
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/home.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <title>Title</title>
</head>
<body>
@include('partials/header') <br><br>
@include('partials/menuUser')
<div class="container" style="margin-top:20px;height:400px;">
    <h1 class="text-center"><b>TẤT CẢ SẢN PHẨM CỦA BẠN TRONG GIỎ HÀNG</b></h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered overflow-auto">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th style="width: 200px;">Số lượng</th>
                    <th>Giá</th>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                <?php $totalPriceCart=0;
               ?>
                @foreach($carts as $cart)
                <?php $totalPriceCart+=$cart->total_price;
                ?>
               <tr>
                    <td><b style="margin-top:100px;"><?php echo $i=$i+1;?></b></td>
                    <td>{{$cart->product->name_product}}</td>

                    <td> <img src="{{'/storage/'. $cart->product->image}}" style="width:100px;hieght:100px;"></td>
                 <td>
                 <div class="row">

                    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                        <form action="/home/user/addQuantityInCart{{$cart->product->slug}}" method="post">
                            @csrf
                            @method('PATCH')
                        <button class="btn btn-light" type="submit" style="margin-top:5px;margin-left:20px;width: 40;height: 30px;"><b>+</b>
                    </button>
                </form>
                </div>
                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <button  class="btn btn-light" type="button" style="height: 40px;width:60px;">{{$cart->quantity}}</button>
                </div>

                <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                    <form action="/home/user/minusQuantityInCart{{$cart->product->slug}}" method="post">
                        @csrf
                        @method('PATCH')
                        <button class="btn btn-light" type="submit" style="margin-top:5px; margin-right:30px;width: 40px;height: 30px;">-</button>
                    </form>
                </div>
                 </div></td>
                    <td>{{$cart->getPriceTotal()}}</td>
                    <td>
                        <form action="/home/user/delete{{$cart->id}}" method="post">
                            @csrf
                            @method('delete')
                        <button class="btn btn-danger" type="submit" style="margin-top:10px;width:100px;margin-top:6px;">
                        <i class='fas fa-trash' style='font-size:24px'></i></button>
                        </form>

                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
   <div class="row">
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
       <button class="btn btn-light" type="button" style="width:50%; height:1.5cm;margin-top:20px;" data-toggle="modal" data-target="#useCode">MÃ GIẢM GIÁ</button>
       </div>
       <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
       <button class="btn btn-light" type="button" style="width:50%; height:1.5cm;margin-top:20px;float:right;color:red;" name="total_priceOrder"><b><?php echo  $price=number_format($totalPriceCart)." VND";;?></b></button>
       </div>
   </div>
  <form action="/home/user/paymentProduct" method="post">
    @csrf
    <br> <br>
    @if (session('status'))
    <div class="alert alert-danger" style="text-align: center">{{session('status')}}</div>
@endif
    <button class="btn btn-info" type="submit" style="width:70%; height:1.5cm;margin-left:15%;margin-top:50px;"><b>TIẾN HÀNH THANH TOÁN</b></button>
  </form>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="/js/app.js"></script>
</body>
</html>

