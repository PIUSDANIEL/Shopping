<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Shoppers</title>


       <!-- bootstrap -->
       <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
       <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>


         <!-- Font Awesome -->
         <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

         <!-- Google Fonts -->
         <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />

        <!--jquery--->
        <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>


        <!---css  -->
        <link rel="stylesheet"  href="{{ asset('css/market.css') }}" >



             <!-- js --->
           <script type="text/javascript" src="{{ asset('js/market.js') }}" ></script>




            <!--Sweet alert---->
         <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

            <!-- Fotorama from CDNJS, 19 KB -->
            <link  href="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.css" rel="stylesheet">
            <script src="https://cdnjs.cloudflare.com/ajax/libs/fotorama/4.6.4/fotorama.js"></script>

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.carousel.min.css" integrity="sha512-tS3S5qG0BlhnQROyJXvNjeEM4UpMXHrQfTGmbQ1gKmelCxlSEBUaxhRBj/EFTzpbP4RVSrpEikbmdJobCvhE3g==" crossorigin="anonymous" referrerpolicy="no-referrer" />

        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/OwlCarousel2/2.3.4/assets/owl.theme.default.min.css" integrity="sha512-sMXtMNL1zRzolHYKEujM2AqCLUR9F2C4/05cdbxjjLSRvMQIciEPCQZo++nk7go3BtSuK9kfa/s+a4f4i5pLkw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>


    </head>
    <body class="antialiased">
        <div class="container-fluid maincontainer">

                {{-- -bigger screen --}}

                <div class="row bigscreen p-2  justify-content-between fixed-top " style="background-color: rgb(255, 210, 175);">

                    <div class="col-md-2 col-lg-1  d-flex">


                            <div class="card ms-auto" style="border-radius:10px; width:26px; height:26px;">
                                <a href="{{ asset('/') }}"><img src="{{ asset('images/flea.jpg') }}" width="26px" height="26px" class="img-fluid rounded" alt="fleamarket logo"></a>

                            </div>


                    </div>

                    <div class="col-2 p-0">
                        <button type="button" class="btn btn-sm  m-0" data-bs-toggle="modal" data-bs-target="#modalId">
                            Search <span class="badge bg-dark"><i class="fa-solid fa-search" aria-hidden="true"></i></span>
                        </button>
                    </div>



                    <div class="col-md-3 col-lg-2 d-flex  ">

                            @if ( Auth::guard('admin')->user() )


                                <div class="dropdown open">


                                    <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                    <div class="dropdown-menu" aria-labelledby="triggerId">

                                        <a class="dropdown-item" style="font-size:14px;" href="{{ route('admin.dashboard') }}">Profile

                                                <span class="badge  mt-1">
                                                     <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                                </span>
                                        </a>

                                        <a href="{{ route('admin.adminLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                        style="font-size:14px;">
                                            <p>
                                                Logout
                                            <span class="badge  mt-1">
                                            <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>

                                            </p>
                                        </a>

                                        <form id="logout-form" action="{{ route('admin.adminLogout') }}" method="Post">
                                            @csrf

                                        </form>



                                    </div>
                                </div>

                            @elseif (Auth::guard('editor')->user())


                                <div class="dropdown open">


                                    <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                    <div class="dropdown-menu" aria-labelledby="triggerId">

                                        <a class="dropdown-item" style="font-size:14px;" href="{{ route('editor.dashboard') }}">Profile

                                                <span class="badge  mt-1">
                                                     <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                                </span>
                                        </a>

                                        <a href="{{ route('editor.editorLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                        style="font-size:14px;">
                                            <p>
                                                Logout
                                            <span class="badge  mt-1">
                                            <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>

                                            </p>
                                        </a>

                                        <form id="logout-form" action="{{ route('editor.editorLogout') }}" method="Post">
                                            @csrf

                                        </form>



                                    </div>
                                </div>

                            @elseif (Auth::guard('seller')->user())


                                <div class="dropdown open">


                                    <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                    <div class="dropdown-menu" aria-labelledby="triggerId">

                                        <a class="dropdown-item" style="font-size:14px;" href="{{ route('seller.dashboard') }}">Profile

                                                <span class="badge  mt-1">
                                                     <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                                </span>
                                        </a>

                                        <a href="{{ route('seller.sellerLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                        style="font-size:14px;">
                                            <p>
                                                Logout
                                            <span class="badge  mt-1">
                                            <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>

                                            </p>
                                        </a>

                                        <form id="logout-form" action="{{ route('seller.sellerLogout') }}" method="Post">
                                            @csrf

                                        </form>



                                    </div>
                                </div>


                            @elseif (Auth::guard('web')->user())


                                <div class="dropdown open">


                                    <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                    aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                    <div class="dropdown-menu" aria-labelledby="triggerId">

                                        <a class="dropdown-item" style="font-size:14px;" href="{{ route('user.dashboard') }}">Profile

                                                <span class="badge  mt-1">
                                                     <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                                </span>
                                        </a>

                                        <a href="{{ route('user.userLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                        style="font-size:14px;">
                                            <p>
                                                Logout
                                            <span class="badge  mt-1">
                                            <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>

                                            </p>
                                        </a>

                                        <form id="logout-form" action="{{ route('user.userLogout') }}" method="Post">
                                            @csrf

                                        </form>



                                    </div>
                                </div>

                            @else

                                <a href="{{ route('user.login') }}" class="ms-auto" style="font-size:14px;">
                                    <p>
                                        Sign in

                                    <i class="fa fa-user-plus ml-1" style="color:black; font-size: small; " aria-hidden="true"></i>

                                    </p>
                                </a>


                            @endif



                        <a href="{{ route('cart_product') }}" class="p-0 ms-auto">
                            <div class="card   p-0 ms-auto " style="border-radius:10px; width:70px; height:26px; background-color: transparent; ">
                                <img src="{{ asset('images/shopping-cart.png') }}" width="25px" height="25px" class="img-fluid rounded  " alt="cart">
                                <div class="card-img-overlay ">
                                    <p class=" ml-4 mt-n3 mycart bold" id=""  style="color:black;font-weight: 700; "></p>
                                </div>
                            </div>
                        </a>
                    </div>

                </div>

                 {{-- -smallerr screen --}}

                 <div class="row small-screen p-2 justify-content-around fixed-top" style="background-color: rgb(255, 210, 175);">


                    <div class="col-1 d-flex justify-content-center " data-bs-toggle="offcanvas" data-bs-target="#offcanvasExamplesmallscreen" aria-controls="offcanvasExamplesmallscreen">

                            <i class="fa fa-bars " style="font-weight:bold ; font-size:larger ; " aria-hidden="true"></i>

                    </div>

                    <div class="col-1">
                        <a href="{{ asset('/') }}" class="card " style="border-radius:10px; width:26px; height:26px;">
                            <img src="{{ asset('images/flea.jpg') }}" width="26px" height="26px" class="img-fluid rounded" alt="fleamarket logo">

                        </a>
                    </div>

                    <div class="col-4">

                        @if ( Auth::guard('admin')->user() )


                            <div class="dropdown open">


                                <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                <div class="dropdown-menu" aria-labelledby="triggerId">

                                    <a class="dropdown-item" style="font-size:14px;" href="{{ route('admin.dashboard') }}">Profile

                                            <span class="badge  mt-1">
                                                <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>
                                    </a>

                                    <a href="{{ route('admin.adminLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                    style="font-size:14px;">
                                        <p>
                                            Logout
                                        <span class="badge  mt-1">
                                        <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                        </span>

                                        </p>
                                    </a>

                                    <form id="logout-form" action="{{ route('admin.adminLogout') }}" method="Post">
                                        @csrf

                                    </form>



                                </div>
                            </div>

                         @elseif (Auth::guard('editor')->user())


                            <div class="dropdown open">


                                <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                <div class="dropdown-menu" aria-labelledby="triggerId">

                                    <a class="dropdown-item" style="font-size:14px;" href="{{ route('editor.dashboard') }}">Profile

                                            <span class="badge  mt-1">
                                                <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>
                                    </a>

                                    <a href="{{ route('editor.editorLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                    style="font-size:14px;">
                                        <p>
                                            Logout
                                        <span class="badge  mt-1">
                                        <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                        </span>

                                        </p>
                                    </a>

                                    <form id="logout-form" action="{{ route('editor.editorLogout') }}" method="Post">
                                        @csrf

                                    </form>



                                </div>
                            </div>

                        @elseif (Auth::guard('seller')->user())


                            <div class="dropdown open">


                                <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                <div class="dropdown-menu" aria-labelledby="triggerId">

                                    <a class="dropdown-item" style="font-size:14px;" href="{{ route('seller.dashboard') }}">Profile

                                            <span class="badge  mt-1">
                                                <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>
                                    </a>

                                    <a href="{{ route('seller.sellerLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                    style="font-size:14px;">
                                        <p>
                                            Logout
                                        <span class="badge  mt-1">
                                        <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                        </span>

                                        </p>
                                    </a>

                                    <form id="logout-form" action="{{ route('seller.sellerLogout') }}" method="Post">
                                        @csrf

                                    </form>



                                </div>
                            </div>


                        @elseif (Auth::guard('web')->user())


                            <div class="dropdown open">


                                <img src="{{ asset('images/image.png') }}" class=" dropdown-toggle rounded-circle "  id="triggerId" data-bs-toggle="dropdown" aria-haspopup="true"
                                aria-expanded="false" style="width:2rem; height:2rem;" alt="...">

                                <div class="dropdown-menu" aria-labelledby="triggerId">

                                    <a class="dropdown-item" style="font-size:14px;" href="{{ route('user.dashboard') }}">Profile

                                            <span class="badge  mt-1">
                                                <i class="fa fa-user" style="color:black; font-size: small; " aria-hidden="true"></i>
                                            </span>
                                    </a>

                                    <a href="{{ route('user.userLogout') }}" class="ms-auto dropdown-item" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
                                    style="font-size:14px;">
                                        <p>
                                            Logout
                                        <span class="badge  mt-1">
                                        <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                                        </span>

                                        </p>
                                    </a>

                                    <form id="logout-form" action="{{ route('user.userLogout') }}" method="Post">
                                        @csrf

                                    </form>



                                </div>
                            </div>

                        @else

                            <a href="{{ route('user.login') }}" class="ms-auto" style="font-size:14px;">
                                <p>
                                    Sign in

                                <i class="fa fa-user-plus ml-1" style="color:black; font-size: small; " aria-hidden="true"></i>

                                </p>
                            </a>


                        @endif
                    </div>

                    <div class="col-2">
                       <a href="{{ route('cart_product') }}" class="p-0 ms-auto">
                            <div class="card  p-0 ms-auto " style="border-radius:10px; width:70px; height:30px; background-color: transparent; ">
                                <img src="{{ asset('images/shopping-cart.png') }}" width="30px" height="30px" class="img-fluid rounded  " alt="cart">
                                <div class="card-img-overlay ">
                                    <h6 class=" ml-4 mt-n2 rounded-circle mycart bold" style="width: 22px; height:22px; font-weight: 700; color:black; "></h6>
                                </div>
                            </div>
                       </a>
                    </div>


                    <div class="col-12 d-flex mt-1 mb-n2">

                        <button type="button" class="btn btn-sm  m-0" data-bs-toggle="modal" data-bs-target="#modalId">
                            Search <span class="badge bg-dark"><i class="fa-solid fa-search" aria-hidden="true"></i></span>
                        </button>

                        @if (Route::currentRouteName() == 'subcatproducts'  )
                            <button type="button" class="btn btn-sm ms-auto m-0" data-bs-toggle="modal" data-bs-target="#filterModal">
                                Filter <span class="badge bg-dark"><i class="fa-solid fa-arrow-up-wide-short" aria-hidden="true"></i></span>
                            </button>
                        @endif

                        @if (Route::currentRouteName() == 'products'  )
                            <button type="button" class="btn btn-sm ms-auto m-0" data-bs-toggle="modal" data-bs-target="#cateprodModal">
                                Filter <span class="badge bg-dark"><i class="fa-solid fa-arrow-up-wide-short" aria-hidden="true"></i></span>
                            </button>
                        @endif


                    </div>


                 </div>


                <div class="offcanvas offcanvas-start " style="background-color: rgb(255, 210, 175); width:90%; "  tabindex="-1" id="offcanvasExamplesmallscreen" aria-labelledby="offcanvasExamplesmallscreenLabel">
                    <div class="offcanvas-header">
                        <h5 class="offcanvas-title" id="offcanvasExampleLabel">Small</h5>
                        <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="offcanvas-body p-0">

                        <div class="row mt-2   mx-auto p-0" style="width: 100%;">

                            <div class="accordion accordion-flush " id="accordionFlushExampleSmall">
                                @foreach ($category as $categories)
                                    <div class="accordion-item">
                                        <h2 class="accordion-header" id="flush-headingOne">
                                            <button class="accordion-button collapsed  p-2" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $categories['categoryname'] }}" aria-expanded="false" aria-controls="{{ $categories['categoryname'] }}">
                                            <i class="fas fa-dot-circle mr-2"></i>  {{ $categories['categoryname'] }}
                                            </button>
                                        </h2>
                                        <div id="{{ $categories['categoryname'] }}" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExampleSmall">
                                            <div class="accordion-body ">

                                                <div class="row ">
                                                    <a href="#" class="card shadow rounded m-1 col-2 p-1">
                                                        <i class="fa fa-arrow-right text-center mt-2" style="font-size: 25px;"  aria-hidden="true"></i>
                                                    </a>

                                                    @foreach ($categories['subcat'] as $sub)
                                                        <a href="{{ route('subcatproducts',['id'=>$sub->id]) }}" class="card shadow rounded m-1 col-2 p-1">
                                                            <img src="{{ asset($sub->image) }}" class=" card-img-top"  alt="Sunset Over the Sea"/>
                                                        </a>
                                                    @endforeach

                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>


                        </div>

                    </div>
                </div>



                <!-- Modal Search -->
                <div class="modal fade" id="modalId" tabindex="-1" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-scrollable modal-xl" role="document">
                        <div class="modal-content">
                                <div class="modal-header">

                                            <div class="col-10 col-sm-6 modal-title" id="modalTitleId">
                                                <div class=" input-group p-0 rounded">
                                                    <input type="text" name="search"
                                                    id="searchpro" class="form-control form-control-sm rounded "
                                                     placeholder="Search Product" aria-describedby="suffixId">
                                                    <span class="input-group-text" id="suffixId"><i class="fa fa-search" aria-hidden="true"></i></span>
                                                </div>
                                                @csrf
                                            </div>




                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                            <div class="modal-body">
                                <div class="container-fluid ">
                                    <div class="row appensearch">

                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-sm" data-bs-dismiss="modal">Close</button>
                            </div>
                        </div>
                    </div>
                </div>

                <script>
                    var modalId = document.getElementById('modalId');

                    modalId.addEventListener('show.bs.modal', function (event) {
                          // Button that triggered the modal
                          let button = event.relatedTarget;
                          // Extract info from data-bs-* attributes
                          let recipient = button.getAttribute('data-bs-whatever');

                        // Use above variables to manipulate the DOM
                    });
                </script>


                {{-- DETAILS MODAL --}}
                <!-- Modal -->
                <div class="modal custom fade rounded " id="detailsModal" tabindex="-1"    aria-labelledby="detailsModalLabel" aria-hidden="true" >
                    <div class="modal-dialog  modal-dialog-scrollable  modal-xl  rounded" >
                        <div class="modal-content " >
                            <div class="modal-header">
                                <h5 class="modal-title alert-success p-1" id="detailsModalLabel"></h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <div class="row">
                                    <div class="col-md-12 col-lg-6">

                                        <div id="carouselExampleCaptions" class="carousel  slide rounded" data-bs-ride="carousel">

                                            <div class="carousel-inner caro rounded">

                                            </div>
                                            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="prev">
                                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Previous</span>
                                            </button>
                                            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleCaptions" data-bs-slide="next">
                                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                                <span class="visually-hidden">Next</span>
                                            </button>
                                        </div>
                                    </div>

                                    <div class="col-md-12 col-lg-6">
                                        <h6 class="mt-2" id="detailsname"></h6 cla>
                                        <p id="detailsbrand">Brand: XIAOMI | Similar products from XIAOMI</p>
                                        <p class="small">
                                            <i class="fa fa-star small" aria-hidden="true"></i>
                                            <i class="fa fa-star small" aria-hidden="true"></i>
                                            <i class="fa fa-star small" aria-hidden="true"></i>
                                            <i class="fa fa-star small" aria-hidden="true"></i>
                                            <i class="fa fa-star small" aria-hidden="true"></i>
                                        </p>
                                        <hr>
                                        <p class="money" id="detailsprice"></p>
                                        <p class="" ><del class="mr-4" id="detailslistprice"> </del>    <span style="background-color: rgba(238, 0, 0, 0.114);" class="ml-4 rounded p-1 text-danger" id="detailspercent"> </span></p>
                                        <p><i class="fa fa-heart" aria-hidden="true"></i> Add to wishlist</p>
                                        <div class="row alert-danger quantity-error"></div>

                                        <div class="row" id="detailsize"></div>

                                        <div class="card" >

                                            <div class="card-body">
                                                <p class="card-title" id="detailsseller">Seller's information</p>
                                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>

                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="row mt-4">
                                    <div class="col">
                                    <div class="accordion accordion-flush" id="accordionFlushExample1">
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingOne1">
                                                <button class="accordion-button collapsed p-2 text-info" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne1" aria-expanded="false" aria-controls="flush-collapseOne1">
                                                    Product description
                                                </button>
                                            </h2>
                                            <div id="flush-collapseOne1" class="accordion-collapse collapse" aria-labelledby="flush-headingOne1" data-bs-parent="#accordionFlushExample1">
                                                <div class="accordion-body" id="detailsdesc">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the first item's accordion body.</div>
                                            </div>
                                        </div>
                                        <div class="accordion-item">
                                            <h2 class="accordion-header" id="flush-headingTwo2">
                                                <button class="accordion-button collapsed p-2 text-info" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo2" aria-expanded="false" aria-controls="flush-collapseTwo2">
                                                Specification
                                                </button>
                                            </h2>
                                            <div id="flush-collapseTwo2" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo2" data-bs-parent="#accordionFlushExample1">
                                                <div class="accordion-body" id="detailsspec">Placeholder content for this accordion, which is intended to demonstrate the <code>.accordion-flush</code> class. This is the second item's accordion body. Let's imagine this being filled with some actual content.</div>
                                            </div>
                                        </div>

                                    </div>
                                    </div>
                                </div>

                                <div class="row mt-4 ">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class=" rounded px-3 text-white bg-info" >Similar product</span>

                                    </div>

                                    <div class="loop owl-carousel owl-theme mt-1 p-1" id="">
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>



                                <div class="row mt-4 ">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class=" rounded px-3 text-white bg-info" >Customers also viewed</span>

                                    </div>

                                    <div class="loop owl-carousel owl-theme mt-1 p-1" id="">
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                                <div class="row mt-4 ">
                                    <div class="col-12 d-flex justify-content-between">
                                        <span class=" rounded px-3 text-white bg-info" >You may also like these</span>

                                    </div>

                                    <div class="loop owl-carousel owl-theme mt-1 p-1" id="">
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="item">
                                            <div class="card mycard shadow rounded" style="">
                                                <img src="{{ asset('images/images(5).jpg') }}" class="card-img-top"  height='80' alt="Sunset Over the Sea"/>
                                                <div class="card-body px-1">
                                                    <div class="col-12 mt-n3 productcard "><p>Nike sneakers mmmmmmm</p></div>
                                                    <div class="col-12 mt-n3 mb-n3"><h6>&#8358; 40,000</h6></div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
                                <button type="button" class="btn btn-info btn-sm">Add to cart</button>
                            </div>
                        </div>
                    </div>
                </div>

                {{-- Filter MODAL only small screen--}}
                <!-- Modal -->
                <div class="modal custom fade rounded " id="filterModal" tabindex="-1"    aria-labelledby="filterModalLabel" aria-hidden="true" >
                    <div class="modal-dialog  modal-dialog-scrollable  modal-xl  rounded" >
                        <div class="modal-content " >
                            <div class="modal-header">
                                <h5 class="modal-title p-1 rounded" style="background-color:#cbd5e0 ;" id="filterModalLabel">Filter Product</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row rounded mt-4" style="cursor: pointer;">
                                    <h6 class="p-1 rounded  clear w-50" style="background-color: rgba(119, 119, 119, 0.407); color:black;">clear all</h6>
                                </div>
                                <form id="submitfiltersmall"  >
                                    @csrf
                                    <div class="col-lg-3 rounded" >
                                        <div class="accordion accordion-flush " id="accordionFlushExample">
                                            @foreach ($category as $categories)

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingOne">
                                                        <button class="accordion-button collapsed p-1 small" type="button" data-bs-toggle="collapse" data-bs-target="#{{ $categories['categoryname'] }}filter" aria-expanded="false" aria-controls="{{ $categories['categoryname'] }}filter">
                                                        <i class="fas fa-caret-down mr-2 small"></i> {{ $categories['categoryname'] }}
                                                        </button>
                                                    </h2>
                                                    <div id="{{ $categories['categoryname'] }}filter" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
                                                        <div class="accordion-body ">

                                                            <div class="row ">

                                                                    @foreach ($categories['subcat'] as $sub)
                                                                        <div class="card shadow rounded m-1 col-2 p-1">
                                                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                <input type="radio" class="btn-check" name="subcategory" id="{{ $sub->id }}" value="{{ $sub->id }}" autocomplete="off">
                                                                                <label class="btn btn-outline-primary p-0" for="{{ $sub->id }}">
                                                                                    <div class="col-12">
                                                                                        <img src="{{ $sub->image}}" class="" style="width:100%; height:100%;"  alt="Sunset Over the Sea"/>
                                                                                    </div>

                                                                                </label>

                                                                            </div>

                                                                        </div>
                                                                    @endforeach

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                            <div class="row ">
                                                <div class="col-lg-6 mt-3">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Product Name</span>
                                                        <input type="text" name="productname" class="form-control form-control-sm" aria-label="">
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <div class="input-group">
                                                    <span class="input-group-text">Price</span>
                                                    <input type="number" name="minprice" aria-label="First name" class="form-control form-control-sm" placeholder="Min price" min="1" >
                                                        <p class="mx-2" style="color: black;">to</p>
                                                    <input type="number"  name="maxprice" aria-label="Last name" class="form-control form-control-sm" placeholder="Max price" min="1" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mt-3 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="highlow" value="high" id="flexRadioDefault">
                                                    <label class="form-check-label" for="flexRadioDefault">
                                                    Highest to Lowest
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="highlow" value="low" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Lowest to Highest
                                                    </label>
                                                </div>
                                                </div>

                                                <div class="col-md-6 mt-3 ">

                                                    <div class="form-check form-check-inline px-4" style="background-color:#cbd5e0 ; color:black;">
                                                        <input class="form-check-input" type="checkbox" name="latest" id="inlineCheckbox1" value="1">
                                                        <label class="form-check-label medium" for="inlineCheckbox1">Latest Product</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <h6 class="w-25 p-1 rounded khhh" style="background-color:#cbd5e0 ; color:black;">Brand</h6>

                                                    <div class="row ml-2">
                                                        <div class="list-group filterbrandss" id="">

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <h6 class="w-75 p-1 rounded " style="background-color:#cbd5e0 ; color:black;">Percentage Discount</h6>

                                                    <div class="list-group">
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="50">
                                                            50% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="40">
                                                            40% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="30">
                                                            30% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="20">
                                                            20% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="10">
                                                        10% and more
                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <h6 class="w-75 p-1 rounded " style="background-color:#cbd5e0 ; color:black;">Product Rating</h6>

                                                    <div class="list-group">

                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="4">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                            & above
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="3">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                            & above
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="2">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                            & above
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="1">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                        & above
                                                        </label>
                                                    </div>

                                                </div>


                                            </div>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
                                <button type="submit" class="btn btn-outline-info btn-sm" data-bs-dismiss="modal">Apply<i class="fa-solid fa-arrow-up-wide-short" aria-hidden="true"></i></button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                 {{-- category product Filter MODAL only small screen--}}
                <!-- Modal -->
                <div class="modal custom fade rounded small-screen" id="cateprodModal" tabindex="-1"    aria-labelledby="cateprodModalLabel" aria-hidden="true" >
                    <div class="modal-dialog  modal-dialog-scrollable  modal-xl  rounded" >
                        <div class="modal-content " >
                            <div class="modal-header">
                                <h5 class="modal-title p-1 rounded" style="background-color:#cbd5e0 ;" id="cateprodModalLabel">Filter Product</h5>

                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>

                            <div class="modal-body">
                                <div class="row rounded mt-4" style="cursor: pointer;">
                                    <h6 class="p-1 rounded  clear w-50" style="background-color: rgba(119, 119, 119, 0.407); color:black;">clear all</h6>
                                </div>
                                <form id="categoryproductfilterbsmall"  >
                                    @csrf
                                    <div class="col-lg-3 rounded" >
                                        <div class="accordion accordion-flush " id="accordionFlushExamplecatprod">
                                            @foreach ($category as $categories)

                                                <div class="accordion-item">
                                                    <h2 class="accordion-header" id="flush-headingOnecatprod">
                                                        <button class="accordion-button collapsed p-1 small" type="button" data-bs-toggle="collapse" data-bs-target="#cateprodfilt{{ $categories['id'] }}{{$categories['id']}}" aria-expanded="false" aria-controls="cateprodfilt{{ $categories['id'] }}{{$categories['id']}}">
                                                        <i class="fas fa-caret-down mr-2 small"></i> {{ $categories['categoryname'] }}
                                                        </button>
                                                    </h2>
                                                    <div id="cateprodfilt{{ $categories['id'] }}{{$categories['id']}}" class="accordion-collapse collapse" aria-labelledby="flush-headingOnecatprod" data-bs-parent="#accordionFlushExamplecatprod">
                                                        <div class="accordion-body ">

                                                            <div class="row ">

                                                                    @foreach ($categories['subcat'] as $sub)
                                                                        <div class="card shadow rounded m-1 col-2 p-1">
                                                                            <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                                                                                <input type="radio" class="btn-check" name="subcategory" id="{{ $sub->id }}small" value="{{ $sub->id }}" autocomplete="off">
                                                                                <label class="btn btn-outline-primary p-0" for="{{$sub->id }}small">
                                                                                    <div class="col-12">
                                                                                        <img src="{{ $sub->image}}" class="" style="width:100%; height:100%;"  alt="Sunset Over the Sea"/>
                                                                                    </div>

                                                                                </label>

                                                                            </div>

                                                                        </div>
                                                                    @endforeach

                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="col-lg-9">
                                            <div class="row ">
                                                <div class="col-lg-6 mt-3">
                                                    <div class="input-group">
                                                        <span class="input-group-text">Product Name</span>
                                                        <input type="text" name="productname" class="form-control form-control-sm" aria-label="">
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <div class="input-group">
                                                    <span class="input-group-text">Price</span>
                                                    <input type="number" name="minprice" aria-label="First name" class="form-control form-control-sm" placeholder="Min price" min="1" >
                                                        <p class="mx-2" style="color: black;">to</p>
                                                    <input type="number"  name="maxprice" aria-label="Last name" class="form-control form-control-sm" placeholder="Max price" min="1" >
                                                    </div>
                                                </div>

                                                <div class="col-md-6 mt-3 ">
                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="highlow" value="high" id="flexRadioDefault">
                                                    <label class="form-check-label" for="flexRadioDefault">
                                                    Highest to Lowest
                                                    </label>
                                                </div>

                                                <div class="form-check">
                                                    <input class="form-check-input" type="radio" name="highlow" value="low" id="flexRadioDefault2">
                                                    <label class="form-check-label" for="flexRadioDefault2">
                                                        Lowest to Highest
                                                    </label>
                                                </div>
                                                </div>

                                                <div class="col-md-6 mt-3 ">

                                                    <div class="form-check form-check-inline px-4" style="background-color:#cbd5e0 ; color:black;">
                                                        <input class="form-check-input" type="checkbox" name="latest" id="inlineCheckbox1" value="1">
                                                        <label class="form-check-label medium" for="inlineCheckbox1">Latest Product</label>
                                                    </div>
                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <h6 class="w-25 p-1 rounded khhh" style="background-color:#cbd5e0 ; color:black;">Brand</h6>

                                                    <div class="row ml-2">
                                                        <div class="list-group filterbrandss" id="">

                                                        </div>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <h6 class="w-75 p-1 rounded " style="background-color:#cbd5e0 ; color:black;">Percentage Discount</h6>

                                                    <div class="list-group">
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="50">
                                                            50% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="40">
                                                            40% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="30">
                                                            30% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="20">
                                                            20% and more
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="percentage" value="10">
                                                        10% and more
                                                        </label>
                                                    </div>

                                                </div>

                                                <div class="col-lg-6 mt-3 ">
                                                    <h6 class="w-75 p-1 rounded " style="background-color:#cbd5e0 ; color:black;">Product Rating</h6>

                                                    <div class="list-group">

                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="4">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                            & above
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="3">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                            & above
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="2">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                            <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                            & above
                                                        </label>
                                                        <label class="list-group-item small">
                                                            <input class="form-check-input me-1" type="radio" name="rating" value="1">
                                                            <i class="fa fa-star"  style="color:yellow ;" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>
                                                        <i class="fa fa-star"  style="color:rgb(141, 137, 137);" aria-hidden="true"></i>

                                                        & above
                                                        </label>
                                                    </div>

                                                </div>


                                            </div>
                                    </div>


                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal"><i class="fa fa-close" aria-hidden="true"></i></button>
                                <button type="submit" class="btn btn-outline-info btn-sm" data-bs-dismiss="modal">Apply<i class="fa-solid fa-arrow-up-wide-short" aria-hidden="true"></i></button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>















