@extends('layouts.lists')

@section('content')
<h3>Account format 
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2" id="download">Generate Format</a>
</h3>

<h3> Report folder<br>
<a class="btn btn-link pull-right" href="{{ url('https://drive.google.com/drive/folders/1AoA7KbE6NbWrGUyddTccwVizf1iu5lcN?usp=sharing') }}">folder link</a>
</h3>

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
