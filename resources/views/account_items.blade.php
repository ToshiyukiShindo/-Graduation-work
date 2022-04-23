@extends('layouts.lists')

@section('content')
<h3>Accounts settings
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2" id="download">Generate Report</a>
</h3>

     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title" id="salestitle">
             Account 区分登録
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 本登録フォーム -->
         <form action="{{ url('accountitems') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
             <div class="form-group" id="salesterm">
                 <div class="col-sm-6">区分名
                     <input type="text" name="item_name" class="form-control">
                 </div>
             </div>
             <!-- 登録ボタン -->
             <div class="form-group" id="salesbtn">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-sm btn-primary">
                         Save
                     </button>
                 </div>
             </div>
         </form>
         

     </div>
     </div>
     </div>
    
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>名称</th>
                                            <th>created_at</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($items as $item)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $item->id }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $item->item_name }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $item->created_at }}</div>
                                            </td>
                                            <td style="display:flex; gap:10px;">
                                            <form action="{{ url('account_item_edit/'.$item->id) }}" method="GET" name="id"> {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                            </form>
                                            <form action="{{ url('accountitem/'.$item->id) }}" method="POST">
                                             {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-sm btn-dark">削除</button>
                                            </form>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>

<script src="{{ asset('js/sales_entry_toggle.js')}}"></script>




@endsection
