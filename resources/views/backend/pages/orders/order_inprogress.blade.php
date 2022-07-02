@extends('backend.master.master')

@section('content')

    <div class="right_col" role="main">
        <div class="clearfix"></div>

        <div class="row">
            <div class="col-md-12">
                <div class="x_panel">
                    <div class="x_title">
                        <h2>Show Orders in progress</h2>
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
                                        <th>Issue</th>
                                        <th>Distance</th>
                                        <th>tech id</th>
                                        <th>user id</th>
                                        <th>time</th>
                                        <th>Address</th>
                                        <th>Cost</th>
                                        <th>card used</th>
                                        <th>payed amount</th>
                                        <th>payed from wallet</th>
                                        <th>Voucher</th>
                                        <th>Payment way</th>

                                        <th>state</th>

                                        <th>Created at</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($adminData as $key=>$admin)
                                        <tr>
                                            <td>{{$admin->id}}</td>
                                            <td>{{$admin->issue}}</td>
                                            <td>{{$admin->distance}}</td>
                                            <td>{{$admin->tech_id}}</td>
                                            <td>{{$admin->user_id}}</td>
                                            <td>{{$admin->time}}</td>
                                            <td>{{$admin->address}}</td>
                                            <td>{{$admin->amount}}</td>
                                            <td>{{$admin->card_used}}</td>
                                            <td>{{$admin->payed_amount}}</td>
                                            <td>{{$admin->amount_from_wallet}}</td>
                                            <td>{{$admin->voucher}}</td>
                                            <td>{{$admin->payment_way}}</td>

                                            <td>{{$admin->state}}</td>

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
