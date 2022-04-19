@extends('layouts.lists')

@section('content')
<h5>Sales  summary</h5>
<div style="display:flex; flex-wrap: wrap; gap:10px;">

                        <!-- Content Column -->
                        <div class="col-lg-6 mb-4">

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

                        <div class="col-lg-5 mb-4">

                            <!-- Project Card Example -->
                            <div class="card shadow mb-4">
                                <div class="card-header py-3">
                                    <h6 class="m-0 font-weight-bold text-primary">Sales by category</h6>
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
                        
                         <div class="col-lg-6 mb-4">

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

</div>
@endsection
