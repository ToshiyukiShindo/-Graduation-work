<!-- resources/views/posts.blade.php -->
@extends('layouts.others')
@section('content')
    <!-- Bootstrapの定形コード… -->
    <div class="card-body">
        <h5>お知らせの投稿<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2" id="download">Generate Report</a></h5>

        <p></p>
        <!-- バリデーションエラーの表示に使用-->
    	@include('common.errors')
        <!-- バリデーションエラーの表示に使用-->
        <!-- 投稿フォーム -->
        @if( Auth::check() )
        <form action="{{ url('posts') }}" method="POST" class="form-horizontal">
            {{ csrf_field() }}
            <!-- 投稿のタイトル -->
            <div class="form-group">
                タイトル
                <div class="col-sm-6">
                    <input type="text" name="post_title" class="form-control">
                </div>
            </div>
            <!-- 投稿の本文 -->
            <div class="form-group">
                本文
                <div class="col-sm-6">
                    <input type="text" name="post_desc" class="form-control" style="word-wrap: normal;">
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
 @if (count($posts) > 0)
        <div class="card-body">
            <div class="card-body">
                <table class="table table-hover task-table" id="dataTable">
                    <!-- テーブルヘッダ -->
                    <h6>投稿済みのお知らせ一覧</h6>
                    <p></p>
                    <thead>
                        <th>PostID</th>
                        <th>title</th>
                        <th>本文</th>
                        <th>配信日時</th>
                        <th>&nbsp;</th>
                    </thead>
                    <!-- テーブル本体 -->
                    <tbody>
                        @foreach ($posts as $post)
                            <tr>
                                <td class="table-text">
                                    <div>{{ $post->user_id }}</div>
                                </td>
                                <!-- 投稿タイトル -->
                                <td class="table-text">
                                    <div>{{ $post->post_title }}</div>
                                </td>
                                 <!-- 投稿詳細 -->
                                <td class="table-text">
                                    <div>{{ $post->post_desc }}</div>
                                </td>
                                <td class="table-text">
                                    <div>{{ $post->created_at }}</div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>		
    @endif    
@endsection