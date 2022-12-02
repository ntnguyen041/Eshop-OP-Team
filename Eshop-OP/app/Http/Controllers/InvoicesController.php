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

        $invoiceId=$_GET['invoiceId'];
        $search=$_GET['stringsrearch'];
        if($invoiceId==null){
            if($search==null){
                $fullorder=DB::table('Invoices as I')
                ->select('I.id', 'I.code', 'A.name', 'I.IsuedData', 'I.Total')
                ->join('AccountID as A','I.id','=','A.id');
                return $fullorder;
            }
             //$search="Điện";
            $fullorder=DB::table('Invoices as I')
            ->select('I.id', 'I.code', 'A.name', 'I.IsuedData', 'I.Total')
            // ->join('Categorys as C','P.Category_id','=','C.id')
            // ->join('Brands as B','P.Brand_id','=','B.id')
            ->where('I.IussedData','LIKE','%'.$search.'%')
            // ->orWhere('C.Name','LIKE','%'.$search.'%')
            // ->orWhere('B.Name','LIKE','%'.$search.'%')
            ->get();
            return $fullorder;
        }
        else{
            $fullorder=DB::table('Products as P')
            ->select('I.id', 'I.code', 'A.name', 'I.IsuedData', 'I.Total')
            // ->join('Categorys as C','P.Category_id','=','C.id')
            // ->join('Brands as B','P.Brand_id','=','B.id')
            ->where('I.IssuedData',$invoiceId)
            ->get();
            return $fullorder;
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
