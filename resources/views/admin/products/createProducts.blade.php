@extends('layouts.masterAdmin')
@section('content')
<div class="container" style="width:100%; margin-top:70px;" >
                    <h1 class="text-center" style="margin-top:10px;"><b>THÊM SẢN PHẨM</b></h1>
                    <br><br><br>
                    <form action="/admin/product/addProducts" method="post" enctype="multipart/form-data">
                        @csrf
              <div class="row">
              <div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
                     <div class="form-group">
                            <select class="form-control" id="company" name="company">
                               @foreach($companies as $company)
                               <option  value="{{$company->id}}">{{$company->name_company}}</option> <br>
                               @endforeach
                            </select>
                            <br>
                            <select class="form-control" id="category" name="category">
                               @foreach($categories as $category)
                               <option  value="{{$category->id}}">{{$category->name_category}}</option> <br>
                               @endforeach
                            </select>
                            <br>
                            <input id="slug" class="form-control" type="text" name="slugProduct"
                                placeholder="Nhập slug sản phẩm"><br>
                            <input id="nameProduct" class="form-control" type="text" name="nameProduct"
                                placeholder="Nhập tên sản phẩm"><br>
                            <input id="quantityProduct" class="form-control" type="number" name="quantityProduct"
                                placeholder="Nhập số lượng sản phẩm"><br>

                            <input id="priceProduct" class="form-control" type="number" name="priceProduct"
                                placeholder="Nhập giá sản phẩm"><br>

                            <input id="dateCreate" class="form-control" type="date" name="dateCreate"
                                placeholder="Ngày sản xuất"><br>
                            <input id="image" class="form-control" type="file" name="image" placeholder="image"><br>
                        </div>
                     </div>

                     <div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
                     <div class="form-group">
                     <select class="form-control" id="sizes" name="sizes[]" multiple>
                               @foreach($sizes as $size)
                               <option  value="{{$size->id}}">{{$size->size}}</option> <br>
                               @endforeach
                            </select>
                            <br>
                            <input id="color" class="form-control" type="text" name="colorProduct"
                                placeholder="Màu sắc"><br>
                            <input id="Chân đế" class="form-control" type="text" name="soleProduct"
                                placeholder="Chân đế giày"><br>
                            <input id="Trọng lượng" class="form-control" type="number" name="weight"
                                placeholder="Nhập trọng lượng sản phẩm"><br>

                           <textarea name="description"  class="form-control" id="description"  placeholder="Mô tả sản phẩm"></textarea>
                        </div>
                     </div>
              </div>
                        <button class="btn btn-info" type="submit" style="width:80%;margin-left:10%;height:1.5cm;">Thêm
                            sản phẩm</button>
                    </form>
                </div>
</div>

@endSection
