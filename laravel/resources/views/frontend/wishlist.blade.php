
@extends('layouts.frontend')
@section('title')
    Keranjang
@endsection
@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div  class="container">
        <h6 class="mb-0 ">
           <a class="link-menu" href="{{ url('/') }}">Beranda</a> /
           <a class="link-menu" href="{{ url('cart') }}">Produk disukai</a>
        </h6>
    </div>
</div>
<div class="container my-5">
    <div class="card shadow ">
        <div class="card-body text-center">
            @if ($wishlist->count() > 0)
           
                
                @foreach ($wishlist as $item)
                <div class="row product_data">
                 
                    <div class="col-md-2 border-right" >
                        <img src="{{ asset('admin/assets/uploads/products/'.$item->products->image) }}"  class="img-fluid img-thumbnail   rounded width: auto; mx-auto d-block"   alt="Responsive image" width="90"  >
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6 > {{ $item->products->name }}</h6>
                       
                    </div>
                    <div class="col-md-2 my-auto">
                        <h6 > Rp {{ $item->products->selling_price }}</h6>
                    </div>
                    <div class="col-md-2  my-auto">
                        <input type="hidden" class="prod_id" value="{{ $item->prod_id }}">
                        @if ( $item->products->qty >= $item->prod_qty)
                        <h6  class="badge bg-success "> Tersedia</h6>
                        <input type="hidden" name="quantity" class="qty-input form-control text-center"  value="1">
                        @else
                        <h6 class="badge bg-danger "> Habis</h6>
                        @endif
     
                    </div>
                    <div class="col-md-2  my-auto">
                        <br>
                        <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"> keranjang <i class="fa fa-shopping-cart"></i></button>
                    </div> 
                    
                    <div class="col-md-2  my-auto">
                        <br>
                        <button type="button" class="btn btn-danger hapus-wishlist-item ">hapus<i class="bi bi-trash-fill"></i></button>
                    </div>  
               
                    @if (!$loop->last)
                    <hr class="mt-3"> 
                         @endif
    
                     
                            
                        
                    
                  
                </div>
                @endforeach
              
                
               
           
         
            @else
                <h4>Tidak Ada Produk Yang Di Sukai</h4>
            @endif
        </div>
       
    </div>
</div> 
@endsection