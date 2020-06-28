@extends('layouts.masterAdmin')
@section('content')
<div class="container" style="margin-top:50px;height:600px;">
    <h1 class="text-center"><b>CHỌN SẢN PHẨM CẦN XÓA</b></h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
        <table class="table table-striped table-bordered overflow-auto">
            <thead>
                <tr>
                    <th>STT</th>
                    <th>Tên người dùng</th>
                    <th>Số tiền</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php $i=0;?>
                @foreach($payments as $payment)
                <tr>
                    <td><?php echo $i+=1;?></td>
                    <td class="text-center">{{$payment->users->fullName}}</td>
                    <td class="text-center">{{$payment->getMoney()}}</td>
                    <td>
                        <form action="/admin/managementAddMoney/Accept/{{$payment->id}}" method="post">
                            @csrf
                            @method('Patch')
                            <button class="btn btn-success" type="submit" style="width:100px;height:1.2cm;"><i
                                class='fas fa-check-circle' style='font-size:24px'></button></td>
                        </form>

                    <td>
                    <form action="/admin/managementAddMoney/delete/{{$payment->id}}" method="post">
                    @csrf
                    @method('Delete')
                    <button class="btn btn-danger" type="submit" style="width:100px;height:1.2cm;"> <i
                                class='fas fa-trash' style='font-size:24px'></i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div>
        </div>
        @endSection
