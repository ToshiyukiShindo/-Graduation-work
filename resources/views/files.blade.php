<!-- resources/views/posts.blade.php -->
@extends('layouts.lists')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <h5>File共有</h5>
        <p></p>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('/files/upload') }}" method="post" enctype="multipart/form-data">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                タイトル
                <div class="col-sm-6">
                    <input type="text" name="title" class="form-control">
                </div>
            </div>
            <!-- 投稿の本文 -->
            <div class="form-group">
                本文
                <div class="col-sm-6">
                    <input type="textarea" name="desc" class="form-control" style="word-wrap: normal;"></textarea>
                </div>
            </div>
            <div class="form-group">
                ファイル
                <div class="col-sm-6">
                    <input id="fileUploader" type="file" name="img" accept='image/' enctype="multipart/form-data" multiple="multiple" required autofocus>
                </div>
            </div>
            <div class="form-group">
                タグ
                <div class="col-sm-6">
                    <input type="text" name="tag" class="form-control">
                </div>
            </div>
            
            <!--　登録ボタン -->
            <div class="form-group">
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

    
   
@endsection