@extends('layouts.lists')
@section('content')
<div class="row">
    <div class="col-md-12">
    @include('common.errors')
        <form action="{{ url('users/update') }}" method="POST">
            <!-- item_name -->
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="form-group">
                <label for="permission">permission</label>
                <input type="number" name="permission" class="form-control" value="{{$user->permission}}">
            </div>
            <div class="form-group">
                <label for="org">org</label>
                <input type="text" name="org" class="form-control" value="{{$user->org}}">
            </div>


            <!-- Save ボタン/Back ボタン -->
            <div class="well well-sm">
                <button type="submit" class="btn btn-sm btn-primary">Save</button>
                <a class="btn btn-link pull-right" href="{{ url('/generalusers') }}"> Back</a>
            </div>
            <!--/ Save ボタン/Back ボタン -->
            <!-- id 値を送信 -->
            <input type="hidden" name="id" value="{{$user->id}}" /> <!--/ id 値を送信 -->
            <!-- CSRF -->
            {{ csrf_field() }}
            <!--/ CSRF -->
        </form>
    </div>
</div>
@endsection