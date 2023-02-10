@extends('layouts.frontend')

@section('title',$products->name)


@section('content')
<div class="py-3 mb-4 shadow-sm bg-warning border-top">
    <div  class="container">
        <h6 class="mb-0">Koleksi / {{ $products->category->name }} / {{ $products->name }}
            {{-- <a class="link-dark" style="text-decoration:none;" href="{{ url('category') }}">Kategori</a> / 
            <a class="link-dark" style="text-decoration:none;" href="{{ url('view-category/'.$products->category->slug) }}">{{ $products->category->name }}</a> / 
            <a class="link-dark" style="text-decoration:none;" href="{{ url('#') }}">{{ $products->name }}</a> --}}
        </h6>
    </div>
</div>
    <div class="container">
        <div class="card shadow product_data">
            <div class="card-body">
                <div class="row">
                    <div class="col-md-3 border-right" >
                        <img src="{{ asset('admin/assets/uploads/products/'.$products->image) }}"  class="img-fluid img-thumbnail   rounded width: auto; mx-auto d-block"   alt="Responsive image" width="300"  >
                    </div>
                    <div class="col-md-8">
                        <h2 class="mb-0">
                            {{ $products->name }}
                            @if($products->trending == '1')
                            <label style="font-size: 16px" class="float-end badge bg-danger trending-tag">Trending</label>
                            @endif
                        </h2>
                        <hr>
                        <label class="me-3">Harga Original: <s>Rp{{ $products->original_price }}</s></label>
                        <label class="fw-bold">Harga Jual: Rp{{ $products->selling_price }}</label>
                        <p class="mt-3">
                            {!! $products->small_description !!}
                        </p>
                        <hr>
                        @if($products->qty > 0)
                            <label class="badge bg-success"> Tersedia</label>
                        @else
                        <label class="badge bg-danger"> Habis</label>
                        @endif
                        <div class="row mt-2">
                            <div class="col-md-3">
                                <input type="hidden" value="{{ $products->id }}" class="prod_id">
                                <label for="Quantity">Jumlah</label>
                               
                                    <div class="input-group text-center mb-3" style="widht:130px;">
                                        <button class="input-group-text decrement-btn">-</button>
                                        <input type="text" name="quantity" class="qty-input form-control text-center"  value="1">
                                        <button class="input-group-text increment-btn">+</button>
                                    </div>
                               
                            </div>
                            <div class="com-md-9">
                                <br>
                                @if($products->qty > 0)
                                <button type="button" class="btn btn-primary me-3 addToCartBtn float-start"> tambah ke keranjang <i class="fa fa-shopping-cart"></i></button>
                            @endif
                                <button type="button" class="btn btn-success me-3 addToWishlist float-start"> tambah ke list <i class="fa fa-heart"></i></button>
                               
                            </div>
                        </div>
                    </div>
                  
                </div>
                <div class="col-md-11">
                    <hr>
                    <h3>Deskripsi</h3>
                    <p class="mt-3">
                        {!! $products->description  !!}
                    </p>
                </div>
               
            </div>
        </div>
    </div> 

   
@endsection


