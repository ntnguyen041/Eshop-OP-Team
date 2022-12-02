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
    public function indexuser(){
        $fullrodutct=DB::table('products')
        ->select('id','name as NNa','Description','Price','Stock','Brand_id','Category_id','Image')
        ->get();
        return $fullrodutct;
    }
    public function index()
    {

        $products = Products::orderBy('id', 'DESC')->get();
        return View('admin.product.index', compact('products'));


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
        $categoryId=$_GET['categoryId'];
        $search=$_GET['stringsrearch'];
        if($categoryId==null){
            if($search==null){
                $fullrodutct=DB::table('Products as P')
                ->select('P.id','P.name as NNa','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
                ->join('Categorys as C','P.Category_id','=','C.id')
                ->join('Brands as B','P.Brand_id','=','B.id')->get();
                return $fullrodutct;
            }
             //$search="Điện";
            $fullrodutct=DB::table('Products as P')
            ->select('P.id','P.name as NNa','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
            ->join('Categorys as C','P.Category_id','=','C.id')
            ->join('Brands as B','P.Brand_id','=','B.id')
            ->where('P.Name','LIKE','%'.$search.'%')
            ->orWhere('C.Name','LIKE','%'.$search.'%')
            ->orWhere('B.Name','LIKE','%'.$search.'%')
            ->get();
            return $fullrodutct;       

        }
        else{
            $fullrodutct=DB::table('Products as P')
            ->select('P.id','P.name as NNa','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
            ->join('Categorys as C','P.Category_id','=','C.id')
            ->join('Brands as B','P.Brand_id','=','B.id')
            ->where('C.id',$categoryId)
            ->get();
            return $fullrodutct;
        }
        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $categorys = Categorys::all();
        $brands = Brands::all();


        return view('admin.product.create', compact('categorys', 'brands'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $req)
    {
        //
        $validateData = $req->validate([
            'Name' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Stock' => 'required',
            // 'Brand_id' => 'required',
            // 'Category_id' => 'required',
            'Image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'Name.required' => 'Please Input Product Name',
            'Description.required' => 'Please Input Product Description',
            'Price.required' => 'Please Input Product Price',
            'Stock.required' => 'Please Input Product Stock',
            // 'Brand_id.required' => 'Please Input Product BrandID',
            // 'Category_id.required' => 'Please Input Product CategoryID',
            'Image.required' => 'Product Longer then 4 Characters',
        ]);

        $product_image = $req->file('Image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($product_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/product/';
        $last_img = $img_name;
        $product_image->move($up_location,$img_name);


        $data = new Products; 
        $data->Name = $req->Name; 
        $data->Description = $req->Description; 
        $data->Price = $req->Price; 
        $data->Stock = $req->Stock; 
        $data->Brand_id = $req->brand_id; 
        $data->Category_id = $req->category_id; 
        $data->Image = $last_img; 
        $data->Status = true; 
        $data->save(); 
        $products =  Products::orderBy('id', 'DESC')->get();
        return view('admin.product.index', compact('products')); 
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
    public function edit($id)
    {
        //
        $categorys = Categorys::all();
        $brands = Brands::all();
        // $selectCategory = Categorys::first()->category_id;
        
        
        return view('admin.product.edit', ['product' => Products::where('id', $id)->first()], compact('categorys', 'brands'));

    }
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $validateData = $req->validate([
            'Name' => 'required',
            'Description' => 'required',
            'Price' => 'required',
            'Stock' => 'required',
            // 'Brand_id' => 'required',
            // 'Category_id' => 'required',
            'Image' => 'required|mimes:jpg,jpeg,png',
        ],
        [
            'Name.required' => 'Please Input Product Name',
            'Description.required' => 'Please Input Product Description',
            'Price.required' => 'Please Input Product Price',
            'Stock.required' => 'Please Input Product Stock',
            // 'Brand_id.required' => 'Please Input Product BrandID',
            // 'Category_id.required' => 'Please Input Product CategoryID',
            'Image.required' => 'Product Longer then 4 Characters',
        ]);
        
        $product_image = $req->file('Image');
        $name_gen = hexdec(uniqid());
        $img_ext = strtolower($product_image->getClientOriginalExtension());
        $img_name = $name_gen.'.'.$img_ext;
        $up_location = 'images/product/';
        $last_img = $img_name;
        $product_image->move($up_location,$img_name);

        Products::where('id',$id)->update([
            'Name' => $req->Name,
            'Description' => $req->Description,
            'Price' => $req->Price,
            'Stock' => $req->Stock,
            'Brand_id' => $req->brand_id,
            'Category_id' => $req->category_id,
            'Image' => $last_img,
            'Status' => true,
        ]);
        return redirect(route('admin.product.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Products  $products
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Products::destroy($id);
        return redirect(route('admin.product.index'))->with('message','Product has been deleted.');
    }
}