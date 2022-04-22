<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;
use App\Models\User;
use App\Models\Store;
use Validator;
use App\Http\Controllers\HomeController;//追記
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;

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
        $storeservicesales = Sale::selectRaw('SUM(service_sales) as service_sales')
        ->where('store_name',\Auth::user()->org)
        ->get();
        $loyalitys = Sale::selectRaw('SUM(loyality) as loyality')->get();
        $storeloyalitys = Sale::selectRaw('SUM(loyality) as loyality')
        ->where('store_name',\Auth::user()->org)
        ->get();
        $goodssales = Sale::selectRaw('SUM(goods_sales) as goods_sales')->get();
        $storegoodssales = Sale::selectRaw('SUM(goods_sales) as goods_sales')
        ->where('store_name',\Auth::user()->org)
        ->get();
        $othersales = Sale::selectRaw('SUM(other_sales) as other_sales')->get();
        $storeothersales = Sale::selectRaw('SUM(other_sales) as other_sales')
        ->where('store_name',\Auth::user()->org)
        ->get();
        return view('salesSummary',compact('servicesales','loyalitys','goodssales','othersales','storeservicesales','storeloyalitys','storegoodssales','storeothersales','termsales','storesales'));
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
        $storeservicesales = Sale::selectRaw('SUM(service_sales) as service_sales')
        ->where('store_name',\Auth::user()->org)
        ->get();
        $loyalitys = Sale::selectRaw('SUM(loyality) as loyality')->get();
        $storeloyalitys = Sale::selectRaw('SUM(loyality) as loyality')
        ->where('store_name',\Auth::user()->org)
        ->get();
        $goodssales = Sale::selectRaw('SUM(goods_sales) as goods_sales')->get();
        $storegoodssales = Sale::selectRaw('SUM(goods_sales) as goods_sales')
        ->where('store_name',\Auth::user()->org)
        ->get();
        $othersales = Sale::selectRaw('SUM(other_sales) as other_sales')->get();
        $storeothersales = Sale::selectRaw('SUM(other_sales) as other_sales')
        ->where('store_name',\Auth::user()->org)
        ->get();
        return view('salesSummary0',compact('servicesales','loyalitys','goodssales','othersales','storeservicesales','storeloyalitys','storegoodssales','storeothersales','termsales','storesales'));
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
        return redirect('/top')
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
    public function store0(Request $request)
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
         
         return redirect('/salesentry0');
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
        $stores = Store::where('id','!=','1')->get();
        return view('salesEntry',compact('sales','stores'));

    }
    public function show0()
    {
        $sales = Sale::get();
        $orgsales = Sale::where('store_name',\Auth::user()->org)->get();
        return view('salesEntry0',compact('sales','orgsales'));

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
    public function destroy(Sale $sale)
    {
             $sale->delete();       //追加
             return redirect('/salesentry');  //追加

    }
    
        //CSVinport関連
    // 一覧表示処理
  public function csvindex(Request $request){

    $data = Sale::latest()->get(); // データ登録対象のテーブルからデータを取得する
    $count = $request->input('count'); // 何件登録したか結果を返す

    return view('salescsv',['data' => $data,'cnt' => $count]);
  }


  // CSVアップロード〜DBインポート処理
  public function upload(Request $request) {

    // 一旦アップロードされたCSVファイルを受け取り保存する
    $uploaded_file = $request->file('csvdata'); // inputのnameはcsvdataとする 
    $orgName = date('YmdHis') ."_".$request->file('csvdata')->getClientOriginalName();
    $spath = storage_path('app/');
    $path = $spath.$request->file('csvdata')->storeAs('',$orgName);

    // CSVファイル（エクセルファイルも可）を読み込む
    $result = (new FastExcel)->importSheets($path); //エクセルファイルをアップロードする時はこちら
    // $result = (new FastExcel)->configureCsv(',')->importSheets($path); // カンマ区切りのCSVファイル時

    // DB登録処理
    $count = 0; // 登録件数確認用
    foreach ($result as $row) {
      foreach($row as $item){
        // ここでCSV内データとテーブルのカラムを紐付ける（左側カラム名、右側CSV１行目の項目名）
        $param = [
          'term' => ''.$item["term"].'',
          'store_org_code' => ''.$item["store_org_code"].'',
          'store_name' => ''.$item["store_name"].'',
          'service_sales' => ''.$item["service_sales"].'',
          'loyality' => ''.$item["loyality"].'',
          'goods_sales' => ''.$item["goods_sales"].'',
          'other_sales' => ''.$item["other_sales"].'',
          'created_at' => ''.$item["created_at"].'',
          'updated_at' => ''.$item["updated_at"].'',
        ];
        // 次にDBにinsertする（更新フラグなどに対応するため１行ずつinsertする）
        DB::table('sales')->insert($param);
        $count++;
      }
    }
    return redirect(route('csv',['count' => $count]));
  }

    
    
}
