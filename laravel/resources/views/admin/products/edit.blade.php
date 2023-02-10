@extends('layouts.admin')
@section('categorynav')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categories</li>
  </ol>

    
@endsection
@section('container')
<div class="card">
    <div class="card-header">
        <h4>Tambah Produk</h4>
       <div class="card-body">
           <form action="{{ url('update-product/'.$products->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
           
               <div class="row">
                   <div class="col-md-12 mb-3">
                    <select class="form-select"  aria-label="Default select example">
                        <option value="">{{ $products->category->name }}</option>
                      </select>
                   </div>
                   <div class="col-md-6 mb-3 ">
                       <label for="">Nama</label>
                       <input type="text" class="form-control" value="{{ $products->name }}" name="name" placeholder="nama">
                       <hr class="dark  my-1">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" value="{{ $products->slug }}" name="slug" placeholder="Slug">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Deskripsi kecil</label>
                    <textarea  class="form-control" name="small_description" placeholder="Deskripsi"  rows="3">{{ $products->small_description }}</textarea>
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea  class="form-control" name="description" placeholder="Deskripsi"  rows="3">{{ $products->description }}</textarea>
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Harga Original</label>
                    <input type="text" class="form-control" value="{{ $products->original_price }}" name="original_price" placeholder="Original Penjualan">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Harga jualan</label>
                    <input type="text" class="form-control"  value="{{ $products->selling_price }}" name="selling_price" placeholder="Harga Jual">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="text" class="form-control" value="{{ $products->tax }}" name="tax" placeholder="Tax">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">jumlah</label>
                    <input type="text" class="form-control" value="{{ $products->qty }}" name="qty" placeholder="Original Penjualan">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $products->status == "1" ? 'checked':'' }} name="status" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" {{ $products->trending == "1" ? 'checked':'' }} name="trending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" value="{{ $products->meta_title }}" name="meta_title" placeholder="Meta title">
                    <hr class="dark  my-1">
                </div>
                 
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea  class="form-control" name="meta_keyword"   rows="3" placeholder="meta Keyword">{{ $products->meta_keyword }}</textarea>
                    <hr class="dark  my-1">
               
                <div class="col-md-12 mb-3">
                    <label for="">Meta Deskripsi</label>
                    <textarea  class="form-control" name="meta_description"   rows="3" placeholder="meta Keyword">{{ $products->meta_description}}</textarea>
                    <hr class="dark  my-1">
                </div>
                 @if($products->image)
                <img src="{{ asset('admin/assets/uploads/products/'. $products->image) }}" alt="Category image" class="cate-image" width="200">  
                @endif
                <div class="form-group mt-3">
                    <input type="file" class="form-control-file" name="image">
                </div>
                <div class="col-md-12 mt-3">
    
                    <button type="submit" class="btn btn-primary">update</button>
                </div>
               </div>
           </form>
       </div>
    </div>
</div>
    
@endsection 