@extends('layouts.admin')
@section('categorynav')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Edit Category</li>
  </ol>
 
    
@endsection
@section('container')
<div class="card">
    <div class="card-header">
        <h4>Edit Categoy</h4>
       <div class="card-body">
           <form action="{{ url('update-category/'.$category->id)  }}" method="POST" enctype="multipart/form-data">         
            @csrf
            @method('put')
               <div class="row">
                   <div class="col-md-6 mb-3 form-grup">
                       <label for="">Nama</label>
                       <input type="text" value="{{ $category->name }}" class="form-control" name="name">
                       <hr class="dark  my-1">
                   </div>
                   <div class="col-md-6 mb-3">
                    <label for="">Slug</label>
                    <input type="text" value="{{ $category->slug }}" class="form-control" name="slug" disabled>
                   
                    <hr class="dark  my-1">
                </div>
                
                <div class="col-md-12 mb-3">
                    <label for=""> Deskripsi</label>
                    <textarea  class="form-control" name="description"   rows="3">{{ $category->description }}</textarea>
                    <hr class="dar k  my-1">
                </div> 
                <div class="col-md-6 mb-3">
                    <label for="">Status</label>
                    <input type="checkbox" {{ $category->status == "1" ? 'checked':'' }} name="status" >
                </div>
                <div class="col-md-6 mb-3">
                    <label for="">Popular</label>
                    <input type="checkbox" {{ $category->popular == "1" ? 'checked':'' }} name="popular">
                </div>
                <div class="col-md-12 mb-3">
                    <label for="">Meta Title</label>
                    <input type="text" value="{{ $category->meta_title }}" class="form-control" name="meta_title" >
                    <hr class="dark  my-1">
                </div>
                 
                <div class="col-md-12 mb-3">
                    <label for="">Meta Keyword</label>
                    <textarea  class="form-control" name="meta_keyword"   rows="3" >{{ $category->meta_keyword  }}</textarea>
                    <hr class="dark  my-1">
                </div> 
                <div class="col-md-12 mb-3">
                    <label for="">Meta Deskripsi</label>
                    <textarea  class="form-control" name="meta_description"   rows="3" >{{ $category->meta_descrip }}</textarea>
                    <hr class="dark  my-1">
                </div>
                <td class="align-middle text-center">
                @if($category->image)
                <img src="{{ asset('admin/assets/uploads/category/'. $category->image) }}" alt="Category image" class="cate-image" height="200" width="111">  
                @endif
                </td>
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
 