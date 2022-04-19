@extends('layouts.lists')

@section('content')
<h5>sales entry <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-smv" id="salesentry">Entry data</a></h5>

     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title" id="salestitle">
             sales登録
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 本登録フォーム -->
         <form action="{{ url('sales') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
             <div class="form-group" id="salesterm">
                 <div class="col-sm-6">Term
                     <input type="text" name="term" class="form-control" placeholder="2022-04">
                 </div>
             </div>
             <div class="form-group" id="salesstoc">
                 <div class="col-sm-6">store_org_code
                     <input type="text" name="store_org_code" class="form-control" placeholder="ab1001">
                 </div>
             </div>
             <div class="form-group" id="salesstname">
                 <div class="col-sm-6">store_name
                     <input type="text" name="store_name" class="form-control" placeholder="sugamo">
                 </div>
             </div>
             <div class="form-group"  id="salesss">
                 <div class="col-sm-6">sevice_sales
                     <input type="number" name="service_sales" class="form-control">
                 </div>
             </div>
             <div class="form-group"  id="salesloy">
                 <div class="col-sm-6">loyality
                     <input type="number" name="loyality" class="form-control">
                 </div>
             </div>
             <div class="form-group" id="salesgs">
                 <div class="col-sm-6">goods_sales
                     <input type="number" name="goods_sales" class="form-control">
                 </div>
             </div>
             <div class="form-group" id="salesos">
                 <div class="col-sm-6">other_sales
                     <input type="number" name="other_sales" class="form-control">
                 </div>
             </div>
             <!-- 本 登録ボタン -->
             <div class="form-group" id="salesbtn">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-sm btn-primary">
                         Save
                     </button>
                 </div>
             </div>
         </form>
         
    <!-- <div class="upload hidden" id="gucsv">-->
    <!--    <p>DBに追加したいCSVデータを選択してください。</p>-->
    <!--<form action="" method="post" enctype="multipart/form-data">-->
    <!--    <div class="row">-->
    <!--        <label class="col-1 text-right" for="form-file-1">File:</label>-->
    <!--        <div class="col-11">-->
    <!--            <div class="custom-file">-->
    <!--                <input type="file" name="csv" class="custom-file-input" id="customFile">-->
    <!--                <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>-->
    <!--            </div>-->
    <!--        </div>-->
    <!--    </div>-->
    <!--    <button type="submit" class="btn btn-sm btn-primary">送信</button>-->
    <!--</form>-->
    <!--</div>-->

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
                                            <th>SalesID</th>
                                            <th>Term</th>
                                            <th>org_code</th>
                                            <th>store_name</th>
                                            <th>service_sales</th>
                                            <th>loyality</th>
                                            <th>goods_sales</th>
                                            <th>other_sales</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($sales as $sale)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $sale->id }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $sale->term }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $sale->store_org_code }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $sale->store_name }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $sale->service_sales }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $sale->loyality }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $sale->goods_sales }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $sale->other_sales }}</div>
                                            </td>
                                            <td style="display:flex; gap:10px;">
                                            <form action="{{ url('salesedit/'.$sale->id) }}" method="GET" name="id"> {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                            </form>
                                            <form action="{{ url('sale/'.$sale->id) }}" method="POST">
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
