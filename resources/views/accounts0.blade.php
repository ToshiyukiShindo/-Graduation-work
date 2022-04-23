@extends('layouts.lists0')

@section('content')
<h3>Account format 
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2" id="download">Generate Format</a>
</h3>
<p class="mb-4"></p>
<h3 class="mb-4"> Report folder<br>
<div class="card-body bg-white m-1 p-2">
@foreach($terms as $term)
<a class="btn btn-link pull-right font-weight-bold font-3xl" href="{{ url($term->folder) }}" target="_blank">{{'folder link <'.$term->report_term.'>'}}</a>
@endforeach
</div>
</h3>

<h6>Formatをダウンロードしてデータを入力後、ファイルを所定期間のフォルダーに格納ください</h6>
<h6>ファイル名は「<term>store名_accounts.csv」でお願いいたします。</h6>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body hidden">
                            <div class="table-responsive hidden">
                                <table class="table table-bordered hidden" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>term</th>
                                            <th>store</th>
                                        @foreach ($items as $item)
                                            <th>{{ $item->item_name }}</th>
                                        @endforeach
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <td></td>
                                        <td></td>
                                        <td></td>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>




<script src="{{ asset('js/entry_toggle.js')}}"></script>

@endsection
