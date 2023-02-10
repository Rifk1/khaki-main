@extends('layouts.frontend')
@section('title')
    Keranjang
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div  class="container">
        <h6 class="mb-0 ">
           <a class="link-menu" href="{{ url('/') }}">Beranda</a> /
           <a class="link-menu" href="{{ url('cart') }}">Keranjang</a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow ">
        @if($cartitems->count() > 0)
        <div class="card-body">
            @php $total = 0; @endphp
            @foreach ($cartitems as $item)
            <div class="row product_data">
             
                <div class="col-md-2 border-right" >
                    <img src="{{ asset('admin/assets/uploads/products/'.$item->products->image) }}"  class="img-fluid img-thumbnail   rounded width: auto; mx-auto d-block"   alt="Responsive image" width="90"  >
                </div>
                <div class="col-md-3 my-auto">
                    <h6 > {{ $item->products->name }}</h6>
                    @if($item->products->qty > 0)
                        <label class="badge bg-success"> Tersedia</label>
                    @else
                    <label class="badge bg-danger"> Habis</label>
                    @endif
                </div>
                <div class="col-md-2 my-auto">
                    <h6 > Rp {{ $item->products->selling_price }}</h6>
                </div>
                <div class="col-md-2">
                    <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                    @if ( $item->products->qty >= $item->prod_qty)
                    <label for="Quantity">Jumlah</label>
                    <div class="input-group text-center mb-3" style="widht:130px;">
                        <button class="input-group-text changeQuantity decrement-btn">-</button>
                        <input type="text" name="quantity" class="qty-input form-control text-center"  value="{{ $item->prod_qty }}">
                        <button class="input-group-text changeQuantity increment-btn">+</button>
                    </div>
                    @php $total += $item->products->selling_price * $item->prod_qty; @endphp
                    @else
                    <h6 class="badge bg-danger label-stok"> Habis</h6>
                    @endif

                </div>
                <div class="col-md-2  btncart">
                    <br>
                    <button type="button" class="btn btn-danger delete-cart-item ">hapus<i class="bi bi-trash-fill"></i></button>
                </div>  
           
                @if (!$loop->last)
                <hr class="mt-3"> 
                     @endif

       
                
              
            </div>
            @php $total += $item->products->selling_price * $item->prod_qty; @endphp
            @endforeach
            
           
        </div>
        <div class="card-footer"> 
            <h6> Total Harga: Rp{{ $total }}  <a href="{{ ('checkout') }}" class="btn btn-outline-success float-end"> Check out</a></h6>
           
        </div>
        @else
        <div class="card-body text-center">
            <h2>  <i class="bi bi-cart3  text-warning cart-besar" ></i> Keranjang kamu Kosong</h2>
            
            <a href="{{ url('/') }}" class="btn btn-outline-primary float-end"> Lanjut Belanja</a>
        </div>
        @endif
    </div>
</div> 
@endsection