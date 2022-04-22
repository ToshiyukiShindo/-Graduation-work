@extends('layouts.lists')
@section('content')

<div class="upload">
    <p>CSVデータを選択してください。</p>
    <form action="/generalusers/csv/upload/" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="csvdata" />
      <button>送信</button>
    </form>
  </div>
  

@if($cnt==0)
@else
    <div class="contents">
    <p>{{$cnt}}件登録しました。</p>
    </div>
@endif
    
<div class="card shadow mb-4 mt-4">
<div class="card-body">

    <div class="table-responsive w-100">
    <table class="table table-bordered" >
      <tr>
        <th>created_at</th>
        <th>ID</th>
        <th>name</th>
        <th>email</th>
        <th>permission</th>
        <th>org</th>
        <th>password</th>
        <th>updated_at</th>
      </tr>

      <!-- DBから取得したデータを一覧表示する -->
      @foreach ($data as $val)
      <tr>
        <td>{{ $val->created_at }}</td>
        <td>{{ $val->id }}</td>
        <td>{{ $val->name }}</td>
        <td>{{ $val->email }}</td>
        <td>{{ $val->permission }}</td>
        <td>{{ $val->org }}</td>
        <td>{{ $val->password }}</td>
        <td>{{ $val->updated_at }}</td>
      </tr>
      @endforeach
    </table>
    </div>
  </div>
 </div>

</body>
</html>

@endsection