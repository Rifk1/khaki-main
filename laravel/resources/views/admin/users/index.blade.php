@extends('layouts.admin')
@section('categorynav')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">User</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">User</h6>
 
    
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
     
  
        <div class="card-body">
        <div class="row">
            <div class="col-12">
              <div class="card my-4"> 
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Category table</h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
          
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nama</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Email</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">No Tlp</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($users as $item)
                          <tr>
                            <td class=" ms-3">     
                                  <h6 class="mb-0 text-sm ms-2">{{ $item->id }}</h6>
                            </td>
                            
                          <td>
                            <p class="align-middle  text-sm text-center font-weight-bold mb-0">{{ $item->name.' '.$item->lname }}</p>
                            
                          </td>
                        
                            <td class="align-middle text-center text-sm">
                                {{ $item->email }}
                            </td>
                            <td class="align-middle text-center text-sm">
                                {{ $item->phone }}
                            </td>
                            
                           
                            <td class="align-middle text-center">
                               <a href="{{ url('view-users/'.$item->id ) }}"  class="btn btn-primary btn-sm"> View</a>
                                <!-- Button trigger modal -->
                                {{-- <button type="button" class="btn btn-danger btn-sm" data-bs-toggle="modal" data-bs-target="#staticBackdropDelProd">
                                  <i class="bi bi-trash-fill"></i> --}}
                                 
                                 
                                  <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#ModalDelete{{ $item->id }}">
                                    <i class="bi bi-trash-fill"></i>
                                  </button>
                             
                                  @include('admin.products.modalProduk.modal')
                                  {{-- <button
                                  type="button"
                                  data-toggle="modal"
                                  data-target="#hapusModal{{ $item->id }}"
                              >
                                  Hapus
                              </button>
                          
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
                              </div> --}}
                          
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