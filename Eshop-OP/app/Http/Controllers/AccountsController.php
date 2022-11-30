<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Accounts;
use Illuminate\Http\Request;

class AccountsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user=$_GET['user'];
        $pass=$_GET['pass'];
        
        $accounts = DB::table('accounts')->where('username', $user)->where('password',$pass)->get();
        if(!empty($accounts)){
            return $accounts;//response()->json($accounts, 200);
        }
        else
            return -1;
    }
    public function detail()
    {
        $user=$_GET['id'];
        $account = DB::table('accounts')->where('id', $user)->get();
        return $account;//response()->json($accounts, 200);
       
    }
    public function update()
    {
        $id=$_POST['id'];
        $fullname=$_POST['fullname'];
        $email=$_POST['email'];
        $phone=$_POST['phone'];
  
        $address=$_POST['address'];

         $up=DB::table('accounts')
                     ->where('id', $id)
                    ->update(['Email'=> $email,'FullName' => $fullname,'Address'=>$address,'Phone'=>$phone]);
        return $up;//response()->json($accounts, 200);
    }

    public function createAccount(){
        $fullname =$_POST['fullname'];
        $user =$_POST['user'];
        $pass =$_POST['pass'];
        $accountErr=DB::table('accounts')->where('username',$user)->get();
        if($accountErr->count()){
            return -1;
        }
        else{
            DB::table('accounts')->insertGetId(['username' => $user, 'Password' => $pass,'FullName'=>$fullname,'IsAdmin'=>0,'Status'=>1]);
            return 1;
        }
       
        
    }


    // public function detail()
    // {
    //     $user=1;
    //     $account = DB::table('accounts')->where('id', $user)->get();
    //     return $account;//response()->json($accounts, 200);
       
    // }

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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function show(Accounts $accounts)
    {
        //
    }
   

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function edit(Accounts $accounts)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, Accounts $accounts)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Accounts  $accounts
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accounts $accounts)
    {
        //
    }
}