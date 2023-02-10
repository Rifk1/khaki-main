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
           <form action="{{ url('insert-products') }}" method="POST" enctype="multipart/form-data">
            @csrf
           
               <div class="row">
                   <div class="col-md-12 mb-3">
                    <select class="form-select" name="cate_id" aria-label="Default select example">
                        <option value="">Pilih kategori</option>
                        <option value="1">One</option>
                        @foreach ($category as $item)
                            
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                        @endforeach
                      </select>
                   </div>
                   <div class="col-md-6 mb-3 ">
                       <label for="">Nama</label>
                       <input type="text" class="form-control" name="name" placeholder="nama">
                       <hr class="dark  my-1">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" class="form-control" name="slug" placeholder="Slug">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Deskripsi kecil</label>
                    <textarea  class="form-control" name="small_description" placeholder="Deskripsi"  rows="3"></textarea>
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Deskripsi</label>
                    <textarea  class="form-control" name="description" placeholder="Deskripsi"  rows="3"></textarea>
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Harga Original</label>
                    <input type="text" class="form-control"  name="original_price" placeholder="Original Penjualan">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Harga jualan</label>
                    <input type="text" class="form-control" name="selling_price" placeholder="Harga Jual">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Tax</label>
                    <input type="text" class="form-control" name="tax" placeholder="Tax">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Kualitas</label>
                    <input type="text" class="form-control" name="qty" placeholder="Original Penjualan">
                    <hr class="dark  my-1">
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" name="status" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Trending</label>
                    <input type="checkbox" name="trending">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" class="form-control" name="meta_title" placeholder="Meta title">
                    <hr class="dark  my-1">
                </div>
                 
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea  class="form-control" name="meta_keyword"   rows="3" placeholder="meta Keyword"></textarea>
                    <hr class="dark  my-1">
                </div> 
                <div class="col-md-12 mb-3">
                    <label for="">Meta Deskripsi</label>
                    <textarea  class="form-control" name="meta_description"   rows="3" placeholder="meta Keyword"></textarea>
                    <hr class="dark  my-1">
                </div>
                <div class="form-group">
                    <input type="file" class="form-control-file" name="image">
                </div>
                <div class="col-md-12 mt-3">
    
                    <button type="submit" class="btn btn-primary">Tambah</button>
                </div>
               </div>
           </form>
       </div>
    </div>
</div>
    
@endsection 