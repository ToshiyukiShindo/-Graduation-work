@extends('layouts.new0')

@section('content')
<div class="container d-flex flex-row" style="gap:20px">
    <div class="w-75">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-info text-white">{{ __('運営からのお知らせ') }}</div>

                <div class="card-body" >
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                    </div>
                    @endif

                @foreach ($posts as $post)
                <div class="mb-4">
                        <div>
                            <div><h6>{{ $post->post_title }}</h5></div>
                            <div><p style="font-size:14px;">{{'配信日時.   '}}{{ $post->updated_at }}</p></div>
                        </div>
                        <p style="font-size:16px;">{{ $post->post_desc }}</p>
                        <hr>
                </div>
                @endforeach
                </div>
            </div>
        </div>
    </div>
        
    <div class="row">

                        <div class="col-xl-6 col-md-6 mb-2 mh-25">
                            <div class="card border-left-primary shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            @foreach ($total_thismonth_sales as $total_thismonth_sale)
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Sales (Monthly)<br> {{'<'.$date.'>'}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{'¥ '.$total_thismonth_sale->sales_mtotal }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>


                        <div class="col-xl-6 col-md-6 mb-2 mh-25">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            @foreach ($total_thisyear_sales as $total_thisyear_sale)
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Sales (Annual)<br> {{'<'.$year.'>'}}</div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{'¥ '.$total_thisyear_sale->sales_ytotal }}</div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Tasks Card Example -->
                        <div class="col-xl-6 col-md-6 mb-2 mh-25">
                            <div class="card border-left-info shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-info text-uppercase mb-1">Sales Entries
                                            </div>
                                            <div class="row no-gutters align-items-center">
                                                <div class="col-auto">
                                                    @foreach($counts as $count)
                                                    <div class="text-xs font-weight-bold text-info text-uppercase mb-1">{{'<'.$count->term.'>'}}</div>
                                                    <div class="h5 mb-0 mr-3 font-weight-bold text-gray-800">
                                                        {{ $count->count_records.'件'}}</div>
                                                    @endforeach
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
    </div>
        
    
</div>
@endsection
