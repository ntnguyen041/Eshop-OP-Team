<?php

namespace App\Http\Controllers;

use App\Models\Accounts;
use Illuminate\Support\Facades\DB;
use App\Models\Products;
use App\Models\InvoiceDetails;
use App\Models\Invoices;


use Illuminate\Http\Request;

class ReportsController extends Controller
{
    public function index()
    {

        $products = Products::all();
        $invoiceDetails = InvoiceDetails::all();
        $total = 0;
        foreach($products as $product){
            foreach($invoiceDetails as $invoiceDetail){
                if($product->id == $invoiceDetail->Product_id){
                    $total += $invoiceDetail->Quantity;
                }
            }
            $lstQuantity[$product->id] = $total;
            $total = 0;
        }
        return View('admin.report.product.index', compact('products', 'invoiceDetails', 'lstQuantity'));
    }
    public function reportFromToDate(Request $req)
    {
        $products = Products::all();
        $invoicesMin = Invoices::whereBetween('IsuedData', [$req->FromDay, $req->ToDay])->orderBy('id')->value('id');
        $invoicesMax = Invoices::whereBetween('IsuedData', [$req->FromDay, $req->ToDay])->orderBy('id', 'desc')->value('id');
        $invoiceDetails = InvoiceDetails::whereBetween('Invoice_id', [$invoicesMin,  $invoicesMax])->get();
        $total = 0;
        foreach($products as $product){
            foreach($invoiceDetails as $invoiceDetail){
                if($product->id == $invoiceDetail->Product_id){
                    $total += $invoiceDetail->Quantity;
                }
            }
            $lstQuantity[$product->id] = $total;
            $total = 0;
        }
            
        // dd($lstQuantity);
        return View('admin.report.product.reportfromtodate', compact('products', 'invoiceDetails', 'lstQuantity'));
    }
    
    //Thong ke chi tieu cua khach hang
    public function list(){
        $user = Accounts::all();
        $invoice = Invoices::all();
        $total = 0;
        foreach($user as $users)
        {
            foreach($invoice as $invoices)
            {
                if($users->id == $invoices->Account_id){
                    $total += $invoices->Total;
                }
            }
            $lstTotal[$users->id] = $total;
            $total = 0;
        }
        return view('admin.report.user.index',compact('user','invoice','lstTotal'));
    }
    
    //Thong ke san pham ban chay nhat
    public function sell()
    {

        $invoiceDetails = InvoiceDetails::all();
        $total = 0;
        $products = Products::query()
        ->join('invoice_details', 'invoice_details.product_id', '=', 'products.id')
        ->selectRaw('products.*, SUM(invoice_details.Quantity) AS quantity_sold')
        ->groupBy(['products.id']) // should group by primary key
        ->orderByDesc('quantity_sold')
        ->get();
        return View('admin.report.sell.index', compact('products', 'invoiceDetails'));
    }
    public function top5()
    {

        $invoiceDetails = InvoiceDetails::all();
        $total = 0;
        $products = Products::query()
        ->join('invoice_details', 'invoice_details.product_id', '=', 'products.id')
        ->selectRaw('products.*, SUM(invoice_details.Quantity) AS quantity_sold')
        ->groupBy(['products.id']) // should group by primary key
        ->orderByDesc('quantity_sold')
        ->take(5)
        ->get();
        return View('admin.report.sell.index', compact('products', 'invoiceDetails'));
    }
    public function top10()
    {

        $invoiceDetails = InvoiceDetails::all();
        $total = 0;
        $products = Products::query()
        ->join('invoice_details', 'invoice_details.product_id', '=', 'products.id')
        ->selectRaw('products.*, SUM(invoice_details.Quantity) AS quantity_sold')
        ->groupBy(['products.id']) // should group by primary key
        ->orderByDesc('quantity_sold')
        ->take(10)
        ->get();
        return View('admin.report.sell.index', compact('products', 'invoiceDetails'));
    }
    public function top15()
    {

        $invoiceDetails = InvoiceDetails::all();
        $total = 0;
        $products = Products::query()
        ->join('invoice_details', 'invoice_details.product_id', '=', 'products.id')
        ->selectRaw('products.*, SUM(invoice_details.Quantity) AS quantity_sold')
        ->groupBy(['products.id']) // should group by primary key
        ->orderByDesc('quantity_sold')
        ->take(15)
        ->get();
        return View('admin.report.sell.index', compact('products', 'invoiceDetails'));
    }
    public function top20()
    {

        $invoiceDetails = InvoiceDetails::all();
        $total = 0;
        $products = Products::query()
        ->join('invoice_details', 'invoice_details.product_id', '=', 'products.id')
        ->selectRaw('products.*, SUM(invoice_details.Quantity) AS quantity_sold')
        ->groupBy(['products.id']) // should group by primary key
        ->orderByDesc('quantity_sold')
        ->take(20)
        ->get();
        return View('admin.report.sell.index', compact('products', 'invoiceDetails'));
    }
}