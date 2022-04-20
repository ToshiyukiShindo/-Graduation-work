<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post; //この行を上に追加
use App\Models\Store; //この行を上に追加
use App\Models\Sale;
use Validator;
use App\Http\Controllers\HomeController;//追記
use Illuminate\Support\Facades\Hash;

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
        $total_thismonth_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_mtotal')
        ->where('term',$date)->get();
        $total_thisyear_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_ytotal')
        ->where('term','LIKE',$year.'%')->get();
        $counts = Sale::select('term')
        ->selectRaw('COUNT(id) as count_records')
        ->where('created_at','LIKE',$date.'%')
        ->groupBy('term')
        ->get();
        $posts = Post::latest('updated_at')->take(2)->get();
        return view('top0',compact('posts','date','year','total_thismonth_sales','total_thisyear_sales','counts'));

    }
    
    public function index2()
    {
        $date = date_create() ;
        $date = date_format($date , 'Y-m');
        $year = date_create() ;
        $year = date_format($year , 'Y');
        $total_thismonth_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_mtotal')
        ->where('term',$date)->get();
        $total_thisyear_sales = Sale::selectRaw('SUM(service_sales+loyality+goods_sales+other_sales) as sales_ytotal')
        ->where('term','LIKE',$year.'%')->get();
        $counts = Sale::select('term')
        ->selectRaw('COUNT(id) as count_records')
        ->where('created_at','LIKE',$date.'%')
        ->groupBy('term')
        ->get();
        $posts = Post::latest('updated_at')->take(2)->get();
        return view('top',compact('posts','date','year','total_thismonth_sales','total_thisyear_sales','counts'));
    }
    
    public function gulist()
    {
        $users = User::where('permission',0)->get();
        $stores = Store::get();
        return view('genuser',compact('users','stores'));
            }
    public function gulist0()
    {
        $users = User::where('permission',0)->get();
        $orgusers = User::where('permission',0)->where('org',\Auth::user()->org)->get();
        return view('genuser0',compact('users','orgusers'));
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
        return view('usersedit',[
            'user'=>$user
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
    $users = User::find($request->id);
    $users->save(); 
    return redirect('/users');
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
}


