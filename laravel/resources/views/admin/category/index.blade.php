@extends('layouts.admin')
@section('categorynav')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">kategori</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">kategori</h6>
 
    
@endsection
@section('container')

<div class="card">
    <div class="card-header">
      <!-- Button trigger modal -->
    <button type="button" class="btn btn-primary auto-margin" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
      Add Category
    </button>

                <!-- Modal -->
                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Modal title</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                      </div>
                      <div class="modal-body">
                        <div class="card">
                          <div class="card-header">
                              <h4>Tambah Categoy</h4>
                            <div class="card-body">
                                <form action="{{ url('insert-category') }}" method="POST" enctype="multipart/form-data">
                                  @csrf
                                
                                    <div class="row">
                                        <div class="col-md-6 mb-3 ">
                                            <label for="">Nama</label>
                                            <input type="text" class="form-control" name="name" placeholder="nama">
                                            <hr class="dark  my-1">
                                        </div>
                                        
                                      
                                      <div class="col-md-12 mb-3">
                                          <label for="">Deskripsi</label>
                                          <textarea  class="form-control" name="description" placeholder="Deskripsi"  rows="3"></textarea>
                                          <hr class="dark  my-1">
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <label for="">Status</label>
                                          <input type="checkbox" name="status" >
                                      </div>
                                      <div class="col-md-6 mb-3">
                                          <label for="">Popular</label>
                                          <input type="checkbox" name="popular">
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
                                          <input type="file" id="input" class="form-control-file" name="image">
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
                </div>
        <div class="card-body">
        <div class="row">
            <div class="col-12">
              <div class="card my-4"> 
                <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                  <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">Table Kategori</h6>
                  </div>
                </div>
                <div class="card-body px-0 pb-2">
                  <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                      <thead>
                        <tr>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Id</th>
                          <th class="text-uppercase text-secondary text-xxs font-weight-bolder opacity-7 ">Nama</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Deskripsi</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Gambar</th>
                          <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Action</th>
                          <th class="text-secondary opacity-7"></th>
                        </tr>
                      </thead>
                      <tbody>
                          @foreach ($category as $item)
                          <tr>
                            <td class=" ms-3">
                              
                                
                                  <h6 class="mb-0 text-sm ms-2">{{ $item->id }}</h6>
                                
                              
                            </td>
                            <td>
                              <p class="align-middle  text-sm text-center font-weight-bold mb-0">{{ $item->name }}</p>
                              
                            </td>
                            <td class="align-middle text-center text-sm">
                                {{ $item->description }}
                            </td>
                            <td class="align-middle text-center">
                                <img src="{{ asset('admin/assets/uploads/category/'.$item->image) }}" class="cate-image" alt="Gambar disini"  height="200" > 
                            </td>
                            <td class="align-middle text-center">
                               <a href="{{ url('edit-prod/'.$item->id ) }}"  class="btn btn-primary"><i class="bi bi-pencil-fill"></i> </a>
                               <!-- Button trigger modal -->
                                  
                               
                               <button type="button" class="btn btn-primary " data-bs-toggle="modal" data-bs-target="#ModalDeleteCategory{{ $item->id }}">
                                <i class="bi bi-trash-fill"></i>
                              </button>
                              @include('admin.category.modal.delete')
                                
                                 
                            </td>
                            
                          </tr>
                          <tr>
                        
                          @endforeach
                       
                        
                      </tbody>
                    </table>
                    {{-- <div class="modal fade" id="deleteModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-centered">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            Yakin Ingin Menghapus Data <b>{{ $item->id }}</b>?
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            <button type="button" class="btn btn-primary">Save changes</button>
                          </div>
                        </div>
                      </div>
                    </div> --}}
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
{{-- <script>
  $(document).ready(function () {
    $('.btnDeleteCategory ').click(function (e) { 
      e.preventDefault();
      
      var category_id = $(this).val();
      $('#category_id').val(category_id);
      $('#deleteModal').modal('show');

    });
  });
</script> --}}
<script>
 function handleDelete()
 {
    $('deleteModal').modal('show')
 }
</script>
    
@endsection