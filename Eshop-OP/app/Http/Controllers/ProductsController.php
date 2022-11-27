<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Brands;

use App\Models\Products;
use App\Models\Categorys;
use Illuminate\Http\Request;

class ProductsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $fullrodutct=DB::table('Products')
        ->select('id','name as NNa','Description','Price','Stock','BrandID','CategoryID','Image')
        ->get();
        return $fullrodutct;
    }
    public function itemProduct(){
        $id=$_GET['id'];
        $fullrodutct=DB::table('Products')->where('id',$id)->get();
        if($fullrodutct->count()==false){
            return -1;
        }
        return $fullrodutct;
    }
    
    
    public function search(){
        // function convert_name($str) {
        //     $str = preg_replace("/(à|á|ạ|ả|ã|â|ầ|ấ|ậ|ẩ|ẫ|ă|ằ|ắ|ặ|ẳ|ẵ)/", 'a', $str);
        //     $str = preg_replace("/(è|é|ẹ|ẻ|ẽ|ê|ề|ế|ệ|ể|ễ)/", 'e', $str);
        //     $str = preg_replace("/(ì|í|ị|ỉ|ĩ)/", 'i', $str);
        //     $str = preg_replace("/(ò|ó|ọ|ỏ|õ|ô|ồ|ố|ộ|ổ|ỗ|ơ|ờ|ớ|ợ|ở|ỡ)/", 'o', $str);
        //     $str = preg_replace("/(ù|ú|ụ|ủ|ũ|ư|ừ|ứ|ự|ử|ữ)/", 'u', $str);
        //     $str = preg_replace("/(ỳ|ý|ỵ|ỷ|ỹ)/", 'y', $str);
        //     $str = preg_replace("/(đ)/", 'd', $str);
        //     $str = preg_replace("/(À|Á|Ạ|Ả|Ã|Â|Ầ|Ấ|Ậ|Ẩ|Ẫ|Ă|Ằ|Ắ|Ặ|Ẳ|Ẵ)/", 'A', $str);
        //     $str = preg_replace("/(È|É|Ẹ|Ẻ|Ẽ|Ê|Ề|Ế|Ệ|Ể|Ễ)/", 'E', $str);
        //     $str = preg_replace("/(Ì|Í|Ị|Ỉ|Ĩ)/", 'I', $str);
        //     $str = preg_replace("/(Ò|Ó|Ọ|Ỏ|Õ|Ô|Ồ|Ố|Ộ|Ổ|Ỗ|Ơ|Ờ|Ớ|Ợ|Ở|Ỡ)/", 'O', $str);
        //     $str = preg_replace("/(Ù|Ú|Ụ|Ủ|Ũ|Ư|Ừ|Ứ|Ự|Ử|Ữ)/", 'U', $str);
        //     $str = preg_replace("/(Ỳ|Ý|Ỵ|Ỷ|Ỹ)/", 'Y', $str);
        //     $str = preg_replace("/(Đ)/", 'D', $str);
        //     $str = preg_replace("/(\“|\”|\,|\!|\&|\;|\@|\#|\%|\~|\`|\=|\_|\'|\]|\[|\}|\{|\)|\(|\+|\^)/", '-', $str);
        //     $str = preg_replace("/( )/", '-', $str);
        //     return strtolower($str);
        // }
        $search=$_GET['stringsrearch'];
        if($search==null){
            $fullrodutct=DB::table('Products as P')
            ->select('P.id','P.name as NNa','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
            ->join('Categorys as C','P.CategoryID','=','C.id')
            ->join('Brands as B','P.BrandID','=','B.id')->get();
            return $fullrodutct;
        }
         //$search="Điện";
        $fullrodutct=DB::table('Products as P')
        ->select('P.id','P.name as NNa','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
        ->join('Categorys as C','P.CategoryID','=','C.id')
        ->join('Brands as B','P.BrandID','=','B.id')
        ->where('P.Name','LIKE','%'.$search.'%')
        ->orWhere('C.Name','LIKE','%'.$search.'%')
        ->orWhere('B.Name','LIKE','%'.$search.'%')
        ->get();
        return $fullrodutct;
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function show(Products $products)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function edit(Products $products)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Products $products)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy(Products $products)
    {
        //
    }
}
