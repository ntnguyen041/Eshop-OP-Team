<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Carts;
use Illuminate\Http\Request;

class CartsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $id=$_GET['id'];
        $Cart=DB::table('Carts as C')
        ->join('Products as P','C.ProductID','=','P.id')
        ->where('AccountId',$id)->get();
        return $Cart;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addTocart()
    {
        $ProductID=$_GET['idproduct'];
        $id=$_GET['id'];

        $product=DB::table('products')->where('id',$ProductID)->get();
        if($product->count()==true){
        $up=DB::table('carts')
        ->where('ProductID', $ProductID)
        ->where('AccountId', $id)->get();  

        if($up->count()==true){
            $Stock=DB::table('products')->where('id',$ProductID)->value('Stock');
        $quantity=DB::table('carts')
        ->where('ProductID', $ProductID)
        ->where('AccountId', $id)->value('Quantity'); 
        if($quantity>=$Stock){
            return -1;
        }
        
        DB::table('carts')
        ->where('ProductID', $ProductID)
        ->where('AccountId', $id)->update(['Quantity'=> $quantity+1]); 
        }else{
            DB::table('carts')->insertGetId(['AccountId'=>$id,'ProductID'=>$ProductID,'Quantity'=>1]);
        }
        return 1;
    }
        return -1;
    }

    public function remove(){
        $ProductID=$_GET['idproduct'];
        $id=$_GET['id'];

        $up=DB::table('carts')
        ->where('ProductID', $ProductID)
        ->where('AccountId', $id)->get();  
        if($up->count()==true){
            DB::table('carts')
        ->where('ProductID', $ProductID)
        ->where('AccountId', $id)->delete(); 
        
        return 1;
        }else{
        return -1;
        }
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
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function show(Carts $carts)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function edit(Carts $carts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function update()
    {
        $ProductID=$_GET['ProductID'];
        $id=$_GET['Id'];
        $quantity=$_GET['Quantity'];

        $up=DB::table('carts')
        ->where('ProductID', $ProductID)
        ->where('AccountId', $id)->get();  
        if($up->count()==true){
            $product=DB::table('products')->where('id',$ProductID)->value('Stock');
            if($quantity<0&&$quantity>$product){
                return -1;
            }

            DB::table('carts')
            ->where('ProductID', $ProductID)
            ->where('AccountId', $id)->update(['Quantity'=>$quantity]); 
        
            return 1;
        }else{
            return -1;
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Carts  $carts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Carts $carts)
    {
        //
    }
}
