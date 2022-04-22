<!-- resources/views/posts.blade.php -->
@extends('layouts.lists')
@section('content')
@foreach($files as $file)
<div>
    <img src="{{asset('uploads/'.$file->img_url)}}" class="w-50 mb-4">
</div>
<div class="w-25 mb-4">
    <h5 class="card-title">{{$file->title}}</h5>
    <hr>
    <p class="small bg-primary text-light px-1">{{$file->org}}</p>
    <p class="small bg-info text-light px-1">{{$file->tag}}</p>
    <p class="card-text">{{$file->desc}}</p>
</div>
<a class="btn btn-link pull-right ml-0" href="{{ url('/files') }}">→Back</a>
@endforeach
        
@endsection