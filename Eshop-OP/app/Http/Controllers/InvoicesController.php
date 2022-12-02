<?php

namespace App\Http\Controllers;

use App\Models\Invoices;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;


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
    public function abc(){
        return 1;
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   


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
    public function update(Request $request, Invoices $invoices)
    {
        //
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
}
