@extends('layouts.lists')

@section('content')
<h3>Account report setting
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2" id="download">Generate Report</a>
</h3>

     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title" id="salestitle">
             Account report 設定登録
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 本登録フォーム -->
         <form action="{{ url('reportterms') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
             <div class="form-group" id="term">
                 <div class="col-sm-6">期間
                     <input type="text" name="term" class="form-control">
                 </div>
             </div>
             <div class="form-group" id="url">
                 <div class="col-sm-6">folder url
                     <input type="text" name="url" class="form-control">
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
                                            <th>term</th>
                                            <th>url</th>
                                            <th>created_at</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($terms as $term)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $term->id }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $term->report_term }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ Hash::make($term->folder) }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $term->created_at }}</div>
                                            </td>
                                            <td style="display:flex; gap:10px;">
                                            <form action="{{ url('reportterm/'.$term->id) }}" method="POST">
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
