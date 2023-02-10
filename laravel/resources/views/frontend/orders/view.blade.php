@extends('layouts.frontend')
@section('title')
    Pesanan Saya
@endsection
@section('content')
<div class="container">
    <div class="row">
        <div class="col md 12">
            <div class="card">
                <div class="card-header bg-warning">
                    <div>  </div>
                   
                    <div class="container ">
                        <div class="row ">
                          <div class="col">
                            <h4><a class="link-menu " href="{{ url ('my-orders') }}"><i class="bi bi-backspace"></i> Kembali</a></h4>
                          </div>
                          <div class="col">
                            <h4 class="text-center "> Tampilan Pesanan</h4>
                          </div>
                          <div class="col">
                           
                          </div>
                        </div>
                      </div>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6 order-detail">
                            <h4>Detil Pengiriman</h4> <hr>
                            <label for="">Nama Pertama</label>
                            <div class="border ">{{ $orders->fname }}</div>
                            <label for="">Nama Terakhir</label>
                            <div class="border ">{{ $orders->lname }}</div>
                            <label for="">Email</label>
                            <div class="border ">{{ $orders->email }}</div>
                            <label for="">No hp</label>
                            <div class="border ">{{ $orders->phone }}</div>
                            <label for="">Alamat</label>
                            <div class="border ">
                                {{ $orders->address1 }},<br>
                                {{ $orders->address2 }},<br>
                                {{ $orders->city }},<br>
                                {{ $orders->country }},
                            </div> 
                                <label for="">Kode Pos</label>
                                <div class="border ">{{ $orders->pincode }}</div>
                            </div>   
                        <div class="col-md-6">
                            <h4>Detail Pesanan</h4> <hr>
                            <table class="table table-bordered text-center">
                                <thead>
                                    <tr>
                                        <th>Nama</th>
                                        <th>Jumlah</th>
                                        <th>Harga</th>
                                        <th>Gambar</th> 
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($orders->orderitems as $order)
                                    <tr class="text-center"> 
                                      <td>{{ $order->products->name }}</td>
                                      <td>{{ $order->qty }}</td>
                                      <td>{{ $order->price }}</td>
                                      <td>
                                        <img src="{{ asset('admin/assets/uploads/products/'.$order->products->image) }}" class="cate-image" alt="Gambar Produk" height="60"> 
                                    </td>
                                    </tr>
                                        
                                   
                                </tbody>
                            </table> 
                            {{-- @inject('orderpay', 'App\Models\OrderItem') --}}

                            

                            @if($order->pay)

                           
                                <div class="mb-5">
                                    <h5>Sudah Di Bayar</h5>
                                    <img src="{{ asset('admin/assets/uploads/pembayaran/'.$order->pay) }}" class="cate-image rounded  float-start mb-2" alt="Gambar disini" height="100"> 
                                    <label for="formFile" class="form-label ms-3 mt-4
                                    ">
                                    <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#Modaleditpay{{ $order->id }}">
                                           <i class="bi bi-pencil-fill"></i> Edit Bukti pembayaran 
                                    </button></label>
                                    
                            
                           
                                @else
                                <form action="{{ url('pembayaran/'.$order->id) }}" method="POST" enctype="multipart/form-data">
                               
                                    @csrf
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"><h6>Masukan Bukti pembayaran</h6></label>
                                        <input class="form-control" type="file" name="pay">
                                      </div>
                                      <button type="submit" class="btn btn-primary">Tambah </button>
                                    </form>
                                
                                
                                    @endif
                              
                                    @endforeach
                                    {{-- modal edit --}}
                                    <div class="modal fade" id="Modaleditpay{{ $order->id }}" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                        <div class="modal-dialog  modal-dialog-centered px-5">
                                          <div class="modal-content">
                                            <div class="modal-header">
                                              <h5 class="modal-title" id="staticBackdropLabel"> Edit Bukti pembayaran  <b>{{ $order->order_id }}</b></h5>
                                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <form action="{{ url('pembayaran/'.$order->id) }}" method="POST" enctype="multipart/form-data">
                               
            
                                              @csrf
                                            
                                            <div class="modal-body">
                                               
                                              <div class="card">
                                                <div class="card-header">
                                                  
                                                    <input class="form-control" type="file" name="pay">
                                                </div>
                                                
                                                </div>
                                            </div>
                                           
                                            <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                              <button type="submit" class="btn btn-primary">Tambah </button>
                                             
                                            </div>
                                          </div>
                                            
                                             
                                          </form>
                                          </div>
                                        </div>
                                      </div>
                                    
                            <h4 class="px2">Total keseluruhan: <span class="float-end"> {{ $orders->total_price }}</span></h4>
                          

                            <img src="{{ asset('assets\images\Logo-Bank-BCA-1.png') }}" class="float-start w-25 mt-1" alt="..."><h4 class="px2 mt-5">kami:    12764687</h4>
                        </div>
                   
                   
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection