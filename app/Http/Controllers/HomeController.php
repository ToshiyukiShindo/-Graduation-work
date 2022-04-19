<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Post; //この行を上に追加
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
        return view('home');
    }
    
    public function index2()
    {
        $posts = Post::latest('updated_at')->take(2)->get();
        return view('top',compact('posts'));
    }
    
    public function gulist()
    {
        $users = User::where('permission',0)->get();
        return view('genuser',compact('users'));
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
         
         return redirect('/generalusers');
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


