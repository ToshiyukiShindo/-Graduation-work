<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post; //この行を上に追加
use App\Models\Store; //この行を上に追加
use App\Models\Sale;
use App\Models\Board;
use Validator;
use App\Http\Controllers\HomeController;//追記
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use Rap2hpoutre\FastExcel\FastExcel;
use Illuminate\Support\Facades\Storage;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');

    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $date = date_create() ;
        $date = date_format($date , 'Y-m');
        $year = date_create() ;
        $year = date_format($year , 'Y');
        $today = date_create();
        $today = date_format($today , 'm-d');
        $total_thismonth_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_mtotal')
        ->where('term',$date)->get();
        $total_thisyear_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_ytotal')
        ->where('term','LIKE',$year.'%')->get();
        $message_counts = Board::where('created_at','LIKE','%'.$today.'%')
        ->selectRaw('COUNT(id) as message_counts')
        ->get();
        $counts = Sale::select('term')
        ->selectRaw('COUNT(id) as count_records')
        ->where('created_at','LIKE',$date.'%')
        ->groupBy('term')
        ->get();
        $posts = Post::latest('updated_at')->take(2)->get();
        return view('top0',compact('posts','date','year','total_thismonth_sales','total_thisyear_sales','counts','message_counts','today'));

    }
    
    public function index2()
    {
        $users = User::get();
        $date = date_create() ;
        $date = date_format($date , 'Y-m');
        $year = date_create() ;
        $year = date_format($year , 'Y');
        $today = date_create();
        $today = date_format($today , 'm-d');
        $total_thismonth_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_mtotal')
        ->where('term',$date)->get();
        $total_thisyear_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_ytotal')
        ->where('term','LIKE',$year.'%')->get();
        $message_counts = Board::where('created_at','LIKE','%'.$today.'%')
        ->selectRaw('COUNT(id) as message_counts')
        ->get();
        $counts = Sale::select('term')
        ->selectRaw('COUNT(id) as count_records')
        ->where('created_at','LIKE',$date.'%')
        ->groupBy('term')
        ->get();
        $posts = Post::latest('updated_at')->take(2)->get();
        return view('top',compact('users','posts','date','year','total_thismonth_sales','total_thisyear_sales','counts','message_counts','today'));
    }
    
    public function gulist()
    {
        $users = User::where('permission','!=',1)->get();
        $stores = Store::get();
        return view('genuser',compact('users','stores'));
            }
    public function gulist0()
    {
        $users = User::where('permission','!=',1)->get();
        $orgusers = User::where('permission','!=',1)->where('org',\Auth::user()->org)->get();
        $stores = Store::get();
        return view('genuser0',compact('users','orgusers','stores'));
            }
    
    public function guup(Request $request) {
        //
  }
    
        public function syslist()
    {
        $users = User::where('permission',1)->get();
        return view('sysuser',compact('users'));
    }
    
        public function stores()
    {
        return view('stores');
    }
    
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
        'name' => 'required|max:255',
        ]);
        
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/top')
        ->withInput()
        ->withErrors($validator);
        }
        
         // Eloquent モデル
         $users = new User;
         $users->name = $request->name;
         $users->email = $request->email;
         $users->permission = $request->permission;
         $users->org = $request->org;
         $users->password = Hash::make($request->password);
         $users->save(); 
         
         return redirect('/generalusers');
    }
    public function store0(Request $request)
    {
                //バリデーション
        $validator = Validator::make($request->all(), [
        'name' => 'required|max:255',
        ]);
        
        //バリデーション:エラー 
        if ($validator->fails()) {
        return redirect('/home')
        ->withInput()
        ->withErrors($validator);
        }
        
         // Eloquent モデル
         $users = new User;
         $users->name = $request->name;
         $users->email = $request->email;
         $users->permission = $request->permission;
         $users->org = $request->org;
         $users->password = Hash::make($request->password);
         $users->save(); 
         
         return redirect('/generalusers0');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $id = $user->id;
        $tests = User::where('id',$id)->get();
        return view('usersedit',compact('id','tests'));
        // return view('usersedit',[
        //     'user'=>$user
        // ]);

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
    $user = User::where('id',$request->id)->update(
    [
    $user->name = $request->name,
    $user->email = $request->email,
    $user->permission = $request->permission,
    $user->org = $request->org,
    ]);
    return redirect('/generalusers');
}
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
             $user->delete();       //追加
             return redirect('/generalusers');  //追加
    }
    
    
    
    //CSVinport関連
    // 一覧表示処理
  public function csvindex(Request $request){

    $data = User::latest()->get(); // データ登録対象のテーブルからデータを取得する
    $count = $request->input('count'); // 何件登録したか結果を返す

    return view('usercsv',['data' => $data,'cnt' => $count]);
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
          'name' => ''.$item["name"].'',
          'email' => ''.$item["email"].'',
          'permission' => ''.$item["permission"].'',
          'org' => ''.$item["org"].'',
          'password' => ''.Hash::make($item["password"]).'',
          'created_at' => ''.$item["created_at"].'',
          'updated_at' => ''.$item["updated_at"].'',
        ];
        // 次にDBにinsertする（更新フラグなどに対応するため１行ずつinsertする）
        DB::table('users')->insert($param);
        $count++;
      }
    }
    return redirect(route('csv',['count' => $count]));
  }
    
}


