<div class="card-deck">
    @foreach($products as $product)
    <div class="col-xs-2 col-sm-2 col-md-2 col-lg-2">
        <div class="card border-success text-black bg-light mt-5"
            style="width:100%;height:500px;margin-top:20px;margin-bottom:20px;">
            <div class="card-header">
                @if($product->discount != 0.00 )
                <button class="btn btn-danger" type="button" style="position: absolute;">{{$product->discount}}</button>
                @endif
                <img class="card-img-top" src="{{'/storage/'. $product->image}}" alt="Card image"
                    style="width:100%;height:250px;"></div>
            <div class="card-body" id="bodyCard">
                <h4 class="card-title" style="text-align:center;">{{$product->name_product}}</h4> <br>
                <p class="card-text" style="color:black;">{{$product->price}}<sub>
                        &emsp;<strike>{{$product->old_price}}</strike></sub></p>
            </div>
            <div class="card-footer">
                @if(Auth::user())
                <div class="row" style="float:left;">
                        <a href="/user/viewDetail/{{$product->id}}" class="btn btn-info" id="btnbtn"
                            style='font-size:20px;margin-left:10px;width:100px;;' type="button"><i
                                class='fas fa-eye'></i></a>
                        <span><a href="/home/user/product/addtocart/{{$product->slug}}" type="button"
                                id="btnbtn" class="btn btn-info" style='font-size:20px;margin-left:4px;width:100px;;'><i
                                    class="fa fa-shopping-cart"></i></a></span>
                </div>
                @else
                <div class="row" style="float:left;">
                    <a href="/home/viewDetailProducts/{{$product->slug}}" class="btn btn-info" id="btnbtn"
                        style='font-size:20px;margin-left:5px;width:100px;' type="button"><i class='fas fa-eye'></i></a>
                    <span>
                    <a href="#" type="button" id="btnbtn" class="btn btn-info" data-toggle="modal"
                            data-target="#loginModol" style='font-size:20px;margin-left:5px;width:150%;'><i
                                class="fa fa-shopping-cart"></i></a></span>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>
