<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Carts;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Str;

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

        return $this->index();
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
        
        return $this->index();
        }else{
        return -1;
        }
    }

    public function deleteAll(){
        $id=$_GET['id'];
        $user=DB::table('accounts')->where('id',$id)->get();

        if($user->count()==true){
        DB::table('carts')->where('AccountId',$id)->delete();

        return $this->index();
        }

        return -1;
    }

    public function ordernow()
    {
        $id=$_POST['id'];
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $total=0;

        $user=DB::table('accounts')->where('id',$id)->get();
        $Cart=DB::table('Carts as C')
        ->join('Products as P','C.ProductID','=','P.id')
        ->where('AccountId',$id)->get();
        
        if($user->count()==true && $Cart->count()==true){

        $currennt = Carbon::now('Asia/Ho_Chi_Minh');
        $code=Str::uuid()->toString();
        foreach($Cart as $carts){
            $total+=($carts->Quantity*$carts->Price);
        }
        
        DB::table('invoices')->insertGetId(['Code'=>$code,'AccountID'=>$id,'IsuedData'=>$currennt,'ShoppingAddress'=>$address,'ShoppingPhone'=>$phone,'Total'=>$total,'Status'=>0]);

        $idInvoice=DB::table('invoices')->where('Code',$code)->value('id');
        
        foreach($Cart as $itemcart){
            DB::table('invoice_details')->insertGetId(['InvoiceID'=>$idInvoice,'ProductID'=>$itemcart->ProductID,'Quantity'=>$itemcart->Quantity,'UnitPice'=>$itemcart->Quantity*$itemcart->Price]);
        
            $p=DB::table('products')->where('id',$itemcart->ProductID)->value('Stock');
            DB::table('products')->where('id',$itemcart->ProductID)->update(['Stock'=>$p-$itemcart->Quantity]);
        }
    
        DB::table('carts')->where('AccountId',$id)->delete();

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
            if($quantity<0||$quantity>$product){
                return -1;
            }

            DB::table('carts')
            ->where('ProductID', $ProductID)
            ->where('AccountId', $id)->update(['Quantity'=>$quantity]); 
        
            $Cart=DB::table('Carts as C')
        ->join('Products as P','C.ProductID','=','P.id')
        ->where('AccountId',$id)->get();
        return $Cart;
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
