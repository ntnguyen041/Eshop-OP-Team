<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Categorys;
use Illuminate\Support\Facades\DB;


class CategorysController extends Controller
{
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function indexuser(){
        $Categorys=DB::table('categorys')->get();
        return $Categorys;
    }

    public function index()
    {

        $categorys = Categorys::orderBy('id', 'DESC')->get();
        return View('admin.category.index', compact('categorys'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('admin.category.create');
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
            'Name.required' => 'Please Input Category Name',
            'Description.required' => 'Please Input Category Description',
        ]);
        $data = new Categorys; 
        $data->Name = $req->Name; 
        $data->description = $req->Description; 
        $data->save(); 
        $categorys = Categorys::orderBy('id','DESC')->get();
        return view('admin.category.index', compact('categorys')); 
    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */

    public function show(Categorys $categorys)
    {
        //
    }

   /**
     * Display the specified resource.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        return view('admin.category.edit', ['category' => Categorys::where('id', $id)->first()]);
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */
 
    public function update(Request $req, $id)
    {
        $validateData = $req->validate([
            'Name' => 'required',
            'Description' => 'required',
        ],
        [
            'Name.required' => 'Please Input Product Name',
            'Description.required' => 'Please Input Product Description',
        ]);
        Categorys::where('id',$id)->update([
            'Name' => $req->Name,
            'description' => $req->Description,
        ]);
        return redirect(route('admin.category.index'));
    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Categorys  $categorys
     * @return \Illuminate\Http\Response
     */

    public function destroy($id)
    {
        //
        Categorys::destroy($id);
        return redirect(route('admin.category.index'))->with('message','Category has been deleted.');
    }
    
 ///// Category
  public function searchCat(){
 
    $search=$_GET['stringsearch'];
         if($search==null){ 
             $fullorder=DB::table('Categorys');
             return $fullorder;
         }else
         //$search="Điện";
         $fullorder=DB::table('Categorys')
         ->where('Name', 'LIKE','%'.$search.'%')
         ->get();
         return $fullorder; 
 }
 
    
}
