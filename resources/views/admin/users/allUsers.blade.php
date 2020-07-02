@extends('layouts.masterAdmin')
@section('content')
<div class="container-fluid" style="margin-top:50px;height:600px;">
    <h1 class="text-center"><b>TẤT CẢ CÁC NGƯỜI DÙNG CÓ TRONG HỆ THỐNG</b></h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered overflow-auto">
        <thead>
            <tr>
                <th>STT</th>
                <th>Tên </th>
                <th>Email</th>
                <th>Địa chỉ</th>
                <th>Ngày sinh</th>
                <th>Tài khoản</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; ?>
            @foreach($users as $user)
            <tr>
                <td><?php echo $i=$i+1; ?></td>
                <td class="text-center">{{$user->fullName}}</td>
                <td class="text-center">{{$user->email}}</td>
                <td class="text-center">{{$user->address}}</td>
                <td class="text-center">{{$user->dob}}</td>
                <td class="text-center">{{$user->getMoney()}}</td>
                <td>
             <form action="/admin/deleteUser/{{$user->id}}" method="post">
@csrf
@method('delete')
                    <button class="btn btn-danger" type="submit" style="width:100px;margin-top:6px;">
                    <i class='fas fa-trash' style='font-size:24px'></i></button>
             </form>
            </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <div>
</div>
@endSection
