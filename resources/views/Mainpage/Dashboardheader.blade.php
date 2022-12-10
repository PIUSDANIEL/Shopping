<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html lang="en">
<head>
  <meta charset="utf-8">

  <meta name="viewport" content="width=device-width, initial-scale=1">

  <meta name="csrf-token" content="{{ csrf_token() }}">

  <title>Flea market</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome Icons -->
  <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

    <!--jquery--->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js" integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>

  <link rel="stylesheet" href="{{ asset('css/market.css') }}">


   <!-- DataTables -->
   <link rel="stylesheet" href="{{ asset('../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css') }}">
   <link rel="stylesheet" href="{{ asset('../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css') }}">

   <!--Sweet alert---->
   <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

   <!-- Font Awesome -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet"/>
</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">

  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand " >
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>
      <li class="nav-item d-none d-sm-inline-block">
        <a href="{{ route('/') }}" class="nav-link">Home</a>
      </li>

      @if (Auth::guard('admin')->user())
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('admin.adminLogout') }}" class="ms-auto dropdown-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
            style="font-size:14px;">
                <p style="color: black;">
                    Logout
                <span class="badge  mt-1">
                <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                </span>

                </p>
            </a>

            <form id="logout-form" action="{{ route('admin.adminLogout') }}" method="Post">
                @csrf

            </form>

        </li>
      @endif

      @if (Auth::guard('seller')->user())
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('seller.sellerLogout') }}" class="ms-auto dropdown-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
            style="font-size:14px;">
                <p style="color: black;">
                    Logout
                <span class="badge  mt-1">
                <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                </span>

                </p>
            </a>

            <form id="logout-form" action="{{ route('seller.sellerLogout') }}" method="Post">
                @csrf

            </form>

        </li>
      @endif

      @if (Auth::guard('editor')->user())
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('editor.editorLogout') }}" class="ms-auto dropdown-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
            style="font-size:14px;">
                <p style="color: black;">
                    Logout
                <span class="badge  mt-1">
                <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                </span>

                </p>
            </a>

            <form id="logout-form" action="{{ route('editor.editorLogout') }}" method="Post">
                @csrf

            </form>

        </li>
      @endif

      @if (Auth::guard('web')->user())
        <li class="nav-item d-none d-sm-inline-block">
            <a href="{{ route('user.userLogout') }}" class="ms-auto dropdown-item nav-link" onclick="event.preventDefault(); document.getElementById('logout-form').submit();  "
            style="font-size:14px;">
                <p style="color: black;">
                    Logout
                <span class="badge  mt-1">
                <i class="fa fa-sign-out" style="color:black; font-size: small; " aria-hidden="true"></i>
                </span>

                </p>
            </a>

            <form id="logout-form" action="{{ route('user.userLogout') }}" method="Post">
                @csrf

            </form>

        </li>
      @endif
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      <!-- Navbar Search -->
      <li class="nav-item">
        <a class="nav-link" data-widget="navbar-search" href="#" role="button">
          <i class="fas fa-search"></i>
        </a>
        <div class="navbar-search-block">
          <form class="form-inline">
            <div class="input-group input-group-sm">
              <input class="form-control form-control-navbar" type="search" placeholder="Search" aria-label="Search">
              <div class="input-group-append">
                <button class="btn btn-navbar" type="submit">
                  <i class="fas fa-search"></i>
                </button>
                <button class="btn btn-navbar" type="button" data-widget="navbar-search">
                  <i class="fas fa-times"></i>
                </button>
              </div>
            </div>
          </form>
        </div>
      </li>

      <!-- Messages Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-comments"></i>
          <span class="badge badge-danger navbar-badge">3</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user1-128x128.jpg') }}" alt="User Avatar" class="img-size-50 mr-3 img-circle">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Brad Diesel
                  <span class="float-right text-sm text-danger"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">Call me whenever you can...</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user8-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  John Pierce
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">I got your message bro</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="{{ asset('dist/img/user3-128x128.jpg') }}" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  Nora Silvester
                  <span class="float-right text-sm text-warning"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm">The subject goes here</p>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i> 4 Hours Ago</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Messages</a>
        </div>
      </li>
      <!-- Notifications Dropdown Menu -->
      <li class="nav-item dropdown">
        <a class="nav-link" data-toggle="dropdown" href="#">
          <i class="far fa-bell"></i>
          <span class="badge badge-warning navbar-badge">15</span>
        </a>
        <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
          <span class="dropdown-header">15 Notifications</span>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-envelope mr-2"></i> 4 new messages
            <span class="float-right text-muted text-sm">3 mins</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-users mr-2"></i> 8 friend requests
            <span class="float-right text-muted text-sm">12 hours</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <i class="fas fa-file mr-2"></i> 3 new reports
            <span class="float-right text-muted text-sm">2 days</span>
          </a>
          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">See All Notifications</a>
        </div>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i>
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" data-widget="control-sidebar" data-slide="true" href="#" role="button">
          <i class="fas fa-th-large"></i>
        </a>
      </li>
    </ul>
  </nav>
  <!-- /.navbar -->

  <!-- Main Sidebar Container -->
  <aside class="main-sidebar bg-white elevation-4" >
    <!-- Brand Logo -->
    <a href="index3.html" class="brand-link">
      <img src="{{ asset('images/image.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
      <span class="brand-text font-weight-light">Flea market</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="{{ asset('dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
        </div>
        <div class="info">
          <a href="#" class="d-block">
            @if (Auth::guard('admin')->user())
            {{ Auth::guard('admin')->user()->firstname }}
            {{ Auth::guard('admin')->user()->lastname }}
          @endif

          @if (Auth::guard('seller')->user())
          {{ Auth::guard('seller')->user()->firstname }}
          {{ Auth::guard('seller')->user()->lastname }}
          @endif

          @if (Auth::guard('editor')->user())
            {{ Auth::guard('editor')->user()->firstname }}
            {{ Auth::guard('editor')->user()->lastname }}
          @endif

          @if (Auth::guard('web')->user())
             {{ Auth::guard('web')->user()->firstname }}
             {{ Auth::guard('web')->user()->lastname }}
          @endif
          </a>
        </div>
      </div>

      <!-- SidebarSearch Form
      <div class="form-inline">
        <div class="input-group" data-widget="sidebar-search">
          <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
          <div class="input-group-append">
            <button class="btn btn-sidebar">
              <i class="fas fa-search fa-fw"></i>
            </button>
          </div>
        </div>
      </div>
      --->
      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          <!---
          <li class="nav-item menu-open">
            <a href="#" class="nav-link active">
              <i class="nav-icon fas fa-tachometer-alt"></i>
              <p>
                Starter Pages
                <i class="right fas fa-angle-left"></i>
              </p>
            </a>
            <ul class="nav nav-treeview">
              <li class="nav-item">
                <a href="#" class="nav-link active">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Active Page</p>
                </a>
              </li>
              <li class="nav-item">
                <a href="#" class="nav-link">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Inactive Page</p>
                </a>
              </li>
            </ul>
          </li>
          <li class="nav-item">
            <a href="#" class="nav-link">
              <i class="nav-icon fas fa-th"></i>
              <p>
                Simple Link
                <span class="right badge badge-danger">New</span>
              </p>
            </a>
          </li>
          --->
          <!--add editor--->
          @if (Auth::guard('admin')->user())
                <li class="nav-item">
                    <a href="{{ route('admin.editorsreg') }}" class="nav-link text-dark" style="cursor:pointer;" >
                    <i class="fa fa-user-plus nav-icon " aria-hidden="true"></i>
                    <p>
                        Add editor
                    </p>
                    </a>
                </li>
          @endif

          @if (Auth::guard('admin')->user())
                <li class="nav-item">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-dark">
                    <i class="fa fa-dashboard nav-icon" aria-hidden="true"></i>
                    <p>
                    Dashboard

                    </p>
                    </a>
                </li>
          @endif

          @if (Auth::guard('admin')->user())
            <li class="nav-item">
                <a href="{{ route('admin.allproduct') }}" class="nav-link text-dark">
                <i class="fa fa-bolt nav-icon" aria-hidden="true"></i>
                <p>
                    Featured and Flash

                </p>
                </a>
            </li>
          @endif

          @if (Auth::guard('admin')->user())
            <li class="nav-item">
                <a href="{{ route('admin.categorysub') }}" class="nav-link text-dark" style="cursor:pointer;" >
                <i class="fa fa-list-alt nav-icon " aria-hidden="true"></i>

                <p>
                    Add Category
                </p>
                </a>
            </li>
          @endif

          @if (Auth::guard('admin')->user())
          <li class="nav-item">
              <a href="{{ route('admin.brand') }}" class="nav-link text-dark" style="cursor:pointer;" >
              <i class="fas fa-tags nav-icon " aria-hidden="true"></i>
              <p>
                 Brands
              </p>
              </a>
          </li>
        @endif

          @if (Auth::guard('seller')->user())
                <li class="nav-item">
                    <a href="{{ route('seller.dashboard') }}" class="nav-link text-dark">
                    <i class="fa fa-dashboard nav-icon" aria-hidden="true"></i>
                    <p>
                    Dashboard

                    </p>
                    </a>
                </li>
          @endif

          @if (Auth::guard('editor')->user())
                <li class="nav-item">
                    <a href="{{ route('editor.dashboard') }}" class="nav-link text-dark">
                    <i class="fa fa-dashboard nav-icon" aria-hidden="true"></i>
                    <p>
                    Dashboard
                    </p>
                    </a>
                </li>
          @endif

          @if (Auth::guard('editor')->user())
            <li class="nav-item">
                <a href="{{ route('editor.allproduct') }}" class="nav-link text-dark">
                <i class="fa fa-bolt nav-icon" aria-hidden="true"></i>
                <p>
                    Featured and Flash
                </p>
                </a>
            </li>


          @endif

          @if (Auth::guard('web')->user())
                <li class="nav-item">
                    <a href="{{ route('user.dashboard') }}" class="nav-link text-dark">
                    <i class="fa fa-dashboard nav-icon" aria-hidden="true"></i>
                    <p>
                    Dashboard

                    </p>
                    </a>
                </li>
          @endif




        </ul>
      </nav>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>
