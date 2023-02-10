@extends('layouts.admin')

@section('container')
@section('categorynav')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Dashboard</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">Dashboard</h6>
 
    
@endsection
   
    <div class="row">
        
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-dark shadow-dark text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">inventory</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Jumlah Pesanan</p>
                <h4 class="mb-0">{{ $totalOrder }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <a href="{{ url('orders') }}" class="mb-0"><span class="text-success text-sm font-weight-bolder">Lihat Pesanan</span></a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-primary shadow-primary text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">person</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Users</p>
                <h4 class="mb-0">{{ $totaluser }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <a href="{{ url('users') }}" class="mb-0"><span class="text-success text-sm font-weight-bolder">Lihat User</span></a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-xl-0 mb-4">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-success shadow-success text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">category</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Kategori</p>
                <h4 class="mb-0">{{ $totalCategory }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <a href="{{ url('categories') }}" class="mb-0"><span class="text-success text-sm font-weight-bolder">Lihat Kategori</span></a>
            </div>
          </div>
        </div>
        <div class="col-xl-3 col-sm-6">
          <div class="card">
            <div class="card-header p-3 pt-2">
              <div class="icon icon-lg icon-shape bg-gradient-info shadow-info text-center border-radius-xl mt-n4 position-absolute">
                <i class="material-icons opacity-10">inventory_2</i>
              </div>
              <div class="text-end pt-1">
                <p class="text-sm mb-0 text-capitalize">Total Produk</p>
                <h4 class="mb-0">{{ $totalProduk }}</h4>
              </div>
            </div>
            <hr class="dark horizontal my-0">
            <div class="card-footer p-3">
              <a href="{{ url('products') }}" class="mb-0"><span class="text-success text-sm font-weight-bolder">Lihat Produk</span></a>
            </div>
          </div>
        </div>
      </div>

      
    
@endsection
@section('scripts')
<script>
          
  $(document).ready(function () {
      loadOrder();
      $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
  function loadOrder()
  {
      $.ajax({
          type: "GET",
          url: "/load-order-data",
          success: function (response) {
              $('.order-count').html('');
              $('.order-count').html(response.count);
          //    console.log(response.count)
          }
      });
  }
  });
    </script>
@endsection