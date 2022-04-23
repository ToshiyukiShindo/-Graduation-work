<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BoardsController;//追記
use Illuminate\Support\Str;
use App\Models\Post; //追加
use App\Models\User;//追加
use App\Models\Board;//追加
use Auth;//追加
use Validator;//追加

class BoardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
          // ユーザーIDをセッションに登録
        $user_id = $request->session()->get('user_id', Str::random(20));
        session(['user_id' => $user_id]);
        // ユーザー名を変数に登録（デフォルト値：Guest）
        $user_name = $request->session()->get('user_name', 'Guest');
        // データーベースの件数を取得
        $length = Board::all()->count();
        
        // 表示する件数を代入
        $display = 15;
        $boards = Board::offset($length-$display)->limit($display)->get();
        return view('boards',compact('boards','length','display','user_id','user_name'));
    }
    public function index0(Request $request)
    {
          // ユーザーIDをセッションに登録
        $user_id = $request->session()->get('user_id', Str::random(20));
        session(['user_id' => $user_id]);
        // ユーザー名を変数に登録（デフォルト値：Guest）
        $user_name = $request->session()->get('user_name', 'Guest');
        // データーベースの件数を取得
        $length = Board::all()->count();
        
        // 表示する件数を代入
        $display = 15;
        $boards = Board::offset($length-$display)->limit($display)->get();
        return view('boards0',compact('boards','length','display','user_id','user_name'));
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
        // ユーザー名をフォームから取得してセッションに登録
        session(['user_name' => $request->user_name]);
        $boards = new Board;
        $form = $request->all();
        $boards->fill($form)->save();
        return redirect('/boards',compact('boards'));
    }
    public function store0(Request $request)
    {
        // ユーザー名をフォームから取得してセッションに登録
        session(['user_name' => $request->user_name]);
        $boards = new Board;
        $form = $request->all();
        $boards->fill($form)->save();
        return redirect('/boards0',compact('boards'));
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
