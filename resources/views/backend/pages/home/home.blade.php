@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Admin Dashboard</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                @include('backend.layouts.messages')

                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>No.of Admins</th>
                                        <th>No.of Users</th>
                                        <th>No.of technicians</th>
                                        <th>No.of Orders</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($adminData as $key=>$admin)
                                        <tr>
                                            <td>{{$admin->admin}}</td>
                                            <td>{{$admin->user}}</td>
                                            <td>{{$admin->tech}}</td>
                                            <td>{{$admin->order}}</td>



                                        </tr>
                                    @empty
                                    @endforelse
                                    </tbody>
                                </table>


                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
