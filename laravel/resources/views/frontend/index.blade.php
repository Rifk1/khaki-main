@extends('layouts.frontend')
@section('title')
    Gudang
@endsection
@section('content')
@include('layouts.inc.slider')
    <div class="container"></div>
    <div class="py-5 ">
            <div class="container">
                <div class="row">
                    <h2 class="text-center text-light">Produk Trending</h2>
                    <div class="owl-carousel featured-carousel owl-theme">
                        @foreach ($unggulan_products as $ugl)
                            <div class="item ">
                              <a class="link-dark" style="text-decoration:none;" href="{{ url('prodview/'.$ugl->slug ) }}">
                                <div class="card border d-flex h-7 border-warning ">    
                                  
                                    <img class="img-thumbnail " src="{{ asset('admin/assets/uploads/products/'.$ugl->image) }}"
                                     alt="Products Image">
                                    <div class="card-body  shadow">
                                        <div class="mt-auto">
                                            <h5 >{{ $ugl->name }}</h5>
                                        <span  class="float-start ">{{ $ugl->selling_price }}</span>
                                        <span class="float-end"><s>{{ $ugl->original_price }}</s></span>
                                        </div>
                                    </div>
                                </div>
                              </a>
                             
                            </div>
                           
                        @endforeach
                        
                    </div>
                    
                </div>
            </div>
        </div>
@endsection

@section('scripts')
    <script>
       $('.featured-carousel').owlCarousel({
    loop:true,
    widht:10,
    margin:10,
    nav:true,
    dots:false,
    responsive:{
        0:{
            items:1
        },
        600:{
            items:3
        },
        1000:{
            items:4
        }
    }
})
    </script>
@endsection