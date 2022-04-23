<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\BoardsController;//追記
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
    public function index()
    {
        // データーベースの件数を取得
        $length = Board::all()->count();
        // 表示する件数を代入
        $display = 15;
        $boards = Board::offset($length-$display)->limit($display)->get();
        return view('boards',compact('boards','length','display'));
    }
    public function index0()
    {
        return view('boards0');
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
        $boards = new Board;
        $form = $request->all();
        $boards->fill($form)->save();
        return redirect('/boards');
    }
    public function store0(Request $request)
    {
        $boards = new Board;
        $form = $request->all();
        $boards->fill($form)->save();
        return redirect('/boards0');
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
