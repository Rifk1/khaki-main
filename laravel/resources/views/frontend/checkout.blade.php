@extends('layouts.frontend')
@section('title')
    Checkout
@endsection
@section('content')
<div class="container mt-5">
    <form action="{{ url('place-order') }}" method="POST">
        {{ csrf_field() }}
    <div class="row">
        <div class="col-md-7">
            <div class="card">
                <div class="card-body">
                    <h6>Basik ditel</h6>
                    <hr>
                    <div class="row checkout-form">
                        <div class="col-md-6">
                            <label for="">Nama Pertama</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->name }}" name="fname" placeholder="Masukan Nama Pertama">
                        </div>
                        <div class="col-md-6">
                            <label for="">Nama Terakhir</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->lname }}" name="lname"  placeholder="Masukan Nama Terakhir">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Email</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->email }}" name="email"  placeholder="Masukan Email">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Nomor Telepon</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->phone }}" name="phone"  placeholder="Masukan Nomor Telepon">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Alamat 1</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->address1 }}" name="address1"  placeholder="Masukan Alamat 1">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Alamat 2</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->address2 }}" name="address2"  placeholder="Masukan Alamat 2">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Kota</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->city }}" name="city"  placeholder="Masukan Kota">
                        </div> 
                        <div class="col-md-6 mt-3">
                            <label for="">Negara</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->country }}" name="country"  placeholder="Masukan Negara">
                        </div>
                        <div class="col-md-6 mt-3">
                            <label for="">Kode Pin</label>
                            <input type="text" class="form-control" value="{{ Auth::user()->pincode }}" name="pincode"  placeholder="Masukan Kode Pin">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
                   <h6>order detil</h6> 
                    <hr>
                    <table class="table table-striped table-bordered align-middle text-center">
                        <thead>
                            <th>Nama</th>
                            <th>Jumlah</th>
                            <th>Harga</th>
                        </thead>
                        <tbody>
                            @foreach ($cartitems as $item)
                        
                            <tr>
                                <td>  {{ $item->products->name  }}</td>
                                <td>  {{ $item->prod_qty  }}</td>
                                <td>  {{ $item->products->selling_price }}</td>
                              
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <button type="submit" class="btn btn-primary w-100"> Pesan Sekarang</button>
                    
                   
                </div>
            </div>
        </div>
    </div>
    </form>
</div>
@endsection