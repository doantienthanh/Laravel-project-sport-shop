  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
  <div class="collapse navbar-collapse" id="collapsibleNavbar">
  <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
 <p class="navbar-brand">TIENTHANHSPORT- LUÔN CAM KẾT CUNG CẤP HÀNG CHÍNH HÃNG 100%</p>
  </div>
  <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
  <ul class="navbar-nav" style=" float: right;">
  @if(Auth::user())
  <li class="nav-item active"><i class='fas fa-user-alt'></i>&ensp;{{Auth::user()->fullName}}</li>&ensp;
                <form action="/user-logout" method="post">
                    @csrf
                   <li><button style="border:none;" class="btn-dark"><i class="fas fa-sign-out-alt" type="submit"></i></button></li>
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
<!-- The Modal login -->
<div class="modal" id="loginModol">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- Modal Header -->
            <div class="modal-header">
                <h2 class="text-center" style="color:red;margin-left:30%;">ĐĂNG NHẬP</h2>
                <button type="button" class="close" data-dismiss="modal" style="color:red;">X</button>
            </div>
            <!-- Modal body -->
            <form action="/userLogin" method="post" enctype="multipart/form-data">
                @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <span class="input-group-text"><i class="far fa-user"
                                style='font-size:30px;color:black;'></i>&ensp;&ensp;&ensp;&ensp;
                            <input id="email" class="form-control" type="email" name="emailLogin"></span>
                        <span class="input-group-text"><i class="fas fa-lock"
                                style='font-size:30px;color:black'></i>&ensp;&ensp;&ensp;&ensp;
                            <input id="password" class="form-control" type="password" name="passwordLogin"></span>
                    </div>
                </div>
                <!-- Modal footer -->
                <div class="modal-footer">
                    <button class="btn btn-info" type="submit" name="btnlogin" style="width:100%;height:50px;font-size:20px;">ĐĂNG NHẬP</button>
                </div>
            </form>

        </div>
    </div>
</div>
