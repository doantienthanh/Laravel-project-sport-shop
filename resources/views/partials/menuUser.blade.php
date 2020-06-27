<div class="container">
    <nav class="navbar navbar-expand-sm bg-secondary navbar-dark">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#menuNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="menuNavbar">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link" href="/"><b>TRANG CHỦ</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="/home/allProduct"><b>TẤT CẢ SẢN PHẨM</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>CÁCH CHỌN GIÀY</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>GIẢM GIÁ</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>XẾP THEO</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link disabled" href="#"><b>LIÊN HỆ</b></a>
                </li>
                <li class="nav-item active">
                    <a class="nav-link" href="#"><b>HỆ THỐNG CỬA HÀNG</b></a>
                </li>
                @if(Auth::user())
                <li class="nav-item active">
                    <button class="btn btn-outline-secondary" type="button" data-toggle="modal" data-target="#payment"
                        style="height:0.7cm;width:100%;"><b style="color:red;">NẠP TIỀN</b></button>
                </li>
                @endif
            </ul>
        </div>
    </nav>
</div>
<!-- The Modal login -->
<div class="modal" id="payment">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="text-center" style="color:red;margin-left:30%;">NẠP TIỀN</h2>
                <button type="button" class="close" data-dismiss="modal" style="color:red;">X</button>
            </div>
            <!-- Modal body -->
            <form action="/user/addMoney" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <input type="text" name="money" id="money" class="form-control" placeholder="Nhập số tiền bạn muốn nạp"
                            aria-describedby="helpId">
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" style="width:100%;height:50px;font-size:20px;">NẠP
                        TIỀN</button>
                </div>
            </form>

        </div>
    </div>
</div>