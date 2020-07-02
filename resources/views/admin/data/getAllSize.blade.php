@extends('layouts.masterAdmin')
@section('content')
<div class="container-fluid" style="margin-top:50px;height:500px;">
    <h1 class="text-center"><b>TẤT CẢ CÁC SIZE</b></h1>
    <div class="table-wrapper-scroll-y my-custom-scrollbar">
    <table class="table table-striped table-bordered overflow-auto">
        <thead>
            <tr>
                <th>STT</th>
                <th>Size</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $i=0; ?>
            @foreach($sizes as $size)
            <tr>
                <td><?php echo $i=$i+1; ?></td>
                <td class="text-center">{{$size->size}}</td>
                <td>
                    <form action="/admin/deleteSize/{{$size->id}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button class="btn btn-danger" type="submit" style="width:100px;margin-top:6px;">
                            <i class='fas fa-trash' style='font-size:24px'></i></button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<div class="container" style="margin-top: 80px;">
    @if (session('sized'))
    <div class="alert alert-danger" style="text-align: center;font-size: 20px;height: 1cm;">{{session('sized')}}</div>
@endif
@if (session('erro'))
<div class="alert alert-danger" style="text-align: center;font-size: 20px;height: 1cm;">{{session('erro')}}</div>
@endif

    @if (session('addSizeDone'))
    <div class="alert alert-success" style="text-align: center;font-size: 20px;height: 1cm;">{{session('addSizeDone')}}</div>
@endif
       <button class="btn btn-info" type="submit"  data-toggle="modal" data-target="#addSizeModel" style="text-align: center;width: 60%;height: 1.5cm;margin-left: 20%;font-size: 28px;">Thêm Hãng</button>
</div>
@endSection
<!-- The Modal login -->
<div class="modal" id="addSizeModel">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="text-center" style="color:red;margin-left:30%;">THÊM HÃNG</h2>
                <button type="button" class="close" data-dismiss="modal" style="color:red;">X</button>
            </div>
            <!-- Modal body -->
            <form action="/admin/addSize" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                            <input id="nameSize" placeholder="Nhập Size" class="form-control" type="number" min="5" name="nameSize">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" name="btnlogin" style="width:100%;height:50px;font-size:20px;">THÊM</button>
                </div>
            </form>

        </div>
    </div>
</div>
