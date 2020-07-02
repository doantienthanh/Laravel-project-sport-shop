<div class="col-xs-2 col-sm-2 col-md-2 col-lg-2" id="categorys">
    <h3 class="text-center" style="margin-top:20px;"><b>DANH MỤC SẢN PHẨM</b></h3>
    @foreach ($categories as $category)
    <a href="/userView/{{$category->id}}" type="button" id="categoryBtn" style="width:100%; height:1.2cm;text-align: center;font-size: 16px; padding: 15px 15px;"
    class="btn btn-outline-secondary">{{$category->name_category}}</a><br> <br>
    @endforeach
     <br><br>
     <form>
     <div class="row">
     @foreach($sizes as $size)
    <div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
    <div class="checkbox">
      <label><input type="checkbox" value="{{$size->id}}">&nbsp;&nbsp;{{$size->size}}</label>
    </div>
    </div>
     @endforeach

     </div>
     </form>

</div>
