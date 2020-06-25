<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="categorys">
    <h3 class="text-center" style="margin-top:20px;"><b>DANH MỤC SẢN PHẨM</b></h3>
    @foreach ($categories as $category)
    <a href="giay-san-co-nhan-tao" type="button" style="width:100%; height:1.2cm;text-align: center;font-size: 16px; padding: 15px 15px;"
    class="btn btn-outline-secondary">{{$category->name_category}}</a><br> <br>
    @endforeach
</div>
