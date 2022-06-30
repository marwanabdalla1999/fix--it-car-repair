@extends('backend.master.master')

@section('content')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show hospital</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <div class="col-md-12">
                                @include('backend.layouts.messages')

                                <table id="datatable" class="table table-striped table-bordered">
                                    <thead>
                                    <tr>
                                        <th>S.n</th>
                                        <th>Name</th>
                                        <th>Email</th>
                                        <th>Image</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($hospitalData as $key=>$hospital)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$hospital->name}}</td>
                                            <td>{{$hospital->email}}</td>
                                            <td>
                                                <img src="{{url('public/backend/uploads/images/doctor/'.$hospital->image)}}" alt="INF" width="50">
                                            </td>
                                            <td>{{$hospital->created_at->diffForHumans()}}</td>
                                    

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