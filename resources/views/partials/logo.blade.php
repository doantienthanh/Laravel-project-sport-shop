<nav class="navbar navbar-expand-sm bg-while navbar-while">
    <!-- Brand/logo -->
    @if (session('logins'))
    <div class="alert alert-danger" style="text-align: center;height:2cm;">{{session('logins')}}</div>
@endif
    <button class="navbar-toggler" type="button" data-toggle="collapse">
        <a class="navbar-brand" href="#">
            <img src="https://i.ytimg.com/vi/H4ubtC7Z4Nc/maxresdefault.jpg" alt="logo"
                style="margin-top:10px;width:15rem;">
        </a>
    </button>
    <div class="collapse navbar-collapse" id="collapsibleNavbar">
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <a class="navbar-brand" href="#">
                <img src="https://i.ytimg.com/vi/H4ubtC7Z4Nc/maxresdefault.jpg" alt="logo"
                    style="margin-top:10px;width:15rem;">
            </a>
        </div>
        <!-- Links -->
        <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
            <form class="form-inline" method="GET" action="/home/user/searchProduct" style="margin-left:50px;" enctype="multipart/form-data">
                @csrf
                <div class="col-xs-8 col-sm-8 col-md-8 col-lg-8">
                    @if (session('status'))
                    <div class="alert alert-danger" style="text-align: center">{{session('status')}}</div>
                @endif
                @if (session('registered'))
                <div class="alert alert-danger" style="text-align: center">{{session('registered')}}</div>
            @endif
                @if (session('loginFeils'))
                <div class="alert alert-danger" style="text-align: center">{{session('loginFeils')}}</div>
            @endif

                    <input class="form-control mr-sm-2" type="text" name="searchProduct" placeholder="Tìm kiếm"
                        style="width:100%;height:1cm;">
                </div>
                <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
                        <button class="btn btn-success" name="btnSearch" type="submit" style="height:1cm;">Tìm kiếm</button>

                </div>
            </form>
        </div>
        <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
            <ul class="navbar-nav" style="float:right;margin-right:50%;">
                <li class="nav-item">
                    @if(Auth::user())
                    <a href="/home/viewCart/ofUser"><i class='fas fa-cart-plus'
                            style='font-size:48px;color:red'><?php echo $countCarts ?></i></a>
                    @else
                    <i class='fas fa-cart-plus' style='font-size:30px;color:red'></i>
                    @endif
                </li>
            </ul>
        </div>
    </div>
</nav>
