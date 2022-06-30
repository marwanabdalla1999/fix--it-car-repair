@extends('backend.master.master')

@section('content')
    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show Product</h2>
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
                                        <th>Brand Name</th>
                                        <th>Price</th>
                                        <th>MG</th>
                                        <th>Image</th>
                                        <th>Description</th>
                                        <th>Manufacturer Date</th>
                                        <th>Expiry Date</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($productData as $key=>$product)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$product->name}}</td>
                                            <td>{{$product->brand_name}}</td>
                                            <td>Rs{{$product->price}}</td>
                                            <td>{{$product->mg}} mg</td>
                                            <td>
                                                <img src="{{url('public/backend/uploads/images/product/'.$product->image)}}" alt="INF" width="50">
                                            </td>
                                            <td>{{$product->description}}</td>
                                            <td>{{$product->man_date}}</td>
                                            <td>{{$product->exp_date}}</td>
                                            <td>{{$product->created_at->diffForHumans()}}</td>
                                            <td>
                                                <a href="{{route('product-edit').'/'.$product->id}}" class="btn btn-success btn-xs">
                                                    <i class="fa fa-edit"></i> Edit</a>
                                                <a href="{{route('product-delete').'/'.$product->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs">
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