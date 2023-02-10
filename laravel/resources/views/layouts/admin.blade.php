<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!--     Fonts and icons     -->
    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900|Roboto+Slab:400,700" />
    <!-- Nucleo Icons -->
    <link href="../assets/css/nucleo-icons.css" rel="stylesheet" />
    <link href="../assets/css/nucleo-svg.css" rel="stylesheet" />
    <!-- Font Awesome Icons -->
    <script src="https://kit.fontawesome.com/42d5adcbca.js" crossorigin="anonymous"></script>
    <!-- Material Icons -->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Round" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <!-- CSS only -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@48,400,0,0" />
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-iYQeCzEYFbKjA/T2uDLTpkwGzCiq6soy8tYaI1GyVh/UjpbCx/TYkiZhlZB6+fzT" crossorigin="anonymous">
    <!-- CSS Files -->
     
    
    
    <link rel="stylesheet" href="{{ asset('admin/css/material-dashboard.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/costom.css') }}">
    <link rel="stylesheet" href="{{ asset('frontend/css/cropper.min.css') }}">
    

   
</head>
<body class="g-sidenav-show  bg-gray-200">
    @include('layouts.inc.sidebar')
    <main class="main-content position-relative max-height-vh-100 h-100 border-radius-lg ">
        @include('layouts.inc.navbar')
        <div class="container-fluid py-4">
            @yield('container')
        </div>
        @include('layouts.inc.footer')
    </main>
    
      <!-- Scripts -->
      {{-- @vite(['resources/sass/app.scss', 'resources/js/app.js']) --}}
      <script src="{{ asset('admin/js/material-dashboard.min.js') }}" defer></script>
      <script src="{{ asset('admin/js/cropper.min.js') }}"></script>
      <script src="{{ asset('admin/js/custom.js') }}"></script>
      {{-- <script src="{{ asset('admin/js/core/popper.min.js') }}" defer></script>
      <script src="{{ asset('admin/js/core/bootstrap.bundle.min.js') }}" ></script>
      <script src="{{ asset('admin/js/plugins/perfect-scrollbar.min.js') }}" ></script>
      <script src="{{ asset('admin/js/plugins/smooth-scrollbar.min.js') }}" ></script>
      <script src="{{ asset('admin/js/plugins/chartjs.min.js') }}" defer></script>
      <script src="{{ asset('frontend/js/bootstrap.bundle.min.js') }}" ></script> --}}

      {{-- <script src="/admin/js/material-dashboard.min.js"></script> --}}
      <script src="/admin/js/core/popper.min.js"></script>
      <script src="/admin/js/core/bootstrap.min.js"></script>
      <script src="/admin/js/plugins/perfect-scrollbar.min.js" ></script>
      <script src="/admin/js/plugins/smooth-scrollbar.min.js"></script>
      <script src="/admin/js/plugins/chartjs.min.js "></script>
      <script src="/frontend/js/bootstrap.bundle.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
@if(session('status'))
    <script>
        swal("{{ session('status') }}");
    </script>
@endif 
      <!-- JavaScript Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-u1OknCvxWvY5kfmNBILK2hRnQC3Pr17a+RTT6rIHI7NnikvbZlHgTPOOmMi466C8" crossorigin="anonymous"></script>
      
  <script>
    var win = navigator.platform.indexOf('Win') > -1;
    if (win && document.querySelector('#sidenav-scrollbar')) {
      var options = {
        damping: '0.5'
      }
      Scrollbar.init(document.querySelector('#sidenav-scrollbar'), options);
    }
  </script>
  <script>
    const WIDHT = 200
    let input = document.getElementById("input")

    input.addEventListener("change", (event) (event) => {

      let image_file = even.targer.files[0]
      
      let reader = new FileReader
      reader.readAsDataURL(image_file)

      reader.onload = (event) =>{

        let image_url = event.target.result

        let image = document.createElement("img")
        image.src = image_url

        image.onload = (e) =>{
            let canvas =  document.createElement("canvas")
            let ratio = WIDHT / e.target.widht
            canvas.widht = WIDHT
            canvas.height = e.target.height * ratio

            const context  = canvas.getContext("2d")
            context.drawImage(image, 0 , 0, canvas.widht, canvas.height)

            let new_image_url = context.canvastoDataURL("image/jpg", 90)

            let new_image = document.createElement("img")
            new_image.src = new_image_url
            document.getElementById("wrapper").appendChild(image) 
        }
          

        
            
      }
    })
  </script>
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
  <script>
    function handleDelete()
    {
       $('deleteModal').modal('show')
    }
   </script>  
  
  @yield('scripts')

      
</body>
</html>
