<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Products;
use App\Companies;
use App\Categories;
use App\Sizes;
use App\Details;
use App\SizeProducts;
class ManagemetProductController extends Controller
{
  function getFormAdd(){
       $companies= Companies::all();     
       $categories= Categories::all();
       $sizes=Sizes::all();
      return view('admin.products.createProducts',['companies'=> $companies,'categories'=>$categories,'sizes'=>$sizes]);
  }
  function getAllProduct(){
    $products=Products::All();
    return view('admin.products.deleteProducts',['products'=>$products]);
  }
  function createProduct(REQUEST $request){
      // Product
      $company=$request->company;
      $category=$request->category;
      $slug=$request->slugProduct;
      $name=$request->nameProduct;
      $quantity=$request->quantityProduct;
      $price=$request->priceProduct;
      $dateCreate=$request->dateCreate;
      $image=$request->file('image')->store("public");

      // Detail
      $sizes=$request->sizes;
      $color=$request->colorProduct;
      $sole=$request->soleProduct;
      $weight=$request->weight;
      $description=$request->description;

    // Add Product
    $product=new Products;
    $product->slug=$slug;
    $product->name_product=$name;
    $product->image=$image;
    $product->price=$price;
    $product->quantity=$quantity;
    $product->date_create=$dateCreate;
    $product->category_id=$category;
    $product->company_id=$company;
    $product->save();

    // Lấy id của sản phẩm vừa mới thêm vào
    $product_id=$product->id;
    // Add Detail
    $detail= new Details;
    $detail->product_id=$product_id;
    $detail->color=$color;
    $detail->sole=$sole;
    $detail->weight=$weight;
    $detail->description=$description;
    $detail->save();
 // Add size_Product
 for($i=0;$i< count($sizes);$i++){
    $sizeProduct= new SizeProducts;
    $sizeProduct->product_id=$product_id;
    $sizeProduct->size_id=$sizes[$i];
    $sizeProduct->save();
   }
  }

}
