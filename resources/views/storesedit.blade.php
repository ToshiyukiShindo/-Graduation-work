@extends('layouts.lists')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
        <form action="{{ url('stores/update') }}" method="POST">
            <!-- item -->
            <p></p>
            <div class="form-group">
                <label for="stores_org_code">org_code</label>
                <input type="number" name="stores_org_code" class="form-control" value="{{$store->store_org_code}}">
            </div>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" class="form-control" value="{{$store->store_name}}">
            </div>
            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/stores') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$store->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection