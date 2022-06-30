@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show Contact</h2>
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
                                        <th>Topic</th>
                                        <th>Brand</th>
                                        <th>Message</th>
                                        <th>Created at</th>
                                        <th>Action</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($contactData as $key=>$contact)
                                        <tr>
                                            <td>{{++$key}}</td>
                                            <td>{{$contact->name}}</td>
                                            <td>{{$contact->email}}</td>
                                            <td>{{$contact->topic}}</td>
                                            <td>{{$contact->brand}}</td>
                                            <td>{{$contact->message}}</td>
                                            <td>{{$contact->created_at->diffForHumans()}}</td>
                                            <td>
                                            <a href="{{route('contact-delete').'/'.$contact->id}}" onclick="return confirm('Are you sure?')" class="btn btn-danger btn-xs">
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