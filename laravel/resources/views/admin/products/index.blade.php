@extends('layouts.admin')
@section('categorynav')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">produk</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">produk</h6>
 
    
@endsection
@section('container')
<div wire:ignore.self class="modal fade" id="hapus" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="hapusLabel" aria-hidden="true">

  <div class="modal-dialog   modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header text-center">
        <h1 class="modal-title fs-5 w-100" id="staticBackdropLabel">Hapus Produk</h1>
        <button type="button" class="btn-close" wire:click="clodeModal" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <form wire:submit.prevent="destroy">
      <div class="modal-body">
      
        <h4> Yakin Ingin Menghapus Data?</h4>
       
      </div>
     
      <div class="modal-footer">
        <button type="button" wire:click="clodeModal" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Ya</button>
        {{-- <a class="btn btn-primary" href="{{ url('delete-product/'.$item->id) }}">Save</a> --}}
      
      </div>
    </form>
    </div>
  </div>


</div>
<div class="card">
    <div class="card-header">
      <button type="button" class="btn btn-primary auto-margin" data-bs-toggle="modal" data-bs-target="#staticBackdrop-add">
        Add Produk
      </button>
  
                  <!-- Modal -->
                  <div class="modal fade" id="staticBackdrop-add" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                    <div class="modal-dialog">
                      <div class="modal-content">
                        <div class="modal-header">
                          <h5 class="modal-title" id="staticBackdropLabel">Tambah</h5>
                          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
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
                                         <label for="">Harga jual</label>
                                         <input type="text" class="form-control" name="selling_price" placeholder="Harga Jual">
                                         <hr class="dark  my-1">
                                     </div>
                                     <div class="col-md-6 mb-3">
                                         <label for="">Tax</label>
                                         <input type="text" class="form-control" name="tax" placeholder="Tax">
                                         <hr class="dark  my-1">
                                     </div>
                                     <div class="col-md-6 mb-3">
                                         <label for="">Jumlah</label>
                                         <input type="text" class="form-control" name="qty" placeholder="Jumlah Barang">
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
                                         <input type="file" class="form-control-file image" name="image">
                                     </div>
                                     <div class="col-md-12 mt-3">
                         
                                         <button type="submit" class="btn btn-primary">Tambah</button>
                                     </div>
                                    </div>
                                </form>
                            </div>
                            </div>
                        </div>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                         
                        </div>
                      </div>
                    </div>
                    @include('admin.products.modalProduk.modalcrop')
                  </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12">
              <div class="card my-4"> 
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Table Produk</h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Category</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nama</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">harga asli</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($products as $item)
                          <tr>
                            <td class=" ms-3">     
                                  <h6 class="mb-0 text-sm ms-2">{{ $item->id }}</h6>
                            </td>
                            <td class="align-middle text-center text-sm">
                              {{ $item->category->name }}
                          </td>
                          <td>
                            <p class="align-middle  text-sm text-center font-weight-bold mb-0">{{ $item->name }}</p>
                            
                          </td>
                        
                            <td class="align-middle text-center text-sm">
                                {{ $item->selling_price }}
                            </td>
                            <td class="align-middle text-center">
                                <img src="{{ asset('admin/assets/uploads/products/'.$item->image) }}" class="cate-image" alt="Gambar disini" height="200"> 
                            </td>
                            <td class="align-middle text-center">
                               <a href="{{ url('edit-product/'.$item->id ) }}"  class="btn btn-primary btn-sm"> <i class="bi bi-pencil-fill"></i></a>
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropDelProd">
                                  <i class="bi bi-trash-fill"></i> --}}
                                 
                                 
                                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $item->id }}">
                                    <i class="bi bi-trash-fill"></i>
                                  </button>
                             
                                  @include('admin.products.modalProduk.modal')
                                  
                          
                              <!-- Modal -->
                              <div
                                  class="modal fade"
                                  id="hapusModal{{ $item->id }}"
                                  tabindex="-1"
                                  role="dialog"
                                  aria-labelledby="hapusModalLabel"
                                  aria-hidden="true"
                              >
                                  <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                          <div class="modal-header">
                                              <h5 class="modal-title" id="hapusModalLabel">Konfirmasi Hapus</h5>
                                              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                  <span aria-hidden="true">&times;</span>
                                              </button>
                                          </div>
                                          <div class="modal-body">
                                              Apakah Anda yakin ingin menghapus data ini? 
                                          </div>
                                          <div class="modal-footer">
                                              <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                             
                                          </div>
                                      </div>
                                  </div>
                              </div>
                          
                                <!-- Modal -->
                                <!-- Vertically centered modal -->
                         

                               
                               {{-- <a href="{{ url('delete-product/'.$item->id) }}" class="btn btn-danger btn-sm">Delete</a> --}}
                            </td>
                          </tr>
                          <tr>
                        
                          @endforeach
                       
                        
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
    </div>
</div>
    
@endsection

@section('scripts')
<script>
  $(document).ready(function () {
    $('.btnDeleteProduct').click(function (e) { 
      e.preventDefault();
      
      var pruduct_id = $(this).val();
      $('#product_id').val(product_id);
      $('#deleteModal').modal('show');

    });
  });
</script>
    
@endsection