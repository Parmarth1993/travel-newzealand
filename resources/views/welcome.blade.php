<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0,user-scalable=0"/>
      <meta name="description" content="">
      <meta name="author" content="">
      <title> Travel New Zealand </title>
      <!-- Bootstrap core CSS -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- <link href="css/boot-carousel.css" rel="stylesheet"> -->
      <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/main-style.css" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
      
     <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>

   <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
      
      <style type="text/css">
         .carousel-item {
           height: 40vh;
           min-height: 350px;
           background: no-repeat center center scroll;
           -webkit-background-size: auto;
           -moz-background-size: auto;
           -o-background-size: auto;
           background-size: auto;
         }

      </style>
   </head>
   <body>
      <a id="top"></a>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
         <div class="container">
            <a class="navbar-brand" href="#"></a>  
            <div class="nablast">
               <ul>
                  <li class="nav-item lastone">
                     <a class="nav-link searchicon" href="javascript:void(0)"></a>
                  </li>
                  <li class="nav-item last">
                     <a class="nav-link" href="#">GET IN TOUCH</a>
                  </li>
               </ul>
            </div>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">            
            <i class="fas fa-bars"></i>
            </button>          
            <div class="collapse navbar-collapse" id="navbarResponsive">
               <ul class="navbar-nav ml-auto">
                  <li class="nav-item">
                     <a class="nav-link" href="#">Experiences</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Accommodations</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Itineraries</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-nowrap" href="#">Not Just New Zealand</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link text-nowrap" href="#">Why Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">FAQ</a>
                  </li>
                  <li class="nav-item lastone inhome">
                     <a class="nav-link searchicon" href="javascript:void(0)"></a>
                  </li>
                  <li class="nav-item last inhome">
                     <a class="nav-link text-nowrap" href="#">GET IN TOUCH</a>
                  </li>
               </ul>
            </div>
         </div>
      </nav>
      <div class="searchdiv">
         <div class="searchmain">         
            <input type="text" name="" placeholder="Search">
            <input type="submit" name="" class="btnsearch" value="">
            <a href="javascript:void(0)" class="closebsearch"></a>
         </div>
      </div>
      <!-- Page Header -->
      <header class="masthead" style="background-image: url('img/home-bg.jpg')">
         <div class="overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-10 mx-auto">
                  <div class="site-heading">
                     <h1>
                        <img src="img/flying.png" class="flyingicon">
                        <span class="start">Start</span>Exploring
                     </h1>
                     <span class="subheading">Luxury travel through New Zealand</span>
                     <a href="#" class="btn btn-secondry weknowbtn">We know the best places</a>
                  </div>
               </div>
            </div>
         </div>
      </header>
      <!-- Main Content -->
      <?php //echo "<pre>";print_r($experiences);?>
      <section class="tabviewnab">
         <div class="nabtab">
            <ul class="nav nav-tabs besttab">
               @foreach($categories as $key => $category)
                  <li>
                     <a data-toggle="tab" href="#{{strtolower($category->name)}}" class="home-page-cat @if($key == 0) active @endif">{{$category->name}} <span>{{$category->description}}</span>
                     </a>
                  </li>
               @endforeach
               <!-- <li><a data-toggle="tab" href="#accomodations" class="home-page-cat active">Accomodations <span><?php //echo $accdesc;?></span></a></li>
               <li><a data-toggle="tab" href="#highlights" class="home-page-cat">Highlights <span><?php //echo $highdesc;?></span></a></li>
               <li><a data-toggle="tab" href="#itineraries" class="home-page-cat">Itineraries <span><?php //echo $itdesc;?></span></a></li> -->
            </ul>
            <div class="tab-content maintabview">
               <div id="accomodations" class="tab-pane in active">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-lg-4 col-md-12 mapform">
                           <div class="map-newzealand">
                              <!-- <p class="countryname">Catlins, Otago</p>
                              <span class="iconmake"></span>  -->
                              <!-- <img src="img/news-land-img.png"> -->
                              <div id="map-canvas"></div>
                           </div>
                        </div>
                        <div class="col-lg-8 col-md-12 tabform">
                           <div class="alltabview">
                              <div class="alltopview-logo">
                                 <img id="acc_logo" src="img/minarat-logo.png" height="50" width="100">

                                  <img id="acc_logo" class="ml-auto" src="img/log-img.jpg" height="50" width="100">
                              </div>
                              <div class="upperparttab">
                                 <ul class="nav nav-tabs stationnab" id="acco_activities">
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Helicopter" class="helicopter active"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Hili Area" class="hiliarea"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Fishing" class="fishing"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Food" class="food"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Army" class="army"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Religion" class="religion"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Videos" class="videos"></a></li>
                                 </ul>
                                 <div class="stationviewpart">
                                    <div id="myCarousel" class="carousel slide" data-ride="carousel">
                                       <!--  <ol class="carousel-indicators" id="ol_acco"></ol> -->
                                        <div id="carouse_acco" class="carousel-inner"></div>
                                        <!-- Left and right controls -->
                                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-angle-left left-acc"></i></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-angle-right right-acc"></i></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="bottomparttab">
                                 <ul class="nav nav-tabs adventuretab">
                                    <li><a data-toggle="tab" class="active" href="#about_desc">About</a></li>
                                    <li><a data-toggle="tab" href="#highlights_desc">Highlights</a></li>
                                 </ul>
                                 <div class="tab-content adventureview">
                                    <div class="tab-pane in active" id="about_desc">
                                       <p id="about_accom"></p>
                                       <div class="logosbtn">
                                          <a href="" class="btn btn-primary">Enquiry Now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="highlights_desc">
                                       <p id="high_accom"></p>
                                       <div class="logosbtn">
                                          <a href="" class="btn btn-primary">Enquiry now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="highlights" class="tab-pane">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-lg-4 col-md-12 mapform">
                           <div class="map-newzealand">
                              <div id="map-canvas-highlights"></div>
                              <!-- <p class="countryname">Catlins, Otago1</p>
                              <span class="iconmake"></span> 
                              <img src="img/news-land-img.png"> -->
                           </div>
                        </div>
                        <div class="col-lg-8 col-md-12 tabform">
                           <div class="alltabview">
                              <div class="alltopview-logo">
                                 <img id="high_logo" src="img/minarat-logo.png" height="50" width="100">
                              </div>
                              <div class="upperparttab">
                                 <ul class="nav nav-tabs stationnab" id="high_activities">
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Helicopter" class="helicopter active"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Hili Area" class="hiliarea"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Fishing" class="fishing"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Food" class="food"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Army" class="army"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Religion" class="religion"></a></li>
                                    <li><a href="javascript:void(0)" data-tool="tooltip" data-placement="right" title="Videos" class="videos"></a></li>
                                 </ul>
                                 <div class="stationviewpart">
                                    <div id="myCarouse2" class="carousel slide" data-ride="carousel">
                                        <!-- <ol class="carousel-indicators" id="ol_high"></ol> -->
                                        <div id="carouse_high" class="carousel-inner"></div>
                                          <!-- Left and right controls -->
                                      <a class="left carousel-control" href="#myCarouse2" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-angle-left left-high"></i></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#myCarouse2" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-angle-right right-high"></i></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="bottomparttab">
                                 <ul class="nav nav-tabs adventuretab">
                                    <li><a data-toggle="tab" class="active" href="#about_highdesc">About</a></li>
                                    <li><a data-toggle="tab" href="#highlights_highdesc">Highlights</a></li>
                                 </ul>
                                 <div class="tab-content adventureview">
                                    <div  class="tab-pane in active" id="about_highdesc">
                                       <p id="about_highs"></p>
                                       <div class="logosbtn">
                                          <a href="" class="btn btn-primary">Enquiry now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="highlights_highdesc">
                                       <p id="high_highs"></p>
                                       <div class="logosbtn">
                                          <a href="" class="btn btn-primary">Enquiry now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               <div id="itineraries" class="tab-pane">
                  <div class="container-fluid">
                     <div class="row">
                        <div class="col-lg-4 col-md-12 mapform">
                           <div class="map-newzealand">
                              <!-- <p class="countryname">Catlins, Otago2</p>
                              <span class="iconmake"></span> 
                              <img src="img/news-land-img.png"> -->
                              <div id="map-canvas-itineraries"></div>
                           </div>
                        </div>
                        <div class="col-lg-8 col-md-12 tabform">
                           <div class="alltabview">
                              <div class="alltopview-logo">
                                 <img id="iti_logo" src="img/minarat-logo.png" height="50" width="100">
                              </div>
                              <div class="upperparttab">
                                 <ul class="nav nav-tabs stationnab" id="iti_activities">
                                    <li><a data-toggle="tab" href="#stationview-1" data-tool="tooltip" data-placement="right" title="Helicopter" class="helicopter active"></a></li>
                                    <li><a data-toggle="tab" href="#stationview-2" data-tool="tooltip" data-placement="right" title="Hili Area" class="hiliarea"></a></li>
                                    <li><a data-toggle="tab" href="#stationview-3" data-tool="tooltip" data-placement="right" title="Fishing" class="fishing"></a></li>
                                    <li><a data-toggle="tab" href="#stationview-4" data-tool="tooltip" data-placement="right" title="Food" class="food"></a></li>
                                    <li><a data-toggle="tab" href="#stationview-5" data-tool="tooltip" data-placement="right" title="Army" class="army"></a></li>
                                    <li><a data-toggle="tab" href="#stationview-6" data-tool="tooltip" data-placement="right" title="Religion" class="religion"></a></li>
                                    <li><a data-toggle="tab" href="#stationview-7" data-tool="tooltip" data-placement="right" title="Videos" class="videos"></a></li>
                                 </ul>
                                  <div class="stationviewpart">
                                    <div id="myCarouse3" class="carousel slide" data-interval="false">
                                        <!-- <ol class="carousel-indicators" id="ol_iti"></ol> -->
                                        <div class="carousel-inner" id="carouse_iti"></div>
                              
                                       <!-- Left and right controls -->
                                      <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                                        <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-angle-left left-iti"></i></span>
                                        <span class="sr-only">Previous</span>
                                      </a>
                                      <a class="right carousel-control" href="#myCarousel" data-slide="next">
                                        <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-angle-right right-iti"></i></span>
                                        <span class="sr-only">Next</span>
                                      </a>
                                    </div>
                                 </div>
                              </div>
                              <div class="bottomparttab">
                                 <ul class="nav nav-tabs adventuretab">
                                    <li><a data-toggle="tab" class="active" href="#about_itdesc">About</a></li>
                                    <li><a data-toggle="tab" href="#highlights_itdesc">Highlights</a></li>
                                 </ul>
                                 <div class="tab-content adventureview">
                                    <div  class="tab-pane in active" id="about_itdesc">
                                       <p id="iti_about"></p>
                                       <div class="logosbtn">
                                          <a href="" class="btn btn-primary">Enquiry now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="highlights_itdesc">
                                       <p id="iti_highs"></p>
                                       <div class="logosbtn">
                                          <a href="" class="btn btn-primary">Enquiry now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
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
      </section>
      <section class="newsland-slider">
         <div class="container-fluid">
            <div class="row">
               <div class="col-lg-12">
                  <div class="titlemid">
                     <h3 class=""><span>New Zealand</span>Experiences</h3>
                     <a href="" class="viewall">View All Experiences ></a>
                  </div>
               </div>
            </div>
            <div class="row">
               <div class="col-lg-12 fcright">
                  <div class="owl-carousel owl-theme">
                     <?php foreach ($experiences as $key => $value) {
                        # code...
                     ?>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4><?php echo $value->title ;?></h4>
                           <a href=""> <img src="uploads/experience/<?php echo $value->image ;?>"></a>
                        </div>
                        <p><?php echo $value->description ;?></p>
                       
                     </div>
                     <?php } ?>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <section class="we-banner">
         <div class="container">
            <div class="row">
               <div class="col-lg-6 col-md-6">
                  <h2 class="we"><span>We Specialize in</span>
                     Luxury travel
                     <span class="text-right"> to New Zealand</span>
                  </h2>
               </div>
               <div class="col-lg-6 col-md-6">
                  <div class="wetxt">
                     <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                     <a href="" class="btn btn-primary learnb">Learn more</a>
                  </div>
               </div>
            </div>
         </div>
      </section>
      <!-- Footer -->
      <footer>
         <div class="container">
            <div class="row">
               <div class="col-lg-3 col-md-6 fot">
                  <img src="img/footer-logo.png">
               </div>
               <div class="col-lg-3 col-md-6 col-6 fot">
                  <h6>Experiences/Types of Trips</h6>
                  <ul>
                     <li>
                        <a href="">Cruises</a>
                     </li>
                     <li>
                        <a href="">Guided Coach tours</a>
                     </li>
                     <li>
                        <a href="">Golf</a>
                     </li>
                     <li>
                        <a href="">Food & Wine</a>
                     </li>
                     <li>
                        <a href="">Multiday Hiking</a>
                     </li>
                     <li>
                        <a href="">Multiday Cycling</a>
                     </li>
                     <li>
                        <a href="">Heli Skiing/ Snow Sports</a>
                     </li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 col-6 fot">
                  <h6>Types of Accommodation</h6>
                  <ul>
                     <li>
                        <a href="">Luxury Lodges</a>
                     </li>
                     <li>
                        <a href="">Bed & Breakfasts</a>
                     </li>
                     <li>
                        <a href="">Hotels</a>
                     </li>
                     <li>
                        <a href="">Resorts</a>
                     </li>
                     <li>
                        <a href="">Farm Stays</a>
                     </li>
                     <li>
                        <a href="">Holiday Homes</a>
                     </li>
                  </ul>
               </div>
               <div class="col-lg-3 col-md-6 fot text-right">
                  <div class="footerlogos">
                     <img src="img/fotlogo.png" class="mb-4">
                     <img src="img/fotlogo1.png">
                  </div>
               </div>
            </div>
            <div class="row mt-5">
               <div class="col-lg-4 col-md-12 fottrack">
                  <ul class="list-inline socialmedia">
                     <li class="list-inline-item">
                        <a href="#">
                        <span class="fa-stack fa-lg">                       
                        <i class="fab fa-facebook-f fa-stack-1x"></i>
                        </span>
                        </a>
                     </li>
                     <li class="list-inline-item">
                        <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fab fa-instagram fa-stack-1x "></i>
                        </span>
                        </a>
                     </li>
                     <li class="list-inline-item">
                        <a href="#">
                        <span class="fa-stack fa-lg">
                        <i class="fab fa-twitter fa-stack-1x"></i>
                        </span>
                        </a>
                     </li>
                  </ul>
               </div>
               <div class="col-lg-4 col-md-12 fot fottrack">
                  © 2020 Travel New Zealand. All Rights Reserved. 
               </div>
               <div class="col-lg-4 col-md-12 fot fottrack">
                  <img src="img/fotlogo2.png">
               </div>
            </div>
         </div>
         <a href="#top" class="anchorLink"></a>
      </footer>
      <!-- Bootstrap core JavaScript -->
      <!-- Modal -->
      <div id="booknowpopup" class="modal">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Book Now</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <form>
                    <div class="form-group">
                      <label for="name">Name</label>
                        <input type="text" class="form-control" id="name" placeholder="Enter Name">  
                    </div>
                    <div class="form-group">
                      <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Enter Email">  
                    </div>
                    
                    <button type="submit" class="btn btn-primary">Submit</button>
                  </form>
               </div>
            </div>
         </div>
      </div>
      <!-- <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script> -->
     

     <script src="js/jquery.min.js"></script>

      <script src="js/bootstrap.min.js"></script>

      <script src="js/mainscript.js"></script>
      <!-- Custom scripts for this template -->
      <script src="js/owl.carousel.js"></script> 
      
     <script src="https://code.jquery.com/jquery-3.1.0.js"></script>
      
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
      
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
      
      <script src="https://cdn.linearicons.com/free/1.0.0/svgembedder.min.js"></script>
      <script type="text/javascript">
         if (window.matchMedia('(max-width: 480px)').matches)
            {
              /* $('.owl-carousel').owlCarousel({
               stagePadding: 0,
               loop:true,
               margin:10,
               nav:true,
               responsive:{
                  0:{
                      items:1
                  },
                  540:{
                      items:2
                  },
                  900:{
                      items:3
                  },
                  1000:{
                      items:3
                  }
               }
            });*/
         }
      </script>
      <script type="text/javascript">
         /*$('.owl-carousel').owlCarousel({
           stagePadding: 100,
           loop:true,
           margin:10,
           nav:true,
           responsive:{
                 320:{
                     items:1
                 },
                 400:{
                     items:1
                 },
                 900:{
                     items:3
                 },
                 1000:{
                     items:3
                 }
               }
            });*/      
      </script>
      <script>
         $(document).ready(function(){
           $('[data-tool="tooltip"]').tooltip();
           $('.book').click(function(){
              $('#booknowpopup').modal('show');
              $('.in').css('opacity','0.9');
           });
           $('.home-page-cat').click(function(){
            $('.home-page-cat').removeClass("active");
            $(this).addClass("active");
           });
         });
      </script>
      <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlxYBIjisvG84Q8mQo8RHWZqXJBUibKk">
    </script>
    <script>

      //function initMap() {
      setTimeout(function(){
        var accomodationsArray = <?php echo json_encode($accomodations); ?>;
        var highlightsArray = <?php echo json_encode($highlights); ?>;
        var itinerariesArray = <?php echo json_encode($itineraries); ?>;

        var auck = {lat: -41.2864603, lng: 174.776236};
        //map 1
        var map = new google.maps.Map(document.getElementById('map-canvas'), {
          zoom: 5,
          center: auck,
          fullscreenControl: false,
          backgroundColor: '#FFF',
          minzoom: 5,
          maxzoom: 15,
          options: {
             gestureHandling: 'greedy'
         },
         disableDefaultUI: true,
          styles: [
            {
               featureType: "all",
               elementType: "labels",
               stylers: [{ visibility: "off" }]
            },
            {
               elementType: 'geometry', 
               stylers: [{color: '#000000'}]
            },
            {
               featureType: "water",
               elementType: "geometry",
               stylers: [
                 { invert_lightness: true },
                 { hue: "#ffffff" },
                 { saturation: -100 },
                 { lightness: 100 } /* generates "white" color */
               ]
            }]
        });
         var counter=0;
         var classact = '';
         if(accomodationsArray.length) {
            $('#acco_activities li a').css('display','none');
            for (var act in accomodationsArray[0].activities){

               if(counter === 0){
                  classact = 'active';
               }else{
                  classact = '';
               }

               var actname = accomodationsArray[0].activities[act].name.toLowerCase();
               actname = actname.replace(/ /g,'')
                     //console.log(actname);
               $('.upperparttab #acco_activities li a.'+actname).css('display','block');

               $('#ol_acco').append('<li data-target="#myCarousel" data-slide-to="'+ counter +'" class="'+ classact +'"></li>');               

               if(accomodationsArray[0].activities[act].type == 'image') {
                  $('#carouse_acco.carousel-inner').append('<div data-value="'+actname+'" class="item '+classact+' '+actname+' "><img src="uploads/properties/'+accomodationsArray[0].activities[act].media+'" alt="Image" type="'+ accomodationsArray[0].activities[act].type +'"></div>');
               } else {
                  $('#carouse_acco.carousel-inner').append('<div data-value="'+actname+'" class="item '+classact+' '+actname+' "><iframe src="'+accomodationsArray[0].activities[act].media+'" alt="video" type="'+ accomodationsArray[0].activities[act].type +'"></div>');
               }

               counter++;
            }
            //console.log(accomodationsArray);
            for(var i = 0; i < accomodationsArray.length ; i++) {

               //place marker
               if(accomodationsArray[i].address && accomodationsArray[i].address != '' && accomodationsArray[i].address != null) { 

                  $('#about_accom').text(accomodationsArray[0].about);
                  $('#high_accom').text(accomodationsArray[0].highlights);
                  $('#acc_logo').attr('src','uploads/properties/'+accomodationsArray[0].logo);
                 
                 var infoWindow = new google.maps.InfoWindow();

                 var data = accomodationsArray[i];
                 var latlong = {lat: parseFloat(accomodationsArray[i].location.lat), lng: parseFloat(accomodationsArray[i].location.long)};

                 if(accomodationsArray[i].type === 'Premium'){
                  var marker = new google.maps.Marker({
                   position: latlong,
                   map: map,
                   icon: 'https://www.staging.travelnewzealand.com/img/blue-dot.png',
                   title: accomodationsArray[i].name
                  });
                 }
                 else{
                  var marker = new google.maps.Marker({
                   position: latlong,
                   map: map,
                   icon: 'https://www.staging.travelnewzealand.com/img/red-dot.png',
                   title: accomodationsArray[i].name
                  });
                 }      
                 

                 //Attach click event to the marker.
                 (function (marker, data) {
                     google.maps.event.addListener(marker, "mouseover", function (e) {
                         infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                         infoWindow.open(map, marker);
                     });
                     google.maps.event.addListener(marker, "mouseout", function (e) {
                         infoWindow.close();
                     });
                     google.maps.event.addListener(marker, "click", function (e) {
                        $('#carouse_acco.carousel-inner').html('');
                        $('#ol_acco').html('');
                         //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                         infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                         infoWindow.open(map, marker);
                         $('#acco_activities li a').css('display','none');
                         //$('.carousel-inner').html('');
                         $('#about_accom').text(data.about);
                         $('#high_accom').text(data.highlights);
                         $('#acc_logo').attr('src','uploads/properties/'+data.logo);
                         var counterdata=0;
                         var classactdata = '';
                         for (var actdata in data.activities){
                           if(counterdata === 0){
                              classactdata = 'active';
                           }else{
                              classactdata = '';
                           }
                           var actnamedata = data.activities[actdata].name.toLowerCase();
                           actnamedata = actnamedata.replace(/ /g,'');

                           $('#ol_acco').append('<li data-target="#myCarousel" data-slide-to="'+ counterdata +'" class="'+ classact +'"></li>'); 

                           //console.log(actnamedata);
                           $('.upperparttab #acco_activities li a.'+actnamedata).css('display','block');
                           if(data.activities[actdata].type == 'image') {
                              $('#carouse_acco.carousel-inner').append('<div data-value="'+actnamedata+'" class="item '+classactdata+' '+actnamedata+' "><img src="uploads/properties/'+data.activities[actdata].media+'" alt="Image" type="'+ data.activities[actdata].type +'"></div>');
                           } else {
                              $('#carouse_acco.carousel-inner').append('<div data-value="'+actnamedata+'" class="item '+classactdata+' '+actnamedata+' "><iframe src="'+data.activities[actdata].media+'" alt="video" type="'+ data.activities[actdata].type +'"></div>');
                           }
                           counterdata++;
                         }
                     });
                 })(marker, data);
               }
            }
         }
       

      //map 2
      var map = new google.maps.Map(document.getElementById('map-canvas-highlights'), {
          zoom: 5,
          center: auck,
          fullscreenControl: false,
          backgroundColor: '#FFF',
          minzoom: 5,
          maxzoom: 15,
        disableDefaultUI: true,
          styles: [
            {
               featureType: "all",
               elementType: "labels",
               stylers: [{ visibility: "off" }]
            },
            {
               elementType: 'geometry', 
               stylers: [{color: '#000000'}]
            },
            {
               featureType: "water",
               elementType: "geometry",
               stylers: [
                 { invert_lightness: true },
                 { hue: "#ffffff" },
                 { saturation: -100 },
                 { lightness: 100 } /* generates "white" color */
               ]
            }]
      });

      var counter_high=0;
      var classact_high = '';
      if(highlightsArray.length) {
         $('#high_activities li a').css('display','none');
         for (var acthigh in highlightsArray[0].activities){
            var actnamehigh = highlightsArray[0].activities[acthigh].name.toLowerCase();
            actnamehigh = actnamehigh.replace(/ /g,'')
                  //console.log(actnamehigh);
            if(counter_high === 0){
               classact_high = 'active';
            }else{
               classact_high = '';
            }

            var actname_high = highlightsArray[0].activities[acthigh].name.toLowerCase();
            actname_high = actname_high.replace(/ /g,'')
                  //console.log(actname_high);
            $('.upperparttab #high_activities li a.'+actname_high).css('display','block');

            $('#ol_high').append('<li data-target="#myCarouse2" data-slide-to="'+ counter_high +'" class="'+ classact_high +'"></li>');

            if(highlightsArray[0].activities[acthigh].type == 'image') {
               $('#carouse_high.carousel-inner').append('<div data-value="'+actname_high+'" class="item '+classact_high+' '+actname_high+' "><img src="uploads/properties/'+highlightsArray[0].activities[acthigh].media+'" alt="Image" type="'+ highlightsArray[0].activities[acthigh].type +'"></div>');
            } else {
               $('#carouse_high.carousel-inner').append('<div data-value="'+actname_high+'" class="item '+classact_high+' '+actname_high+' "><iframe src="'+highlightsArray[0].activities[acthigh].media+'" alt="video" type="'+ highlightsArray[0].activities[acthigh].type +'"></div>');
            }

               counter_high++;
         }
         for(var i = 0; i < highlightsArray.length ; i++) {

            //place marker
            if(highlightsArray[i].address && highlightsArray[i].address != '' && highlightsArray[i].address != null) { 

               $('#about_highs').text(highlightsArray[0].about);
               $('#high_highs').text(highlightsArray[0].highlights);
               $('#high_logo').attr('src','uploads/properties/'+highlightsArray[0].logo);
              
              var infoWindow = new google.maps.InfoWindow();

              var data = highlightsArray[i];
              var latlong = {lat: parseFloat(highlightsArray[i].location.lat), lng: parseFloat(highlightsArray[i].location.long)};      
              var marker = new google.maps.Marker({
                position: latlong,
                map: map,
                //icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+ 35,
                title: highlightsArray[i].name
              });

              //Attach click event to the marker.
              (function (marker, data) {
                  google.maps.event.addListener(marker, "mouseover", function (e) {
                         infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                         infoWindow.open(map, marker);
                  });
                  google.maps.event.addListener(marker, "mouseout", function (e) {
                         infoWindow.close();
                  });
                  google.maps.event.addListener(marker, "click", function (e) {
                     $('#carouse_high.carousel-inner').html('');
                     $('#ol_high').html('');
                      //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                      infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                      infoWindow.open(map, marker);
                      $('#high_activities li a').css('display','none');
                      $('#about_highs').text(data.about);
                      $('#high_highs').text(data.highlights);
                      $('#high_logo').attr('src','uploads/properties/'+data.logo);
                      var counterdata=0;
                      var classactdata = '';
                      for (var actdata in data.activities){
                      //console.log('data.activities ', data.activities[actdata])
                        if(counterdata === 0){
                           classactdata = 'active';
                        }else{
                           classactdata = '';
                        }
                        var actnamedata = data.activities[actdata].name.toLowerCase();
                        actnamedata = actnamedata.replace(/ /g,'')
                        //console.log(actnamedata);
                        $('.upperparttab #high_activities li a.'+actnamedata).css('display','block');

                        $('#ol_high').append('<li data-target="#myCarouse2" data-slide-to="'+ counterdata +'" class="'+ classactdata +'"></li>');

                        if(data.activities[actdata].type == 'image') {
                           $('#carouse_high.carousel-inner').append('<div data-value="'+actnamedata+'"  class="item '+classactdata+' '+actnamedata+' "><img src="uploads/properties/'+data.activities[actdata].media+'" alt="Image"></div>');
                        } else {
                            $('#carouse_high.carousel-inner').append('<div data-value="'+actnamedata+'"  class="item '+classactdata+' '+actnamedata+' "><iframe src="'+data.activities[actdata].media+'" alt="video" type="'+ data.activities[actdata].type +'"></div>');
                        }
                        counterdata++;
                      }
                  });
              })(marker, data);
            }
        }
      }
        //map 3

        var map = new google.maps.Map(document.getElementById('map-canvas-itineraries'), {
          zoom: 5,
          center: auck,
          fullscreenControl: false,
          backgroundColor: '#FFF',
          minzoom: 5,
          maxzoom: 15,
        disableDefaultUI: true,
          styles: [
            {
               featureType: "all",
               elementType: "labels",
               stylers: [{ visibility: "off" }]
            },
            {
               elementType: 'geometry', 
               stylers: [{color: '#000000'}]
            },
            {
               featureType: "water",
               elementType: "geometry",
               stylers: [
                 { invert_lightness: true },
                 { hue: "#ffffff" },
                 { saturation: -100 },
                 { lightness: 100 } /* generates "white" color */
               ]
            }]
        });
         var counter_iti=0;
         var classact_iti = '';
         if(itinerariesArray.length) {
            $('#iti_activities li a').css('display','none');
            for (var act in itinerariesArray[0].activities){

               if(counter_iti === 0){
                  classact_iti = 'active';
               }else{
                  classact_iti = '';
               }

               var actname_iti = itinerariesArray[0].activities[act].name.toLowerCase();
               actname_iti = actname_iti.replace(/ /g,'')
                     //console.log(actname_iti);
               $('.upperparttab #iti_activities li a.'+actname_iti).css('display','block');

               $('#ol_iti').append('<li data-target="#myCarouse3" data-slide-to="'+ counter_iti +'" class="'+ classact_iti +'"></li>');

               if(itinerariesArray[0].activities[act].type == 'image') {
                  $('#carouse_iti.carousel-inner').append('<div data-value="'+actname_iti+'" class="carousel-item '+classact_iti+' '+actname_iti+' "><img src="uploads/properties/'+itinerariesArray[0].activities[act].media+'" alt="Image" type="'+ itinerariesArray[0].activities[act].type +'"></div>');
               } else {
                  $('#carouse_iti.carousel-inner').append('<div data-value="'+actname_iti+'" class="carousel-item '+classact_iti+' '+actname_iti+' "><iframe src="'+itinerariesArray[0].activities[act].media+'" alt="video" type="'+ itinerariesArray[0].activities[act].type +'"></div>');
               }

               counter_iti++;
            }

            for(var i = 0; i < itinerariesArray.length ; i++) {

               //place marker
               if(itinerariesArray[i].address && itinerariesArray[i].address != '' && itinerariesArray[i].address != null) { 

                  $('#iti_about').text(itinerariesArray[0].about);
                  $('#iti_highs').text(itinerariesArray[0].highlights);
                  $('#iti_logo').attr('src','uploads/properties/'+itinerariesArray[0].logo);
                 
                 var infoWindow = new google.maps.InfoWindow();

                 var data = itinerariesArray[i];
                 var latlong = {lat: parseFloat(itinerariesArray[i].location.lat), lng: parseFloat(itinerariesArray[i].location.long)};      
                 var marker = new google.maps.Marker({
                   position: latlong,
                   map: map,
                   //icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+ 35,
                   title: itinerariesArray[i].name
                 });

                 //Attach click event to the marker.
                 (function (marker, data) {
                     google.maps.event.addListener(marker, "mouseover", function (e) {
                         infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                         infoWindow.open(map, marker);
                     });
                     google.maps.event.addListener(marker, "mouseout", function (e) {
                         infoWindow.close();
                     });
                     google.maps.event.addListener(marker, "click", function (e) {
                        $('#carouse_iti.carousel-inner').html('');
                        $('#ol_iti').html('');
                         //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                         infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                         infoWindow.open(map, marker);
                         $('#iti_activities li a').css('display','none');
                         $('#iti_about').text(data.about);
                         $('#iti_highs').text(data.highlights);
                         $('#iti_logo').attr('src','uploads/properties/'+data.logo);
                         var counterdata=0;
                         var classactdata = '';
                         for (var actdata in data.activities){
                         //console.log('data.activities ', data.activities[actdata])
                           if(counterdata === 0){
                              classactdata = 'active';
                           }else{
                              classactdata = '';
                           }
                           var actnamedata = data.activities[actdata].name.toLowerCase();
                           actnamedata = actnamedata.replace(/ /g,'')
                           //console.log(actnamedata);
                           $('.upperparttab #iti_activities li a.'+actnamedata).css('display','block');

                           $('#ol_iti').append('<li data-target="#myCarouse3" data-slide-to="'+ counterdata +'" class="'+ classactdata +'"></li>');

                           if(data.activities[actdata].type == 'image') {
                              $('#carouse_iti.carousel-inner').append('<div data-value="'+actnamedata+'" class="carousel-item '+classactdata+' '+actnamedata+' "><img src="uploads/properties/'+data.activities[actdata].media+'" alt="Image"></div>');
                           } else {
                               $('#carouse_iti.carousel-inner').append('<div data-value="'+actnamedata+'" class="carousel-item '+classactdata+' '+actnamedata+' "><iframe src="'+data.activities[actdata].media+'" alt="video" type="'+ data.activities[actdata].type +'"></div>');
                           }
                           counterdata++;
                         }
                     });
                 })(marker, data);
               }
            }
         }
      }, 2000);
        
      //}
      

     // Highlight accomodation activities on click

     $(document).on('click', '#acco_activities li a', function(e) {

         $('#acco_activities li a').removeClass('active');
         $(this).addClass('active');
         var item = this.className.split(/\s+/)
         
         let text = $(this).parent('li').closest('.upperparttab');
         let el = text.find('#carouse_acco');
         text.find('.carousel-inner .item').removeClass('active');
         el.find('.'+item[0]).addClass('active');
      });

      // Highlight highlights activities on click

      $(document).on('click', '#high_activities li a', function(e) {
         $('#high_activities li a').removeClass('active');
         $(this).addClass('active');
         var item = this.className.split(/\s+/)
         
         let text = $(this).parent('li').closest('.upperparttab');
         let el = text.find('#carouse_high');
         text.find('.carousel-inner .item').removeClass('active');
         el.find('.'+item[0]).addClass('active');
      });

       // Highlight itinaries activities on click

      $(document).on('click', '#iti_activities li a', function(e) {
         $('#iti_activities li a').removeClass('active');
         $(this).addClass('active');
         var item = this.className.split(/\s+/)
         
         let text = $(this).parent('li').closest('.upperparttab');
         let el = text.find('#carouse_iti');
         text.find('.carousel-inner .item').removeClass('active');
         el.find('.'+item[0]).addClass('active');
      });

      // Accomodation Left and right arrows

      $(document).on('click', '.left-acc', function(e) { 
         $('#acco_activities li a').removeClass('active');
         setTimeout(function(){
            var activity  = $('#carouse_acco .active').attr("data-value");
            $('#acco_activities li .'+activity).addClass('active');
         }, 1000);
      });
      $(document).on('click', '.right-acc', function(e) { 
         $('#acco_activities li a').removeClass('active');
         setTimeout(function(){
            var activity  = $('#carouse_acco .active').attr("data-value");
            $('#acco_activities li .'+activity).addClass('active');
         }, 1000);
      });

      // Highlights Left and right arrows

       $(document).on('click', '.left-high', function(e) { 
         $('#high_activities li a').removeClass('active');
         setTimeout(function(){
            var activity  = $('#carouse_high .active').attr("data-value");
            $('#high_activities li .'+activity).addClass('active');
         }, 1000);
      });
      $(document).on('click', '.right-high', function(e) { 
         $('#high_activities li a').removeClass('active');
         setTimeout(function(){
            var activity  = $('#carouse_high .active').attr("data-value");
            $('#high_activities li .'+activity).addClass('active');
         }, 1000);
      });

       // Itinaries Left and right arrows

       $(document).on('click', '.left-iti', function(e) { 
         $('#iti_activities li a').removeClass('active');
         setTimeout(function(){
            var activity  = $('#carouse_iti .active').attr("data-value");
            $('#iti_activities li .'+activity).addClass('active');
         }, 1000);
      });
      $(document).on('click', '.right-iti', function(e) { 
         $('#iti_activities li a').removeClass('active');
         setTimeout(function(){
            var activity  = $('#carouse_iti .active').attr("data-value");
            $('#iti_activities li .'+activity).addClass('active');
         }, 1000);
      });

   
      $(document).on('click', '.carousel-control-next', function(e){
       let slider_area = $(this).closest('#myCarouse3').find('.carousel-inner');
       let icon_area = $(this).closest('.upperparttab').find('#iti_activities');

       let active_slide = slider_area.find('.active');
       let className = active_slide.attr('class');
       var class_list = className.split(/\s+/);
       if(class_list[1] !== 'active'){
         icon_area.find('li a').removeClass('active');
         icon_area.find('.'+class_list[1]).addClass('active');
       }
       if(class_list[1] === 'active') {
         icon_area.find('li a').removeClass('active');
         icon_area.find('.'+class_list[2]).addClass('active');
       }
      });
    </script>
   </body>
</html>