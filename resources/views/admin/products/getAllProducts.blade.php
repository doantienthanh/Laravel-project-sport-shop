@extends('layouts.masterAdmin')
@section('content')
<div class="container" style="margin-top:50px;height:600px;">
    <h1 class="text-center"><b>TẤT CẢ SẢN PHẨM</b></h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered overflow-auto">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên </th>
                <th>Hình ảnh</th>
                <th>Giá</th>
                <th>Giảm giá</th>
                <th>Số lượng</th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; ?>
            @foreach($products as $product)
            <tr>
                <td><?php echo $i=$i+1; ?></td>
                <td class="text-center">{{$product->name_product}}</td>
                <td> <img src="{{'/storage/'. $product->image}}" style="width:60px;hieght:60px;">
                </td>
                <td class="text-center">{{$product->getPrice()}}</td>
                <td class="text-center">{{$product->getDiscount()}}</td>
                <td class="text-center">{{$product->quantity}}</td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
</div>
@endSection
