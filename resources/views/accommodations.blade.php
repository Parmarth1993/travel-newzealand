<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"/>
      <meta name="description" content="">
      <meta name="author" content="">
      <title> Travel New Zealand </title>
      <!-- Bootstrap core CSS -->
      <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
      <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
      <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/main-style.css" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.css">
   </head>
   <body class="homein">
      <a id="top"></a>
      <!-- Navigation -->
      <nav class="navbar navbar-expand-lg navbar-light fixed-top" id="mainNav">
         <div class="container">
            <a class="navbar-brand" href="/"></a>  
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
                <ul class="navbar-nav">
                  <li class="nav-item">
                     <a class="nav-link" href="/experiences">Experiences</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/accommodations">Accommodations</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/about">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/why-us">Why Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="/faq">FAQ</a>
                  </li>
                  <li class="nav-item lastone inhome">
                     <a class="nav-link searchicon" href="javascript:void(0)"></a>
                  </li>
                  <li class="nav-item last inhome">
                     <a class="nav-link" href="#">GET IN TOUCH</a>
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
      <header class="masthead half" style="background-image: url('img/partinnerpage.jpg')">
         <div class="overlay"></div>
         <div class="container">
            <div class="row">
               <div class="col-lg-8 col-md-10 mx-auto">
                  <h1><img src="img/flying.png" class="flyingicon">Accommodations</h1>
               </div>
            </div>
         </div>
      </header>
      <!-- Main Content -->
      <section class="offersdiv">
         <div class="container">
            <div class="row">
               <div class="col-lg-10 mx-auto text-center">
                  <p>Travel New Zealand offers a wide range of accommodation options depending on your style and preferences. All our accommodations 4 Star at a minimum. We have selected only the best New Zealand has to offer. </p>
               </div>
            </div>
         </div>
      </section>
      <section class="luxurylodge">
         <div class="container">
            <div class="row">
               @foreach($accommodations as $accommodation)
               <div class="col-lg-6">
                  <div class="luxurydept">
                     <div class="imgcon">
                        
                        @if(sizeof($accommodation->activities) > 0)
                        <div id="myCarousel" class="carousel slide" data-ride="carousel">
                            <div id="carouse_acco" class="carousel-inner">
                              @foreach($accommodation->activities as $key => $activities)
                              <div class="carousel-item @if($key < 1) active @endif">
                                 <img src="/uploads/properties/{{$activities['media']}}" alt="Image" >
                              </div>
                              @endforeach
                            </div>
                          <!-- <a class="left carousel-control" href="#myCarousel" data-slide="prev">
                            <span class="glyphicon glyphicon-chevron-left"><i class="fa fa-angle-left left-acc"></i></span>
                            <span class="sr-only">Previous</span>
                          </a>
                          <a class="right carousel-control" href="#myCarousel" data-slide="next">
                            <span class="glyphicon glyphicon-chevron-right"><i class="fa fa-angle-right right-acc"></i></span>
                            <span class="sr-only">Next</span>
                          </a> -->
                        </div>
                        @else
                           <img src="img/it-timg01.jpg">
                        @endif
                     </div>
                     <a href="#myCarousel" class="arr right carousel-control" href="#myCarousel" data-slide="next"></a>
                     <div class="righttext-lux">
                        <h4>{{$accommodation->name}}</h4>
                        <p><!-- {!!html_entity_decode($accommodation->about)!!} -->
                           
                            @if(strlen($accommodation->about) > 200)
                              @php ($about = \Illuminate\Support\Str::limit($accommodation->about, 200))
                              {!!html_entity_decode($about)!!}<a href="">Read more</a>
                            @else
                              {!!html_entity_decode($accommodation->about)!!}
                            @endif
                        </p>
                     </div>
                  </div>
               </div>
               @endforeach
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
      <div id="videopop" class="homevidio modal fade" role="dialog">
         <div class="modal-dialog">
            <!-- Modal content-->
            <div class="modal-content">
               <div class="modal-header">
                  <h4 class="modal-title">Minaret Station</h4>
                  <button type="button" class="close" data-dismiss="modal">&times;</button>
               </div>
               <div class="modal-body">
                  <iframe width="100%" height="315" src="https://www.youtube.com/embed/v3LAYyz7cF4" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
               </div>
            </div>
         </div>
      </div>
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="js/mainscript.js"></script>
      <!-- Custom scripts for this template -->
      <script src="js/owl.carousel.js"></script>     
      <script type="text/javascript">
         if (window.matchMedia('(max-width: 480px)').matches)
            {
               $('.owl-carousel').owlCarousel({
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
            });
         }
      </script>
      <script type="text/javascript">
         $('.owl-carousel').owlCarousel({
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
            });         
      </script>
      <script>
         $(document).ready(function(){
           $('[data-tool="tooltip"]').tooltip();
         });
      </script>
   </body>
</html>