@extends('layouts.lists')

@section('content')
<h5>system users
<a class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm ml-2" id="download">Generate Report</a></h5>

                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th>UserID</th>
                                            <th>Name</th>
                                            <th>email</th>
                                            <th>permission</th>
                                            <th>org</th>
                                            <th>操作</th>
                                        </tr>
                                    </thead>
                                    <!--<tfoot>-->
                                    <!--    <tr>-->
                                    <!--        <th>Name</th>-->
                                    <!--        <th>Position</th>-->
                                    <!--        <th>Office</th>-->
                                    <!--        <th>Age</th>-->
                                    <!--        <th>Start date</th>-->
                                    <!--        <th>Salary</th>-->
                                    <!--    </tr>-->
                                    <!--</tfoot>-->
                                    <tbody>
                                        @foreach ($users as $user)
                                        <tr>
                                            <td class="table-text">
                                                <div>{{ $user->id }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->name }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->email }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->permission }}</div>
                                            </td>
                                            <td class="table-text">
                                                <div>{{ $user->org }}</div>
                                            </td>
                                            <td>
                                            <form action="{{ url('usersedit/'.$user->id) }}" method="GET" name="id"> {{ csrf_field() }}
                                                <button type="submit" class="btn btn-sm btn-primary">Edit</button>
                                            </form>
                                            </td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>


@endsection
