@extends('layouts.admin')
@section('categorynav')
<ol class="breadcrumb bg-transparent mb-0 pb-0 pt-1 px-0 me-sm-6 me-5">
    <li class="breadcrumb-item text-sm"><a class="opacity-5 text-dark" href="javascript:;">Pages</a></li>
    <li class="breadcrumb-item text-sm text-dark active" aria-current="page">Categories</li>
  </ol>
  <h6 class="font-weight-bolder mb-0">User Teregistrasi</h6>
 
    
@endsection
@section('container')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                 
                  <div class="row ">
                    <div class="col">
                        <h4 class="text-center float-start">User Detail</h4>
                    </div>
                    <div class="col">
                      
                    </div>
                    <div class="col">
                        <h4><a class="link-menu float-end btn-light btn   " href="{{ url ('users') }}"><i class="bi icon-size bi-backspace"></i> </a></h4>
                    </div>
                  </div>
                    <div class="card-body">
                    <div class="row">
                       <div class="col-md-4">
                        <label for="">Role</label>
                        <div class="p-2 border">{{ $users->role_as == '0'? 'User':'Admin' }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Nama Pertama</label>
                        <div class="p-2 border">{{ $users->name }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Nama Terakhir</label>
                        <div class="p-2 border">{{ $users->lname }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Email</label>
                        <div class="p-2 border">{{ $users->email }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">No Hp</label>
                        <div class="p-2 border">{{ $users->phone }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Alamat1</label>
                        <div class="p-2 border">{{ $users->address1 }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Alamat2</label>
                        <div class="p-2 border">{{ $users->address2 }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Kota</label>
                        <div class="p-2 border">{{ $users->city }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Negara</label>
                        <div class="p-2 border">{{ $users->country }}</div>
                    </div>
                        <div class="col-md-4">
                        <label for="">Kode Pos</label>
                        <div class="p-2 border">{{ $users->pincode }}</div>
                    </div>
                       </div>
                          </div>
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

    
@endsection 