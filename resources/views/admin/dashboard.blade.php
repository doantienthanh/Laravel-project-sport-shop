@extends('layouts.masterAdmin')
@section('content')
<div class="container" style="height: 700px;" style="grid-auto-flow: column;">
    <div class="row" style="height: 25%;margin-top: 5%;">
        <div class="col-sm-4">
            <a href="/admin/getAllUsers" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
              <div class="row" style="margin-top: 30px;">
                <p style="color: red;font-size: 36px;"><b><?php echo $countUsers; ?></b></p>
              </div>
                    <i class='fas fa-users' style='font-size:100px;'></i>

            </a>
        </div>
        <div class="col-sm-4">
            <a href="/admin/getAllProducts" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
 <div class="row" style="margin-top: 30px;">
                <p style="color: red;font-size: 36px;"><b><?php echo $countProducts; ?></b></p>
              </div>
                <i class="fa fa-database" style="font-size:100px;"></i>


</a>
</div>
        <div class="col-sm-4">
            <a type="button" href="/admin/management/payments" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
                 <div class="row">
                    <p style="color: red;font-size: 36px;margin-top:30px;"><b><?php echo $countOrders; ?></b></p>
                 </div>
                <i class="fab fa-cc-apple-pay" style="font-size:100px;margin-top:10px;"></i>
                </a>
        </div>
      </div>
      <div class="row"  style="height: 25%;margin-top: 2%;">
        <div class="col-sm-4">
            <a href="/admin/management/AddMoneyOfUser" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
               <div class="row" style="margin-top:30px;">
                   <p style="color: red;font-size: 36px;"><b><?php echo $countPayments; ?></b></p>
               </div>
                <i class='fas fa-money-bill-wave' style='font-size:100px;margin-top:10px;'></i>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
                <div class="row" style="margin-top:30px;">
                    <p style="color: red;font-size: 36px;"><b><?php echo $countComments; ?></b></p>
                </div>
                <i class='fas fa-comments' style='font-size:100px;'></i>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="/admin/getAllCompany" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
                <div class="row" style="margin-top:30px;">
                    <p style="color: red;font-size: 36px;"><b><?php echo $countCompany; ?></b></p>
                </div>
                <i class='fas fa-building' style='font-size:100px;'></i>
            </a>
        </div>
      </div>
      <div class="row" style="height: 25%;margin-top: 2%;">
        <div class="col-sm-4">
            <a href="/admin/getAllCategory" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
                <div class="row" style="margin-top:30px;">
                    <p style="color: red;font-size: 36px;"><b><?php echo $countCategory; ?></b></p>
                </div>
                <i class="fa fa-th" style="font-size:100px;"></i>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="/admin/getAllSize" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
                <div class="row" style="margin-top:30px;">
                    <p style="color: red;font-size: 36px;"><b><?php echo $countSizes; ?></b></p>
                </div>
                <i class='fas fa-font' style='font-size:100px'></i>
            </a>
        </div>
        <div class="col-sm-4">
            <a href="#" class="btn btn-info" id="btnDashbard" type="submit" style="height: 100%;width: 100%;">
                <div class="row" style="margin-top:30px;">
                    <p style="color: red;font-size: 36px;"><b><?php echo $countCode; ?></b></p>
                </div>
                <i class='fas fa-qrcode' style='font-size:100px;'></i>
            </a>
        </div>
      </div>
</div>
@endSection
