<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Companies;
use App\Categories;
use App\Sizes;
class DataController extends Controller
{
    // Company
    function returnAllCompany(){
        $companies=Companies::all();
        return view('admin.data.getAllCompany',['companies'=>$companies]);
    }

    function addCompany(REQUEST $request){
        $nameCompany=$request->nameCompany;
         $companies=Companies::all();
         foreach($companies as $company){
             if($company->name_company==$nameCompany){
                $request->session()->flash('companyed', 'Hãng này đã tồn tại!');
               return redirect('/admin/getAllCompany');
             }
             else
             {
                $companies= new Companies;
                $companies->name_company=$nameCompany;
                $companies->save();
                $request->session()->flash('addCompanyDone', 'Thêm hãng thành công!');
                return redirect('/admin/getAllCompany');
             }
         }
    }
    function deleteCompany($id){
      Companies::find($id)->delete();
      return redirect('/admin/getAllCompany');
    }
    // Category
    function returnAllCategory(){
        $categories=Categories::all();
        return view('admin.data.getAllCategory',['categories'=>$categories]);
    }
    function deleteCategory($id){
        Categories::find($id)->delete();
        return redirect('/admin/getAllCategory');
      }
      function addCategory(REQUEST $request){
        $nameCategory=$request->nameCategory;
         $categories=Categories::all();
         foreach($categories as $category){
             if($category->name_category==$nameCategory){
                $request->session()->flash('categoryed', 'Loại sản phẩm này đã tồn tại!');
               return redirect('/admin/getAllCategory');
             }
             else
             {
                $categories= new Categories;
                $categories->name_Category=$nameCategory;
                $categories->save();
                $request->session()->flash('addCategoryDone', 'Thêm loại sản phẩm thành công!');
                return redirect('/admin/getAllCategory');
             }
         }
    }

    // Size
    function returnAllSize(){
        $sizes=Sizes::all();
        return view('admin.data.getAllSize',['sizes'=>$sizes]);
    }
    function deleteSize($id){
        Sizes::find($id)->delete();
        return redirect('/admin/getAllSize');
      }
      function addSize(REQUEST $request){
        $nameSize=$request->nameSize;
         $sizes=Sizes::all();
         foreach($sizes as $size){
             if($size->size==$nameSize){
                $request->session()->flash('sized', 'Size này đã tồn tại!');
               return redirect('/admin/getAllSize');
             }
             else
             {
                if($nameSize<5){
                    $request->session()->flash('erro', 'Size này quá bé không phù hợp!');
                   return redirect('/admin/getAllSize');
                 }else{
                    $sizes= new Sizes;
                    $sizes->size=$nameSize;
                    $sizes->save();
                    $request->session()->flash('addSizeDone', 'Thêm size cho sản phẩm thành công!');
                    return redirect('/admin/getAllSize');
                 }
             }
         }
    }
}
