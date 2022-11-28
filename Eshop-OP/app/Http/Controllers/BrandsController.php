<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Brands;

class BrandsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $brands = Brands::orderBy('id', 'DESC')->get();
        return View('brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('brand.create');
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
        ],
        [
            'Name.required' => 'Please Input Brand Name',
            'Description.required' => 'Please Input Brand Description',
        ]);
        $data = new Brands; 
        $data->Name = $req->Name; 
        $data->Description = $req->Description; 
        $data->save(); 
        $brands = Brands::orderBy('id','DESC')->get();
        return view('brand.index', compact('brands')); 
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Brands $brans
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Brands $brans
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('brand.edit', ['brand' => Brands::where('id', $id)->first()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Brands $brans
     * @return \Illuminate\Http\Response
     */
    public function update(Request $req, $id)
    {
        //
        $validateData = $req->validate([
            'Name' => 'required',
            'Description' => 'required',
        ],
        [
            'Name.required' => 'Please Input Product Name',
            'Description.required' => 'Please Input Product Description',
        ]);
        Brands::where('id',$id)->update([
            'Name' => $req->Name,
            'Description' => $req->Description,
        ]);
        return redirect(route('brand.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Brands $brans
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        Brands::destroy($id);
        return redirect(route('brand.index'))->with('message','Brand has been deleted.');
    }
}