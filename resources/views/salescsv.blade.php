@extends('layouts.lists')
@section('content')

<div class="upload mb-4">
    <p>salesのCSVデータを選択してください。</p>
    <form action="/salesentry/csv/upload/" method="post" enctype="multipart/form-data">
      @csrf
      <input type="file" name="csvdata" />
      <button>送信</button>
    </form>
  </div>
    <h6>※CSVデータのテンプレートはこちら</h6>
    <a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-smv ml-2" href="/salesentry/download">CSV template</a>

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
        <th>term</th>
        <th>store_org_code</th>
        <th>store_name</th>
        <th>service_sales</th>
        <th>loyality</th>
        <th>goods_sales</th>
        <th>other_sales</th>
        <th>updated_at</th>
      </tr>

      <!-- DBから取得したデータを一覧表示する -->
      @foreach ($data as $val)
      <tr>
        <td>{{ $val->created_at }}</td>
        <td>{{ $val->id }}</td>
        <td>{{ $val->term }}</td>
        <td>{{ $val->store_org_code }}</td>
        <td>{{ $val->store_name }}</td>
        <td>{{ $val->service_sales }}</td>
        <td>{{ $val->loyality }}</td>
        <td>{{ $val->goods_sales }}</td>
        <td>{{ $val->other_sales }}</td>
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