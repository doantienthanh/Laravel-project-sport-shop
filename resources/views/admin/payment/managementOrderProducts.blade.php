@extends('layouts.masterAdmin')
@section('content')
<div class="container" style="margin-top:50px;height:600px;">
    <h1 class="text-center"><b>QUẢN LÍ THANH TOÁN</b></h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped table-bordered overflow-auto">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>id_product và số lượng</th>
                    <th>Tên người dùng</th>
                    <th>Địa chỉ</th>
                    <th>Email</th>
                    <th>Tổng giá</th>
                    <td></td>
                    <td></td>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($orders as $order)
                <tr>
                    <td><?php echo $i+=1;?></td>
                    <td class="text-center">{{$order->id_allProducts}}</td>
                    <td class="text-center">{{$order->fullNameUserOrder}}</td>
                    <td class="text-center">{{$order->address}}</td>
                    <td class="text-center">{{$order->email}}</td>
                    <td class="text-center">{{$order->getTotalPriceOrder()}}</td>
                    <td><button class="btn btn-danger" type="button">Text</button></td>
                    <td><button class="btn btn-info" type="button">Text</button></td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endSection
