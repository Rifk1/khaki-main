@extends('layouts.admin')

@section('title')
Tampilan Pesanan
@endsection

@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header bg-warning">
                    <div>  </div>
                   
                    <div class="container ">
                        <div class="row ">
                          <div class="col">
                            <h4><a class="link-menu " href="{{ url ('orders') }}"><i class="bi bi-backspace"></i> Kembali</a></h4>
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
                                        
                                    @endforeach
                                </tbody>
                            </table> 
                            <div class="d-block ">
                                @if($order->pay)
                          
                               
                                @csrf
                                <div class="mb-3 ">
                                    <h5>Sudah Di Bayar</h5>
                                    <img src="{{ asset('admin/assets/uploads/pembayaran/'.$order->pay) }}" class="cate-image rounded   mb-2 " alt="Gambar disini" height="100"> 
                                   
                                
                                  </div>
                                
                               
                                @else
                                    <div class="mb-3">
                                        <label for="formFile" class="form-label"><h6>Belum Dibayar</h6></label>
                                        
                                      </div>
                                    
                                @endif
                            </div>
                            
                            <h4  class="px-5 ">Total keseluruhan:   <span class="float-end"> {{ $orders->total_price }}</span></h4>
                            <div class="m px-2  ">
                            <label for="">Status Pesanan</label>
                            <form action="{{ url('update-pesanan/'.$orders->id) }}" method="POST">
                                @csrf
                                @method('PUT')

                            <select class="form-select form-bordered" name="status_pesanan">
                                <option selected>Open this select menu</option>
                                <option {{ $orders->status == '0'? 'selected':'' }} value="0">Pending</option>
                                <option {{ $orders->status == '1'? 'selected':'' }} value="1">Selesai</option>
                              </select>
                              <button type="submit" class="btn btn-primary mt-3 ms-2">Update</button>
                            </form>
                            </div>
                        </div>
                   
                   
                </div>
            </div>
          
        </div>
    </div>
</div>
@endsection