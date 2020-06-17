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
      <!-- Custom fonts for this template -->
      <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
      <link href="https://fonts.googleapis.com/css2?family=Merriweather:ital,wght@0,300;0,400;0,700;0,900;1,300;1,400;1,700;1,900&display=swap" rel="stylesheet">
      <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700;900&display=swap" rel="stylesheet">
      <!-- Custom styles for this template -->
      <link href="css/main-style.css" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <!-- <link rel="stylesheet" href="css/owl.theme.default.min.css"> -->
   </head>
   <style>
    #acco_activities li  a{
      display: none;
    }
    #high_activities li  a{
      display: none;
    }
    #iti_activities li  a{
      display: none;
    }
   </style>
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
                     <a class="nav-link" href="#">Not Just New Zealand</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">About</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">Why Us</a>
                  </li>
                  <li class="nav-item">
                     <a class="nav-link" href="#">FAQ</a>
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
      <?php //echo "<pre>";print_r($properties);?>
      <section class="tabviewnab">
         <div class="nabtab">
            <ul class="nav nav-tabs besttab">
               <li><a data-toggle="tab" href="#accomodations" class="active">Accomodations <span>Best places to stay</span></a></li>
               <li><a data-toggle="tab" href="#highlights">Highlights <span>Great things to do</span></a></li>
               <li><a data-toggle="tab" href="#itineraries">Itineraries <span>Luxury timelines</span></a></li>
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
                                 <div class="tab-content stationviewpart">
                                    <div class="tab-pane in active">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
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
                                          <a href="#" class="btn btn-primary book">Book now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="highlights_desc">
                                       <p id="high_accom"></p>
                                       <div class="logosbtn">
                                          <a href="#" class="btn btn-primary book">Book now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
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
                                 <div class="tab-content stationviewpart">
                                    <div class="tab-pane in active">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
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
                                          <a href="#" class="btn btn-primary book">Book now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="highlights_highdesc">
                                       <p id="high_highs"></p>
                                       <div class="logosbtn">
                                          <a href="#" class="btn btn-primary book">Book now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
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
                                 <div class="tab-content stationviewpart">
                                    <div id="stationview-1" class="tab-pane in active">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo.jpg"> </div>
                                    </div>
                                    <div id="stationview-2" class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo2.jpg"> </div>
                                    </div>
                                    <div id="stationview-3" class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo2.jpg"> </div>
                                    </div>
                                    <div id="stationview-4" class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div id="stationview-5" class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo2.jpg"> </div>
                                    </div>
                                    <div id="stationview-6" class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo1.jpg"> </div>
                                    </div>
                                    <div id="stationview-7" class="tab-pane">
                                       <div class="vidopart"> <a class="playbtn" data-toggle="modal" data-target="#videopop"></a><img src="img/imgvideo2.jpg"> </div>
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
                                          <a href="#" class="btn btn-primary book">Book now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
                                       </div>
                                    </div>
                                    <div class="tab-pane" id="highlights_itdesc">
                                       <p id="iti_highs"></p>
                                       <div class="logosbtn">
                                          <a href="#" class="btn btn-primary book">Book now</a> <a href="" class="vi-logo"><img src="img/logosright.png"></a>
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
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Waitomo Glowworm Caves Waikat</h4>
                           <a href=""> <img src="img/imghome001.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Mckenzie - Riding through the vineyards</h4>
                           <a href=""> <img src="img/imghome002.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Lake Taupo riverboat cruise</h4>
                           <a href=""> <img src="img/imghome003.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Fiordland - mountian hiking for a large group
                           </h4>
                           <a href=""> <img src="img/imghome004.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Waitomo Glowworm Caves Waikat</h4>
                           <a href=""> <img src="img/imghome003.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Waitomo Glowworm Caves Waikat</h4>
                           <a href=""> <img src="img/imghome001.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Mckenzie - Riding through the vineyards</h4>
                           <a href=""> <img src="img/imghome002.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Lake Taupo riverboat cruise</h4>
                           <a href=""> <img src="img/imghome003.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Fiordland - mountian hiking for a large group
                           </h4>
                           <a href=""> <img src="img/imghome004.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
                     <div class="item">
                        <div class="imgcontainer">
                           
                           <h4>Waitomo Glowworm Caves Waikat</h4>
                           <a href=""> <img src="img/imghome003.jpg"></a>
                        </div>
                        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore.</p>
                       
                     </div>
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
          maxzoom: 15
        });
          for(var i = 0; i < accomodationsArray.length ; i++) {

            //place marker
            if(accomodationsArray[i].address && accomodationsArray[i].address != '' && accomodationsArray[i].address != null) { 

               for (var act in accomodationsArray[0].activities){
                  var actname = accomodationsArray[0].activities[act].toLowerCase();
                  actname = actname.replace(/ /g,'')
                  //console.log(actname);
                  $('.upperparttab #acco_activities li a.'+actname).css('display','block');
               }
               $('#about_accom').text(accomodationsArray[0].about);
               $('#high_accom').text(accomodationsArray[0].highlights);
               $('#acc_logo').attr('src','uploads/properties/'+accomodationsArray[0].logo);
              
              var infoWindow = new google.maps.InfoWindow();

              var data = accomodationsArray[i];
              var latlong = {lat: parseFloat(accomodationsArray[i].location.lat), lng: parseFloat(accomodationsArray[i].location.long)};      
              var marker = new google.maps.Marker({
                position: latlong,
                map: map,
                //icon: 'http://chart.apis.google.com/chart?chst=d_map_pin_letter&chld='+ 35,
                title: accomodationsArray[i].name
              });

              //Attach click event to the marker.
              (function (marker, data) {
                  google.maps.event.addListener(marker, "click", function (e) {
                      //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                      infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                      infoWindow.open(map, marker);
                      $('#acco_activities li a').css('display','none');
                      $('#about_accom').text(data.about);
                      $('#high_accom').text(data.highlights);
                      $('#acc_logo').attr('src','uploads/properties/'+data.logo);
                      for (var actdata in data.activities){
                        var actnamedata = data.activities[actdata].toLowerCase();
                        actnamedata = actnamedata.replace(/ /g,'')
                        //console.log(actnamedata);
                        $('.upperparttab #acco_activities li a.'+actnamedata).css('display','block');
                      }
                  });
              })(marker, data);
            }
        }
       

       //map 2
       var map = new google.maps.Map(document.getElementById('map-canvas-highlights'), {
          zoom: 5,
          center: auck,
          fullscreenControl: false,
          backgroundColor: '#FFF',
          minzoom: 5,
          maxzoom: 15
        });
          for(var i = 0; i < highlightsArray.length ; i++) {

            //place marker
            if(highlightsArray[i].address && highlightsArray[i].address != '' && highlightsArray[i].address != null) { 

               $('#about_highs').text(highlightsArray[0].about);
               $('#high_highs').text(highlightsArray[0].highlights);
               $('#high_logo').attr('src','uploads/properties/'+highlightsArray[0].logo);
               for (var acthigh in highlightsArray[0].activities){
                  var actnamehigh = highlightsArray[0].activities[acthigh].toLowerCase();
                  actnamehigh = actnamehigh.replace(/ /g,'')
                  //console.log(actnamehigh);
                  $('.upperparttab #high_activities li a.'+actnamehigh).css('display','block');
               }
              
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
                  google.maps.event.addListener(marker, "click", function (e) {
                      //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                      infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                      infoWindow.open(map, marker);
                      $('#high_activities li a').css('display','none');
                      $('#about_highs').text(data.about);
                      $('#high_highs').text(data.highlights);
                      $('#high_logo').attr('src','uploads/properties/'+data.logo);
                      for (var actdatahigh in data.activities){
                        var actnamedatahigh = data.activities[actdatahigh].toLowerCase();
                        actnamedatahigh = actnamedatahigh.replace(/ /g,'')
                        //console.log(actnamedatahigh);
                        $('.upperparttab #high_activities li a.'+actnamedatahigh).css('display','block');
                      }
                  });
              })(marker, data);
            }
        }

        //map 3

        var map = new google.maps.Map(document.getElementById('map-canvas-itineraries'), {
          zoom: 5,
          center: auck,
          fullscreenControl: false,
          backgroundColor: '#FFF',
          minzoom: 5,
          maxzoom: 15
        });
          for(var i = 0; i < itinerariesArray.length ; i++) {

            //place marker
            if(itinerariesArray[i].address && itinerariesArray[i].address != '' && itinerariesArray[i].address != null) { 

               $('#iti_about').text(itinerariesArray[0].about);
               $('#iti_highs').text(itinerariesArray[0].highlights);
               $('#iti_logo').attr('src','uploads/properties/'+itinerariesArray[0].logo);
               for (var actit in itinerariesArray[0].activities){
                  var actnameit = itinerariesArray[0].activities[actit].toLowerCase();
                  actnameit = actnameit.replace(/ /g,'')
                  //console.log(actnameit);
                  $('.upperparttab #iti_activities li a.'+actnameit).css('display','block');
               }
              
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
                  google.maps.event.addListener(marker, "click", function (e) {
                      //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                      infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                      infoWindow.open(map, marker);
                      $('#iti_activities li a').css('display','none');
                      $('#iti_about').text(data.about);
                      $('#iti_highs').text(data.highlights);
                      $('#iti_logo').attr('src','uploads/properties/'+data.logo);
                      for (var actdatait in data.activities){
                        var actnamedatait = data.activities[actdatait].toLowerCase();
                        actnamedatait = actnamedatait.replace(/ /g,'')
                        //console.log(actnamedatait);
                        $('.upperparttab #iti_activities li a.'+actnamedatait).css('display','block');
                      }
                  });
              })(marker, data);
            }
        }

      }, 1000);
        
      //}
    </script>
   </body>
</html>