@extends('layouts.masterAdmin')
@section('content')
<div class="container" style="margin-top:50px;height:600px;">
    <h1 class="text-center"><b>CHỌN SẢN PHẨM CẦN SỬA</b></h1>
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
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td></td>
                <td class="text-center">{{$product->name_product}}</td>
                <td> <img src="{{'/storage/'. $product->image}}" style="width:60px;hieght:60px;">
                </td>
                <td class="text-center">{{$product->price}}</td>
                <td class="text-center">{{$product->discount}}</td>
                <td class="text-center">{{$product->quantity}}</td>
                <td>
<a href="/admin/product/getForm/edit/{{$product->id}}" class="btn btn-info" type="button" style="width:100px;margin-top:6px;"><i class='fas fa-edit' style='font-size:24px'></i></a>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
</div>
@endSection
