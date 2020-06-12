<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Teacher parent connect</title>
      <meta name="csrf-token" content="{{ csrf_token() }}">
      <!-- Bootstrap core CSS -->
      <link href="{{asset('vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
      <!-- Custom fonts for this template -->
      <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:200,200i,300,300i,400,400i,600,600i,700,700i,900,900i" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css?family=Merriweather:300,300i,400,400i,700,700i,900,900i" rel="stylesheet">
      <link href="{{asset('vendor/fontawesome-free/css/all.min.css')}}" rel="stylesheet" type="text/css">

            <link rel="shortcut icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">
      <link rel="icon" href="{{asset('img/favicon.ico')}}" type="image/x-icon">  
      
      <!-- Custom styles for this template -->
      <link href="{{asset('css/newthe.css')}}" rel="stylesheet">
      <link rel="stylesheet" href="{{asset('css/croppie.css')}}">
      <link href="{{asset('css/sweetalert.css')}}" type="text/css" rel="stylesheet" />
      <link href="{{asset('css/fullcalendar/jquery-ui.min.css')}}" type="text/css" rel="stylesheet" />
      <link href="{{asset('css/fullcalendar/fullcalendar.min.css')}}" type="text/css" rel="stylesheet" />
      <link href="{{asset('js/datatables/dataTables.bootstrap4.min.css')}}" rel="stylesheet">
      <style type="text/css">
        nav#mainNav {background: #4a3c98; }
      </style>
   </head>
   <body>
      <div class="" id="wrapper">
         <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container-fluid">
               <a class="navbar-brand js-scroll-trigger logomain" href="/"><img src="{{ asset('img/mainlogo.png')}}" ></a>
               <button class="navbar-toggler navbar-toggler-right buttonmenu" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                  <i class="fas fa-bars"></i>
               </button>
               <div class="loginlogout">
                  <div class="dropdown">
                     <button class="btn btn-secondary btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <p>{{ Auth::user()->name }}<p> <span><img src="{{asset('uploads/profiles')}}/{{Auth::user()->profile_pic}}" onerror="this.onerror=null;this.src='{{asset("uploads/profiles/l60Hf.png")}}'" class="profile-img"></span>
                     </button> 
                     <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                        <a class="dropdown-item" href="">{{ Auth::user()->first_name }}</a>
                        <a class="dropdown-item" href="">Edit Profile</a>
                        <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}</a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                     </div>
                  </div>
               </div>
            </div>
         </nav>
         <div id="page-content-wrapper" class="d-flex">
            <div class="bl" id="sidebar-wrapper">
               <div class="list-group list-group-flush">
                  @if(Auth::check())
                     @if(Auth::user()->user_type == 'admin')
                        <a href="" class="list-group-item list-group-item-action">Dashboard</a>
                     @endif
                  @endif
                  <a href="/admin/properties" class="list-group-item list-group-item-action">Properties</a>
                  <a href="/admin/accomodations" class="list-group-item list-group-item-action">Accomodations</a>
                  <a href="/admin/highlights" class="list-group-item list-group-item-action">Highlights</a>
                  <a href="/admin/itineraries" class="list-group-item list-group-item-action">Itineraries</a>
               </div>
            </div>

            @yield('content')
         </div>
      </div>
      <!-- Bootstrap core JavaScript -->
      <script src="{{ asset('vendor/jquery/jquery.min.js')}}"></script>
      <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
      <script src="{{asset('js/datatables/jquery.dataTables.min.js')}}"></script>
      <script src="{{asset('js/datatables/dataTables.bootstrap4.min.js')}}"></script>
      <!-- Custom scripts for this template -->
      <script src="{{ asset('js/coming-soon.min.js')}}"></script>
      <script src="{{asset('js/croppie.js')}}"></script>
      <script src="{{asset('js/moment.min.js')}}"></script>
      <script src="{{asset('js/admin/custom.js')}}"></script>
      <script src="{{asset('js/sweetalert.min.js')}}"></script>
   </body>
</html>