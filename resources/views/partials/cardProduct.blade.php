<div class="card-deck">
    @foreach($products as $product)
    <div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
        <div class="card text-black bg-black mt-5"id="cardCss"
            style="width:100%;height:500px;margin-top:20px;margin-bottom:20px;">
            <div class="card-header">
                @if($product->discount != 0.00 )
                <button class="btn btn-danger" type="button" style="position: absolute; width: 70px;height: 30px;">{{$product->getDiscount()}}</button>
                @endif
                <img class="card-img-top" src="{{'/storage/'. $product->image}}" alt="Card image"
                    style="width:100%;height:250px;"></div>
            <div class="card-body">
                    <h4 class="card-title" style="text-align:center;">{{$product->name_product}}</h4>
                    <p class="card-text" style="color:black;">Hãng:<span style="float:right;">
                        {{$product->company->name_company}}</b></span>
                    <hr>
                    <p class="card-text" style="color:black;">GIÁ:<span style="float:right;">
                            {{$product->getPrice()}}</b></span>
                        <hr>
                        <p class="card-text" style="color:black;">GIÁ CỦ: <span
                                style="float:right;">{{$product->getOldPrice()}}</span></p>
            </div>
            <div class="card-footer">
                @if(Auth::user())
                <div class="row" style="float:left;">
                        <a href="/home/viewDetailProducts/{{$product->slug}}" class="btn btn-info" id="btnbtn"
                            style='font-size:20px;margin-left:5px;width:100px;;' type="button"><i
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
                            data-target="#loginModol" style='font-size:20px;margin-left:5px;width:100px;'><i
                                class="fa fa-shopping-cart"></i></a></span>
                </div>
                @endif
            </div>
        </div>
    </div>
    @endforeach
</div>


