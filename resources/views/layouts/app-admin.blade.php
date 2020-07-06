<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <title>Travel New Zeland</title>
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
     <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/0.8.1/cropper.css" />

    <script src="https://cdn.tiny.cloud/1/no-api-key/tinymce/5/tinymce.min.js" referrerpolicy="origin"></script>
  <script>tinymce.init({selector:'textarea'});</script>
      <style type="text/css">

      #tinymce p {
          padding: 0;
          margin: 1px 0;
      }
        nav#mainNav {background: #4a3c98; }

.page {
   margin: 1em auto;
   max-width: 768px;
   display: flex;
   align-items: flex-start;
   flex-wrap: wrap;
   height: 100%;
}

.box {
   padding: 0.5em;
   width: 100%;
   margin:0.5em;
}

.box-2 {
   padding: 0.5em;
   width: calc(100%/2 - 1em);
}

.options label,
.options input{
   width:4em;
   padding:0.5em 1em;
}
/*.btn{
   background:white;
   color:black;
   border:1px solid black;
   padding: 0.5em 1em;
   text-decoration:none;
   margin:0.8em 0.3em;
   display:inline-block;
   cursor:pointer;
}*/

.hide {
   display: none;
}

img {
   max-width: 100%;
}

      
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
                        <a class="dropdown-item" href="/admin/profile">{{ Auth::user()->first_name }}</a>
                        <a class="dropdown-item" href="/admin/profile">Edit Profile</a>
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
                  <a href="{{ route('properties_list') }}" class="list-group-item list-group-item-action">Properties</a>
                  <a href="{{ route('category_list') }}" class="list-group-item list-group-item-action">Categories</a>
                  <a href="{{ route('experience_list') }}" class="list-group-item list-group-item-action">Experience</a>
                  <a href="{{ route('questionaire_list') }}" class="list-group-item list-group-item-action">Questionaire</a>
           <a href="{{ route('travel_list') }}" class="list-group-item list-group-item-action">Travel Type</a>
                  <!-- <div class="dropdown">
                     <ul class="dropdown-menu">
                        <a href="/admin/accomodation/edit/1" class="list-group-item list-group-item-action">Accomodations</a>
                        <a href="/admin/highlight/edit/1" class="list-group-item list-group-item-action">Highlights</a>
                        <a href="/admin/itinerarie/edit/1" class="list-group-item list-group-item-action">Itineraries</a>
                    </ul>
                  </div> -->
                 <!--  <a href="/admin/highlights" class="list-group-item list-group-item-action">Highlights</a>
                  <a href="/admin/itineraries" class="list-group-item list-group-item-action">Itineraries</a> -->
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

      <script type="text/javascript">
         var activitiesCounter = 0;
         $(document).ready(function() {
          if(!$('#hiddenId').length) {

            $('.is_iti').hide();
          }
            $('#category').change(function() {
              if($(this).val() == '1') {
                $('.activities_area').show()  
              } else {
                $('.activities_area').hide()  
              }
              
              if($(this).val() == '3') {
                $('.is_not_iti').hide();
                $('.is_iti').show();
              } else {
                $('.is_not_iti').show();
                $('.is_iti').hide();
              }
            });
         // console.log($('#activitiesCounter').length, $('#activitiesCounter').val())
            if($('#activitiesCounter').length > 0) {
               activitiesCounter = $('#activitiesCounter').val();
            }
            $('#upload-image').hide();
            $('#upload-video').hide();
            //$('#addMoreBtn').hide();
            $('#media_type').change(function() {
               if($(this).val() == '1') {
                  $('#upload-image').show();
                  $('#upload-video').hide();
               } else {
                  $('#upload-image').hide();
                  $('#upload-video').show();
               }
            });

             $('#activities').change(function(){
               if($(this).val()) {
                 $('#addMoreBtn').show();
               } else {
                 $('#addMoreBtn').hide();
               }
             });

            $('#addMoreBtn').click(function(){
               activitiesCounter++;
               if($('#activitiesCounter').length > 0) {
                if($('#hiddenId').length) {
                  var el = $('#activities_selector' + (activitiesCounter - 2)).clone().prop('id', 'activities_selector' + activitiesCounter);
                  el.find('.media-preview' + (activitiesCounter - 2)).attr("class","media-preview"+activitiesCounter);
                } else {
                  var el = $('#activities_selector' + (activitiesCounter - 1)).clone().prop('id', 'activities_selector' + activitiesCounter);
                  el.find('.media-preview' + (activitiesCounter - 1)).attr("class","media-preview"+activitiesCounter);
                }
                  setTimeout(function(){
                     $(document).find('.media-preview' + activitiesCounter).remove();
                  },500);
               } else {
                  var el = $('#activities_selector').clone().prop('id', 'activities_selector' + activitiesCounter);
               }
               el.find("#firstLabl").attr("id","firstLabl"+activitiesCounter);
               el.find("#removeBtn").attr("data-id", activitiesCounter);
               el.find("#removeBtn").attr("id","removeBtn"+activitiesCounter);
               //console.log('activitiesCounter ', activitiesCounter)
               if(activitiesCounter == 1) {
                  $('#activities_selector').after(el);
               } else {
                if($('#hiddenId').length) {
                  $('#activities_selector' + (activitiesCounter - 2)).after(el);
                } else {
                  $('#activities_selector' + (activitiesCounter - 1)).after(el);
                }
               }
            });

            $(document).on('click', '.removeBtn', function() {
               var el = $('#activities_selector' + $(this).data('id')).remove();
               activitiesCounter--;
            });
         });

         function showAddMore(value) {
            if(value) {
              $('#addMoreBtn').show();
            } else {
              $('#addMoreBtn').hide();
            }
         }

         function selectMediaType(value) {
            if(value == 'video') {
               if(activitiesCounter == 0) {
                  $('#activities_selector .image-file').hide();
                  $('#activities_selector .vide-link').show();

                  $('#activities_selector .image-file').removeAttr('required');
                  $('#activities_selector .vide-link').attr('required', true);

               } else {
                  $('#activities_selector' + activitiesCounter + ' .image-file').hide();
                  $('#activities_selector' + activitiesCounter + ' .vide-link').show();

                  $('#activities_selector' + activitiesCounter + ' .image-file').removeAttr('required');
                  $('#activities_selector' + activitiesCounter + ' .vide-link').attr('required', true);
               }
            } else {

               if(activitiesCounter == 0) {
                  $('#activities_selector .image-file').show();
                  $('#activities_selector .vide-link').hide();

                  $('#activities_selector .image-file').attr('required', true);
                  $('#activities_selector .vide-link').removeAttr('required');

               } else {
                  $('#activities_selector' + activitiesCounter + ' .image-file').show();
                  $('#activities_selector' + activitiesCounter + ' .vide-link').hide();

                  $('#activities_selector' + activitiesCounter + ' .image-file').attr('required', true);
                  $('#activities_selector' + activitiesCounter + ' .vide-link').removeAttr('required');
               }
            }
         }

         $(document).on('change','.category', function(e) {
            var cat = $(this).val();
            if(cat != ''){
               $('#prop_form').submit();
            }
         });


         
         $(document).on('click','.delete-btn', function(e) {
           var propId = $(this).data('id');
           $('#id_property').val(propId);
           swal({
               title: "Are you sure?",
               text: "You will not be able to recover this file!",
               icon: "warning",
               buttons: [
                 'No, cancel it!',
                 'Yes, I am sure!'
               ],
               dangerMode: true,
             }).then(function(isConfirm) {
               if (isConfirm) {
                 swal({
                    title: 'Success!',
                   text: 'Data deleted successfully!',
                   icon: 'success'
                 }).then(function() {
                   $('#del-form').submit();
                 });
               } else {
                 swal("Cancelled", "Your file is safe :)", "error");
               }
             })
         });
      </script>
   </body>
</html>