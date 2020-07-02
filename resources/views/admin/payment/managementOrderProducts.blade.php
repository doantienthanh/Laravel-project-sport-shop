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
                    <th>Số lượng</th>
                    <th>Tên người dùng</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Tổng giá</th>
                   <th></th>
                   <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($orders as $order)
                <tr>
                    <td><?php echo $i+=1;?></td>
                    <td class="text-center">{{$order->id_allProducts}}</td>
                    <td class="text-center">{{$order->quantity}}</td>
                    <td class="text-center">{{$order->fullNameUserOrder}}</td>
                    <td class="text-center">{{$order->address}}</td>
                    <td class="text-center">{{$order->email}}</td>
                    <td class="text-center">{{$order->getTotalPriceOrder()}}</td>
                    <td>
                        <form action="/admin/viewDetail/Payments/{{$order->id}}/{{$order->user_id}}" method="get">
                            @csrf
                            <button class="btn btn-info" type="submit" style="width:100px;height: 1cm;" data-toggle="modal" data-target="#viewDetailOrderModel">Chi tiết</button>
                        </form>
                    </td>
                    <td>   <form action="" method="get">
                        @csrf
                        <button class="btn btn-danger" type="submit" style="width:100px;height: 1cm;" data-toggle="modal" data-target="#viewDetailOrderModel">Chi tiết</button>
                    </form></td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
        </div>
        @endSection

