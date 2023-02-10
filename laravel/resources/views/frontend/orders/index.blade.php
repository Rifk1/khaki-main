@extends('layouts.frontend')
@section('title')
    Pesanan Saya
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col md 12">
            <div class="card">
                <div class="card-header">
                    <h4>Pesanan</h4>
                </div>
                <div class="card-body">
                    <table class="table table-border">
                        <thead>
                            <tr>
                                <th>Tgl Pesanan</th>
                                <th>Pelacakan Nomor</th>
                                <th>Total Belanja</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($orders as $order)
                            <tr>
                                <td>{{ date('d-m-y', strtotime($order->created_at)) }}</td>
                                <td>{{ $order->tracking_no }}</td>
                               
                                {{-- <td>{{ $order->products->name }}</td>
                                <td>{{ $order->orders_items->prod_qty }}</td> --}}
                                <td>{{ $order->total_price }}</td>
                                <td>{{ $order->status  == '0'  ?'pending' : 'selesai'}}</td>
                                <td><a href="{{ url  ('view-orders/'.$order->id )}}" class="btn btn-primary">View</a></td>
                                
                                
                                
                                 
                            </tr>
                                
                            @endforeach
                        </tbody>
                    </table> 
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection