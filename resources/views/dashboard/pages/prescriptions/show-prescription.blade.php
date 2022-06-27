@extends('dashboard.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show Prescriptions</h2>
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
                                        <th>upload</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($prescriptionData as $key=>$prescription)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>
                                                <a href="#" class="pan" data-big="{{url('public/backend/uploads/images/prescription/'.$prescription->upload)}}">
                                                    <img
                                                         src="{{url('public/backend/uploads/images/prescription/'.$prescription->upload)}}"
                                                         alt="INF" width="50">
                                                </a>
                                            </td>
                                            <td>{{$prescription->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('prescription-delete').'/'.$prescription->id}}"
                                                   onclick="return confirm('Are you sure?')"
                                                   class="btn btn-danger btn-xs">
                                                    <i class="fa fa-trash"></i> Delete</a>
                                            </td>

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