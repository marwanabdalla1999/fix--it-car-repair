@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2><i class="fa fa-folder"></i> Manage Category</h2>
                        <div class="clearfix"></div>
                    </div>
                    <div class="x_content">
                        <div class="row">
                            <form action="{{route('add-category')}}" method="post" enctype="multipart/form-data">
                                {{csrf_field()}}
                                <div class="col-md-6">
                                    <div class="form-group form-group-sm">
                                        <label for="cat_nam">Category Name</label>
                                        <input type="text" name="cat_name" id="cat_nam"
                                               placeholder="enter category name"
                                               class="form-control">
                                        <a href="" style="color: red;">{{$errors->first('cat_name')}}</a>
                                    </div>
                                </div>
                                <div class="col-md-6" style="padding-left: 0;">
                                    <div class="form-group form-group-sm">
                                        <button class="btn btn-success btn-sm" style="margin-top: 23px;"> Add Category</button>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <hr>
                            @include('backend.layouts.messages')

                            <table id="datatable" class="table table-striped table-bordered">
                                <thead>
                                <tr>
                                    <th>S.n</th>
                                    <th>Name</th>
                                    <th>Created at</th>
                                    <th>Action</th>
                                </tr>
                                </thead>
                                <tbody>
                                @forelse($categoryData as $key=>$category)
                                    <tr>
                                        <td>{{++$key}}</td>
                                        <td>{{$category->cat_name}}</td>
                                        <td>{{$category->created_at->diffForHumans()}}</td>
                                        <td>
                                            <a href="{{route('category-edit').'/'.$category->id}}"
                                               class="btn btn-success btn-xs">
                                                <i class="fa fa-edit"></i> Edit</a>
                                            <a href="{{route('category-delete').'/'.$category->id}}"
                                               onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs">
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