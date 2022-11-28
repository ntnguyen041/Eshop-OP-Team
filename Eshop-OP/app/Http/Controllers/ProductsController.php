<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;

use App\Models\Products;
use App\Models\Categorys;
use App\Models\Brands;
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
        $products = Products::orderBy('id', 'DESC')->get();
        
        return View('product.index', compact('products'));
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

        return view('product.create', compact('categorys', 'brands'));
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
        return view('product.index', compact('products')); 
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
        
        return view('product.edit', ['product' => Products::where('id', $id)->first()], compact('categorys', 'brands'));
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
        return redirect(route('product.index'));
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
        return redirect(route('product.index'))->with('message','Product has been deleted.');
    }
}