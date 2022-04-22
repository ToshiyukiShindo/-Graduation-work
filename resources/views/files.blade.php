<!-- resources/views/posts.blade.php -->
@extends('layouts.lists')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <h5>File共有<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-smv ml-2" id="fileentry">File Entry</a></h5>
        <p></p>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('/files/upload') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group hidden" id="filetitle">
                タイトル
                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <!-- 投稿の本文 -->
            <div class="form-group hidden" id="filedesc">
                本文
                <div class="col-sm-6">
                    <input type="textarea" name="desc" class="form-control" style="word-wrap: normal;"></textarea>
                </div>
            </div>
            <div class="form-group hidden" id="file">
                ファイル
                <div class="col-sm-6">
                    <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
                </div>
            </div>
            <div class="form-group hidden" id="filetag">
                タグ
                <div class="col-sm-6">
                    <input type="text" name="tag" class="form-control">
                </div>
            </div>
            
            <!--　登録ボタン -->
            <div class="form-group hidden" id="filesave">
                <div class="col-sm-offset-3 col-sm-6">
                    <button type="submit" class="btn btn-primary">
                        Save
                    </button>
                </div>
            </div>
        </form>
        @endif
    </div>
    
    <!-- 全ての投稿リスト -->

    <div class="shadow mb-4 p-2 d-flex">
        @if(Auth::user()->org == 'all')
        @foreach($files as $file)
        <div class="card m-1" style="width: 18rem;">
          <img src="{{'uploads/'.$file->img_url}}" class="card-img-top font-weight-bold" style="height:200px;">
            <div class="card-body">
                <h5 class="card-title">{{$file->title}}<br>
                <hr>
                    <span class="small bg-primary text-light px-1">{{$file->org}}</span>
                    <span class="small ml-2 bg-info text-light px-1">{{$file->tag}}</span>
                </h5>
                <hr>
                <div class="d-flex">
                    <form action="{{ url('filedetail/'.$file->id) }}" method="GET" name="id"> 
                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-info">詳細</button>
                    </form>
                    <form action="{{ url('file/'.$file->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger ml-1">削除</button>
                    </form>
                </div>
                </div>
        </div>
        @endforeach
        @else
        @foreach($storefiles as $storefile)
        <div class="card m-1" style="width: 18rem;">
          <img src="{{'uploads/'.$storefile->img_url}}" class="card-img-top font-weight-bold" style="height:200px;">
            <div class="card-body">
                <h5 class="card-title">{{$storefile->title}}<br>
                <hr>
                    <span class="small bg-success text-light px-1">{{$storefile->org}}</span>
                    <span class="small ml-2 bg-info text-light px-1">{{$storefile->tag}}</span>
                </h5>
                <hr>
                <div class="d-flex">
                    <form action="{{ url('filedetail/'.$storefile->id) }}" method="GET" name="id"> 
                    {{ csrf_field() }}
                        <button type="submit" class="btn btn-sm btn-primary">詳細</button>
                    </form>
                    <form action="{{ url('file/'.$storefile->id) }}" method="POST">
                    {{ csrf_field() }}
                    {{ method_field('DELETE') }}
                        <button type="submit" class="btn btn-sm btn-danger ml-1">削除</button>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        @endif
        
    </div>

<script src="{{ asset('js/fileentry.js')}}"></script>
   
@endsection