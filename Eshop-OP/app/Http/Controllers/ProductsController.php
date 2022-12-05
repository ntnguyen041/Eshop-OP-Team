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
        // $categoryId=$_GET['categoryId'];
        $search=$_GET['stringsrearch'];
        // if($categoryId=="null"){
        //     // load full product
            if($search=="null"){
                $fullrodutct=DB::table('Products as P')
                ->select('P.id','P.name as NNa','Category_id','Brand_id','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
                ->join('Categorys as C','P.Category_id','=','C.id')
                ->join('Brands as B','P.Brand_id','=','B.id')->get();
            }
             // search theo ten cua san pham
             else{
                $fullrodutct=DB::table('Products as P')
                ->select('P.id','P.name as NNa','Category_id','Brand_id','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
                ->join('Categorys as C','P.Category_id','=','C.id')
                ->join('Brands as B','P.Brand_id','=','B.id')
                ->where('P.Name','LIKE','%'.$search.'%')
                ->orWhere('C.Name','LIKE','%'.$search.'%')
                ->orWhere('B.Name','LIKE','%'.$search.'%')
                ->get(); 
             }
            
            return $fullrodutct;     
        // }
        // if($categoryId!="null"){
        //     if($search=="null"){
        //         $fullrodutct=DB::table('Products as P')
        //     ->select('P.id','P.name as NNa','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
        //     ->join('Categorys as C','P.Category_id','=','C.id')
        //     ->join('Brands as B','P.Brand_id','=','B.id')
        //     ->where('C.id',$categoryId)
        //     ->get();
        //     }
        //     else{
        //         $fullrodutct=DB::table('Products as P')
        //         ->select('P.id','P.name as NNa','Category_id','Brand_id','P.Description','P.Price','P.Stock','B.Name','C.Name','P.Image')
        //         ->join('Categorys as C','P.Category_id','=','C.id')
        //         ->join('Brands as B','P.Brand_id','=','B.id')
        //         // orwhere([['P.Name','LIKE','%'.$search.'%'],['C.Name','LIKE','%'.$search.'%'],['B.Name','LIKE','%'.$search.'%']])
        //         ->where('Category_id',$categoryId)
        //         ->where('P.Name','LIKE','%'.$search.'%')
        //         ->orWhere('C.Name','LIKE','%'.$search.'%')
        //          ->orWhere('B.Name','LIKE','%'.$search.'%')
        //         ->get();
        //     }
        // }
        // return $fullrodutct;
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