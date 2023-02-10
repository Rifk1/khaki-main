@extends('layouts.frontend')

@section('title')
    toko
@endsection
@section('content')
  <div class="py-5">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2>Semua kategori</h2>
                <div class="row">
                    @foreach ($category as $cate)
                    <div class="col-md-4 mb-3">
                        <a href="{{ url('view-category/'.$cate->slug) }}"> 
                            <div class="card border d-flex h-7 border-warning" >
                                <img class="img-thumbnail" src="{{ asset('admin/assets/uploads/category/'.$cate->image) }}" alt="category Image">
                                <div class="card-body border shadow">
                                    <h5>{{ $cate->name }}</h5>
                                    <p>
                                    {{ $cate->description }}
                                    </p>
                                    
                                
                                </div>
                            </div>
                        </a>
                    </div>
                     @endforeach
                </div>
               
            </div>
                
        </div>
    </div>
</div>

     
@endsection
 