@extends('layouts.lists')

@section('content')
<h3>general users 
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-smv ml-2" id="guentry">Manual Entry</a>
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-smv ml-2" href="/generalusers/csv" id="csv entry">csv entry</a>
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2" id="download">Generate Report</a>
</h3>

     <!-- Bootstrapの定形コード… -->
     <div class="card-body">
         <div class="card-title hidden" id="gutitle">
             ユーザー登録
         </div>
     	@include('common.errors')
         <!-- 本登録フォーム -->
         <form action="{{ url('users') }}" method="POST" class="form-horizontal">
             {{ csrf_field() }}
             <!-- 本のタイトル -->
             <div class="form-group hidden" id="guname">
                 <div class="col-sm-6">Name
                     <input type="text" name="name" class="form-control">
                 </div>
             </div>
             <div class="form-group hidden" id="guemail">
                 <div class="col-sm-6">email
                     <input type="text" name="email" class="form-control">
                 </div>
             </div>
             <div class="form-group hidden" id="gupermission">
                 <div class="col-sm-6">permission
                     <input type="number" name="permission" class="form-control" value="0">
                 </div>
             </div>
             <div class="form-group hidden" id="guorg">
                 <div class="col-sm-6">org
                     <input type="text" name="org" class="form-control" value="{{ Auth::user()->org }}">
                 </div>
             </div>
             <div class="form-group hidden" id="gupassword">
                 <div class="col-sm-6">password
                     <input type="password" name="password" class="form-control">
                 </div>
             </div>
             <!-- 本 登録ボタン -->
             <div class="form-group hidden" id="gubtn">
                 <div class="col-sm-offset-3 col-sm-6">
                     <button type="submit" class="btn btn-sm btn-primary">
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
                                            <th>UserID</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>permission</th>
                                            <th>org</th>
                                            <th colspan="2">操作</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $user->id }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->name }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->email }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->permission }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->org }}</div>
                                            </td>
                                            <td style="display:flex; gap:10px;">
                                            <form action="{{ url('usersedit/'.$user->id) }}" method="GET" name="id"> {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                            </form>
                                            <form action="{{ url('user/'.$user->id) }}" method="POST">
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

<script src="{{ asset('js/entry_toggle.js')}}"></script>

@endsection
