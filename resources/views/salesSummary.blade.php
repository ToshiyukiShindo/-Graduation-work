@extends('layouts.lists')

@section('content')
<h5>Sales  summary(all)</h5>
<p></p>
Display controll
<div class="card mb-4 p-2">
  <div class="card-body d-flex" style="gap:20px;">
    <div class="form-check">    
      <input class="form-check-input" type="checkbox" value="" id="ckbyterm" checked>
      <label class="form-check-label" for="flexCheckChecked">
        Sales total by term
      </label>
    </div>
    <div class="form-check">    
      <input class="form-check-input" type="checkbox" value="" id="ckbycategory" checked>
      <label class="form-check-label" for="flexCheckChecked">
        Sales total by category
      </label>
    </div>
    <div class="form-check">    
      <input class="form-check-input" type="checkbox" value="" id="ckbystore" checked>
      <label class="form-check-label" for="flexCheckChecked">
        Sales total by store
      </label>
    </div>
    <div class="form-check">    
      <input class="form-check-input" type="checkbox" value="" id="ckbystorecategory" checked>
      <label class="form-check-label" for="flexCheckChecked">
        YourStoreSales by category
      </label>
    </div>
  </div>
</div>



<div style="display:flex; flex-wrap: wrap;">
                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4" id="graphbyterm">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sales total by term</h6>
                                </div>
                                <div class="card-body">
                                @foreach ($termsales as $termsale)
                                    <h4 class="small font-weight-bold">{{ $termsale->term }}<span
                                            class="float-right">{{'¥ '.$termsale->sales_total }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar" role="progressbar" style="width: {{$termsale->sales_total/1000000*100}}%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                        </div>

                        <div class="col-lg-6 mb-4" id="graphbycategory">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sales total by category</h6>
                                </div>
                                <div class="card-body">
                                @foreach ($servicesales as $servicesale)
                                    <h4 class="small font-weight-bold">Service sales<span
                                            class="float-right">{{'¥ '.$servicesale->service_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$servicesale->service_sales/1000000*100}}%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach ($loyalitys as $loyality)
                                    <h4 class="small font-weight-bold">loyality<span
                                            class="float-right">{{'¥ '.$loyality->loyality }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$loyality->loyality/1000000*100}}%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach ($goodssales as $goodssale)
                                    <h4 class="small font-weight-bold">Goods sales  
                                    <span class="float-right">{{'¥ '.$goodssale->goods_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$goodssale->goods_sales/1000000*100}}%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach($othersales as $othersale)
                                    <h4 class="small font-weight-bold">Other sales  
                                    <span class="float-right">{{'¥ '.$othersale->other_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar  bg-dark" role="progressbar" style="width: {{$othersale->other_sales/1000000*100}}%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>

                        </div>
                        
                         <div class="col-lg-6 mb-4" id="graphbystore">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sales total by store</h6>
                                </div>
                                <div class="card-body">
                                @foreach ($storesales as $storesale)
                                    <h4 class="small font-weight-bold">{{ $storesale->store_name }}<span
                                            class="float-right">{{'¥ '.$storesale->sales_total }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$storesale->sales_total/1000000*100}}%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                @endforeach
                                </div>
                            </div>

                        </div>
                        
                        <div class="col-lg-6 mb-4" id="graphbystorecategory">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">YourStoreSales by category<span>{{'<'.Auth::user()->org.'>'}}</span></h6>
                                </div>
                                @if(Auth::user()->org == 'all')
                                <div class="card-body">
                                @foreach ($servicesales as $servicesale)
                                    <h4 class="small font-weight-bold">Service sales<span
                                            class="float-right">{{'¥ '.$servicesale->service_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$servicesale->service_sales/1000000*100}}%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach ($loyalitys as $loyality)
                                    <h4 class="small font-weight-bold">loyality<span
                                            class="float-right">{{'¥ '.$loyality->loyality }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$loyality->loyality/1000000*100}}%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach ($goodssales as $goodssale)
                                    <h4 class="small font-weight-bold">Goods sales  
                                    <span class="float-right">{{'¥ '.$goodssale->goods_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$goodssale->goods_sales/1000000*100}}%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach($othersales as $othersale)
                                    <h4 class="small font-weight-bold">Other sales  
                                    <span class="float-right">{{'¥ '.$othersale->other_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar  bg-dark" role="progressbar" style="width: {{$othersale->other_sales/1000000*100}}%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                </div>

                                @else
                                <div class="card-body">
                                    @foreach ($storeservicesales as $storeservicesale)
                                    <h4 class="small font-weight-bold">Service sales<span
                                            class="float-right">{{'¥ '.$storeservicesale->service_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-info" role="progressbar" style="width: {{$storeservicesale->service_sales/1000000*100}}%"
                                            aria-valuenow="20" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach ($storeloyalitys as $storeloyality)
                                    <h4 class="small font-weight-bold">loyality<span
                                            class="float-right">{{'¥ '.$storeloyality->loyality }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: {{$storeloyality->loyality/1000000*100}}%"
                                            aria-valuenow="40" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach ($storegoodssales as $storegoodssale)
                                    <h4 class="small font-weight-bold">Goods sales  
                                    <span class="float-right">{{'¥ '.$storegoodssale->goods_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar bg-success" role="progressbar" style="width: {{$storegoodssale->goods_sales/1000000*100}}%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                    @foreach($storeothersales as $storeothersale)
                                    <h4 class="small font-weight-bold">Other sales  
                                    <span class="float-right">{{'¥ '.$storeothersale->other_sales }}</span></h4>
                                    <div class="progress mb-4">
                                        <div class="progress-bar  bg-dark" role="progressbar" style="width: {{$storeothersale->other_sales/1000000*100}}%"
                                            aria-valuenow="60" aria-valuemin="0" aria-valuemax="1000000"></div>
                                    </div>
                                    @endforeach
                                </div>
                                @endif
                            </div>

                        </div>

</div>

    <script src="{{ asset('js/salessummarycheck.js')}}"></script>

@endsection
