@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show Admin</h2>
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
                                        <th>phone</th>
                                        <th>spcialized in</th>
                                        <th>rate</th>
                                        <th>Created at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($adminData as $key=>$admin)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$admin->name}}</td>
                                            <td>{{$admin->phone}}</td>
                                            <td>{{$admin->specialized_in}}</td>
                                            <td>{{$admin->rate}}</td>
                                            <td>{{$admin->created_at->diffForHumans()}}</td>


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
