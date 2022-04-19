<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Store;
use App\Models\Post; //この行を上に追加
use App\Models\User;//この行を上に追加
use Validator;

class StoresController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
            $stores = Store::get();
         return view('stores', [
             'stores' => $stores
         ]);
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
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                //バリデーション
        $validator = Validator::make($request->all(), [
        'store_org_code' => 'required|max:255',
        ]);
        
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/home')
        ->withInput()
        ->withErrors($validator);
        }
        
         // Eloquent モデル
         $stores = new Store;
         $stores->store_org_code = $request->store_org_code;
         $stores->store_name = $request->store_name;
         $stores->save(); 
         
         return redirect('/stores');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Store $store)
    {
        return view('storesedit',[
            'store'=>$store
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
{
    //バリデーション
    $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
    ]);
    //バリデーション:エラー 
    if ($validator->fails()) {
        return redirect('/')
            ->withInput()
            ->withErrors($validator);
    }
    // Eloquent モデル
    $stores = Store::find($request->stores_id);
    $stores->stores_org_code = $request->stores_org_code;
    $stores->stores_name = $request->stores_name;
    $books->save(); 
    return redirect('/stores');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Store $store)
    {
             $store->delete();       //追加
             return redirect('/stores');  //追加
    }
}
