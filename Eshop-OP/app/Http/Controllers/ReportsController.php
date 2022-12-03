<?php

namespace App\Http\Controllers;
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
    public function reportBusiness(Request $req)
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
}