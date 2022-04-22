<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;
use App\Models\File;
use App\Http\Controllers\FilesController;//追記

class FilesController extends Controller
{

    public function __construct(){
    $this->middleware('auth');
    }
    
    public function index(){
    $user = Auth::user();
    return view('files',compact('user'));
    }

    
    // 画像アップロード処理
    public function upload(Request $request){

   // バリデーション 
    $validator = $request->validate( [
        'img' => 'required|file|image|max:2048', 
    ]);

    // 画像ファイル取得
    $file = $request->img;

    // ログインユーザー取得
    $user = Auth::user();

    if ( !empty($file) ) {

        // ファイルの拡張子取得
        $ext = $file->guessExtension();

        //ファイル名を生成
        $fileName = Str::random(32).'.'.$ext;

        // 画像のファイル名を任意のDBに保存
        $files = new File;
        $files->title = $request->title;
        $files->desc = $request->desc;
        $files->user_id = $user->id;
        $files->org = $user->org;
        $files->img_url = $fileName;
        $files->tag = $request->tag;
        $files->save();

        //public/uploadフォルダを作成
        $target_path = public_path('/uploads/');

        //ファイルをpublic/uploadフォルダに移動
        $file->move($target_path,$fileName);

    }else{

        return redirect('/home');
        }

        return redirect('/files');

    }
    

}
