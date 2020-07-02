<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/css/app.css">
    <link rel="stylesheet" href="/css/home.css">
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Title</title>
</head>

<body>
    <nav class="navbar navbar-expand-md bg-dark navbar-dark">
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
            </div>
            <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
                <ul class="navbar-nav" style=" float: right;">
                    @if(Auth::user())
                    <li class="nav-item active"><i class='fas fa-user-alt'></i>&ensp;{{Auth::user()->fullName}}</li>
                    &ensp;
                    <form action="/user-logout" method="post">
                        @csrf
                        <li><button style="border:none;" class="btn-dark"><i class="fas fa-sign-out-alt"
                                    type="submit"></i></button></li>
                    </form>
                    @else
                    <li class="nav-item active">
                        <i class="fa fa-user"></i>
                    </li> &nbsp;&nbsp; &nbsp;&nbsp;
                    <li class="nav-item active">
                        <i class="fas fa-sign-in-alt" data-toggle="modal" data-target="#loginModol"></i>
                    </li>
                    @endif
                </ul>

            </div>
        </div>
    </nav>
    <div class="container-fluid">
        <div class="row">
            <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
                <div class="row">
                    <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10"
                        style="width:100px;height:700px;background-color: #6c757d;">
                        <br>
                        <a  href="/admin/dashboard"
                            style="width:100%; height:1.2cm;text-align: center;font-size: 20px; padding: 5px 5px; "
                            class="btn btn-outline-secondary"><i class="fa fa-dashboard"
                                style="font-size:30px;color:red;"></i>&nbsp; <span
                                style="color:black;">Dashboard</span></a><br><br><br><br><br>
                                <a  href="/admin/dashboard"
                            style="width:100%; height:1.2cm;text-align: center;font-size: 20px; padding: 5px 5px; "
                            class="btn btn-outline-secondary"><i class="fas fa-users"
                                style="font-size:30px;color:while;">&nbsp;</i><span style="color:black;">Users</span>&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;</a><br><br><br><br><br>
                        <div class="dropdown dropright">
                            <button type="button" class="btn btn-outline-secondary dropdown-toggle"  style="width:100%; height:1.2cm;text-align: center;font-size: 20px; padding: 5px 5px; " data-toggle="dropdown">
                                <i class="fa fa-database" style="font-size:30px;color:while;"></i>&nbsp; <span
                                    style="color:black; ">Products</span>
                            </button>
                            <div class="dropdown-menu"><br><br>
                                <a class="dropdown-item" href="/admin/Product/Create" style=" padding: 5px 5px;font-size: 20px;
        text-align: center;">Thêm sản phẩm</a> <br><br>
                                <a class="dropdown-item" href="/admin/FindProduct/delete" style=" padding: 5px 5px;font-size: 20px;
        text-align: center;">Xóa sản phẩm</a><br><br>
                                <a class="dropdown-item" href="/admin/FindProduct/toEdit" style=" padding: 5px 5px;font-size: 20px;
        text-align: center;">Sửa sản phẩm</a><br>
                            </div>
                        </div><br><br><br><br><br>

                        <a type="button"
                            style="width:100%; height:1.2cm;text-align: center;font-size: 20px; padding: 5px 5px; "
                            class="btn btn-outline-secondary"><i class="fas fa-comment"
                                style="font-size:30px;color:while;"></i>&nbsp; <span style="color:black;">Comments</span></a><br><br><br><br><br>
                        <a type="button" href="/admin/management/payments"
                            style="width:100%; height:1.2cm;text-align: center;font-size: 20px; padding: 5px 5px; "
                            class="btn btn-outline-secondary"><i class="fab fa-cc-apple-pay"
                                style="font-size:30px;color:while;"></i>&nbsp;&nbsp;  <span style="color:black;">Payments
                            </span></a><br><br><br><br><br>


                            <a href="/admin/management/AddMoneyOfUser"
                            style="width:100%; height:1.2cm;text-align: center;font-size: 20px; padding: 5px 5px; "
                            class="btn btn-outline-secondary"><i class="fas fa-money-check-alt"
                                style="font-size:30px;color:while;"></i>&nbsp;  <span style="color:black;">Money</span>&nbsp; &nbsp; &nbsp;&nbsp;</a><br><br><br><br><br>

                                <a type="button"
                            style="width:100%; height:1.2cm;text-align: center;font-size: 20px; padding: 5px 5px; "
                            class="btn btn-outline-secondary"><i class="fa fa-dashboard"
                                style="font-size:30px;color:black;"></i>&nbsp; <span
                                style="color:while;">Setting</span></a><br><br><br><br><br>
                    </div>
                </div>
            </div>
            <div class="col-xs-10 col-sm-10 col-md-10 col-lg-10">
                @yield('content')
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.slim.min.js"></script>
    <script src="/js/app.js"></script>

</body>

</html>
