<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\File;
use App\Http\Controllers\FilesController;//追記
use App\Http\Controllers\StoresController;//
use Illuminate\Support\Facades\Storage;

class FilesController extends Controller
{

    public function __construct(){
    $this->middleware('auth');
    }
    
    public function index(){
    $user = Auth::user();
    $files = File::get();
    $storefiles = File::where('org',$user->org)->get();
    return view('files',compact('user','files','storefiles'));
    }
    
    public function detail(File $file){
        $id = $file->id;
        $files = File::where('id',$id)->get();
        return view('filedetail',compact('id','files'));
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
    
    public function destroy(File $file)
    {
             $file->delete();       //追加
             return redirect('/files');  //追加
    }
    
    public function filedl(File $file){
        $id = $file->id;
        $name = $file->getClientOriginalName();
        $path = $file->store('test');

        return $this->fill(compact('name', 'path'))->save();
        }

}
