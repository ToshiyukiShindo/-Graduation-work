<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use Validator;
use App\Http\Controllers\HomeController;//追記

class SalesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('salesEntry');
    }
    public function index0()
    {
        return view('/salesEntry0');
    }
    public function index2()
    {
        $termsales = Sale::select('term')
        ->selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_total')
        ->groupBy('term')
        ->get();
        $storesales = Sale::select('store_name')
        ->selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_total')
        ->groupBy('store_name')
        ->get();
        $servicesales = Sale::selectRaw('SUM(service_sales) as service_sales')->get();
        $loyalitys = Sale::selectRaw('SUM(loyality) as loyality')->get();
        $goodssales = Sale::selectRaw('SUM(goods_sales) as goods_sales')->get();
        $othersales = Sale::selectRaw('SUM(other_sales) as other_sales')->get();
        return view('salesSummary',compact('servicesales','loyalitys','goodssales','othersales','termsales','storesales'));
    }
    public function index20()
    {
        $termsales = Sale::select('term')
        ->selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_total')
        ->groupBy('term')
        ->get();
        $storesales = Sale::select('store_name')
        ->selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_total')
        ->groupBy('store_name')
        ->get();
        $servicesales = Sale::selectRaw('SUM(service_sales) as service_sales')->get();
        $loyalitys = Sale::selectRaw('SUM(loyality) as loyality')->get();
        $goodssales = Sale::selectRaw('SUM(goods_sales) as goods_sales')->get();
        $othersales = Sale::selectRaw('SUM(other_sales) as other_sales')->get();
        return view('salesSummary0',compact('servicesales','loyalitys','goodssales','othersales','termsales','storesales'));
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
            'service_sales' => 'required|max:255',
        ]);
        
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/home')
        ->withInput()
        ->withErrors($validator);
        }
        
      // Eloquent モデル
         $sales = new Sale;
         $sales->term = $request->term;
         $sales->store_org_code = $request->store_org_code;
         $sales->store_name = $request->store_name;
         $sales->service_sales = $request->service_sales;
         $sales->loyality = $request->loyality;
         $sales->goods_sales = $request->goods_sales;
         $sales->other_sales = $request->other_sales;
         $sales->save(); 
         
         return redirect('/salesentry');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        $sales = Sale::get();
        return view('salesEntry',compact('sales'));

    }
    public function show0()
    {
        $sales = Sale::get();
        return view('salesEntry0',compact('sales'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
