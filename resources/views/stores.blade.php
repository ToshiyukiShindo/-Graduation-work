@extends('layouts.lists')

@section('content')
<h5>stores <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-smv" id="stentry">Entry data</a></h5>

     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title hidden" id="sttitle">
             店舗登録
         </div>
         <!-- バリデーションエラーの表示に使用-->
     	@include('common.errors')
         <!-- バリデーションエラーの表示に使用-->
         <!-- 登録フォーム -->
         <form action="{{ url('stores') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
             <div class="form-group hidden" id="stgcode">
                 <div class="col-sm-6">{{'グループコード'}}
                     <input type="number" name="store_org_code" class="form-control">
                 </div>
             </div>
             <div class="form-group hidden" id="stname">
                 <div class="col-sm-6">{{'店舗名'}}
                     <input type="text" name="store_name" class="form-control">
                 </div>
             </div>
             <!-- 登録ボタン -->
             <div class="form-group hidden" id="stbtn">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-primary">
                         Save
                     </button>
                 </div>
             </div>
         </form>
     </div>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>StoreID</th>
                                            <th>store_org_code</th>
                                            <th>store_name</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($stores as $store)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $store->id }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $store->store_org_code }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $store->store_name }}</div>
                                            </td>
                                            <td style="display:flex; gap:10px;">
                                            <form action="{{ url('storesedit/'.$store->id) }}" method="GET" name="store_id"> {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                            </form>
                                            <form action="{{ url('store/'.$store->id) }}" method="POST">
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

<script src="{{ asset('js/store_entry_toggle.js')}}"></script>

@endsection
