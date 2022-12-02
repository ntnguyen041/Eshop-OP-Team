<?php

namespace App\Http\Controllers;
use App\Models\InvoiceDetails;
use Illuminate\Support\Facades\DB;
use App\Models\Invoices;
use Illuminate\Http\Request;
class InvoicesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $invoices = Invoices::orderBy('id', 'DESC')->get();
        return view('admin.order.index', compact('invoices'));
    }
    public function orderPendingApproval(){
        $invoices = Invoices::where('Status', '=', 0,)->orderBy('id', 'DESC')->get();
        return view('admin.order.pendingapprovel', compact('invoices'));
    }
    public function orderApproval(){
        $invoices = Invoices::where('Status', '=', 2,)->orderBy('id', 'DESC')->get();
        return view('admin.order.approvel', compact('invoices'));
    }
    public function orderPendingApprovalDetail($id){
        $invoiceDetails = InvoiceDetails::all()->where('Invoice_id', '=', $id);
        return view('admin.order.orderdetail', ['invoice' => Invoices::where('id', $id)->first()], compact('invoiceDetails'));
    }
    public function invoiceDetail($id){
        $invoiceDetails = InvoiceDetails::all()->where('Invoice_id', '=', $id);
        return view('admin.order.InvoiceDetail', ['invoice' => Invoices::where('id', $id)->first()], compact('invoiceDetails'));
    }
    public function updateDelivery($id){
        Invoices::where('id',$id)->update([
            
            'Status' => 3,
        ]);
        $invoices = Invoices::where('Status', '=', 2,)->orderBy('id', 'DESC')->get();
        return view('admin.order.approvel', compact('invoices'));
    }
    public function orderDelivery(){
        $invoices = Invoices::where('Status', '=', 3,)->orderBy('id', 'DESC')->get();
        return view('admin.order.orderdelivery', compact('invoices'));
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
    
    public function updateSuccesfulDelivery($id){
        Invoices::where('id',$id)->update([
            'Status' => 1,
        ]);
        $invoices = Invoices::where('Status', '=', 3,)->orderBy('id', 'DESC')->get();
        return view('admin.order.orderdelivery', compact('invoices'));
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
     * @return \Illuminate\Http\Response0
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function show(Invoices $invoices)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function edit(Invoices $invoices)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        Invoices::where('id',$id)->update([
            
            'Status' => 2,
        ]);
        return redirect(route('admin.order.orderPendingApproval'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Invoices  $invoices
     * @return \Illuminate\Http\Response
     */
    public function destroy(Invoices $invoices)
    {
        //
    }


    public function history()
    {
        $account = $_GET['id'];
         $oder = DB::table('invoices')->where('Account_id',$account)->get();
        return $oder;
    }
    
    public function orderDetail($id){
        $Details = InvoiceDetails::all()->where('Invoice_id', '=', $id);
        
        return view('/orderuser/details', ['invoice' => Invoices::where('id', $id)->first()], compact('Details'));
    }
    
}
