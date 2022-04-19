@extends('layouts.new')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-header">{{ __('最新のお知らせ') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                    </div>
                    @endif

                    <div class="card-body">
                @foreach ($posts as $post)
                        <div class="card-body" style="border:darkgray; margin: 10px;">
                        <div>
                            <div><h5>{{ $post->post_title }}</h5></div>
                            <div><p style="font-size:16px;">{{'配信日時.   '}}{{ $post->updated_at }}</p></div>
                        </div>
                        <hr>
                        <p>{{ $post->post_desc }}</p>
                        </div>
                @endforeach
                    </div>
                </div>
            </div>
        </div>
        
        <div class="col-lg-6 mb-4">

            //アクションやtodo導線をここに    

        </div>
        
        
    </div>
</div>
@endsection
