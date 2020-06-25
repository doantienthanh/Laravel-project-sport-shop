@extends('layouts.masterAdmin')
@section('content')
<div class="container" style="width:100%; margin-top:70px;" >
                    <h1 class="text-center" style="margin-top:10px;"><b>THÊM SẢN PHẨM</b></h1>
                    <br><br><br>
                    <form action="/admin/editProduct/{{$products->id}}" method="post" enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
              <div class="row">
              <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                     <div class="form-group">
                            <select class="form-control" id="company" name="companyUpdate">
                               @foreach($companies as $company)
                               <option value="{{$company->id}}">{{$company->name_company}}</option> <br>
                               @endforeach
                            </select>
                            <br>
                            <select class="form-control" id="category" name="categoryUpdate">
                               @foreach($categories as $category)
                               <option  value="{{$category->id}}">{{$category->name_category}}</option> <br>
                               @endforeach
                            </select>
                            <br>
                            <input id="nameProduct" class="form-control" type="text" name="slugUpdate"
                                value="{{$products->slug}}"><br>
                            <input id="nameProduct" class="form-control" type="text" name="nameProductUpdate"
                                value="{{$products->name_product}}"><br>
                            <input id="quantityProduct" class="form-control" type="number" name="quantityProductUpdate"
                            value="{{$products->quantity}}"><br>
                                <input id="price" class="form-control" type="text" name="oldPriceUpdate"
                                value="{{$products->price}}"><br>

                            <input id="priceProduct" class="form-control" type="number" name="priceProduct"  placeholder="Nhập Giá mới của sản phẩm"><br>

                            <input id="dateCreate" class="form-control" type="date" name="dateCreateUpdate"
                            value="{{$products->date_create}}"><br>
                            <input id="image" class="form-control" type="file" name="imageUpdate" placeholder="image"><br>
                        </div>
                     </div>
                     <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                     <div class="form-group">
                     <select class="form-control" id="sizes" name="sizesUpdate[]" multiple>
                               @foreach($sizes as $size)
                               <option  value="{{$size->id}}">{{$size->size}}</option> <br>
                               @endforeach
                            </select>
                            <br>
                            @foreach ($details as $detail )
                            <input id="color" class="form-control" type="text" name="colorProductUpdate"
                            value="{{$detail->color}}"><br>
                        <input id="Chân đế" class="form-control" type="text" name="soleProductUpdate"
                        value="{{$detail->sole}}"><br>
                        <input id="Trọng lượng" class="form-control" type="number" name="weightUpdate"
                        value="{{$detail->weight}}"><br>

                       <textarea name="descriptionUpdate"  class="form-control" id="description">{{$detail->weight}}</textarea>
                            @endforeach
                        </div>
                     </div>
              </div>
                        <button class="btn btn-info" type="submit" style="width:80%;margin-left:10%;height:1.5cm;">Sửa
                            sản phẩm</button>
                    </form>
                </div>
</div>

@endSection
