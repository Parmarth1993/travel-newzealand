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
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
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
                  <h1><img src="img/flying.png" class="flyingicon">Experiences</h1>
               </div>
            </div>
         </div>
      </header>
      <section class="navlast">
         <div class="container">
            <div class="row">
               <div class="col-lg-12">
                  <ul class="">
                     @foreach($experiences as $experience)
                     <li><a href="#experience{{$experience->id}}" class="youlink">{{$experience->title}}</a></li>
                     <!-- <li><a href="#golf" class="youlink">Golf</a></li>
                     <li><a href="#food-wine" class="youlink">Food & Wine</a></li>
                     <li><a href="#multiday-hike" class="youlink">Multiday Hike</a></li>
                     <li><a href="#multiday-cycling" class="youlink">Multiday Cycling</a></li>
                     <li><a href="#heli-skiing" class="youlink">Heli Skiing/Snow Sports</a></li>
                     <li><a href="#film-locations" class="youlink">Film locations</a></li>
                     <li><a href="#sporting-events" class="youlink">Sporting events</a></li> -->
                     @endforeach
                  </ul>
               </div>
            </div>
         </div>
      </section>
      <section class="golf">
         <div class="container">
            @foreach($experiences as $experience)
            <div class="row" id="experience{{$experience->id}}">            
               <div class="col-lg-5 col-md-5 pr-0 experpart">
                  <div class="port">
                     <img src="img/logoleft.png"> 
                     <h3>{{$experience->title}}</h3>
                  </div>
                  <div class="sevenpart">
                     <p>{!!html_entity_decode($experience->description)!!}</p>
                  </div>
                  <div class="i-expbtn">
                     <a href="/quetionarie" class="btn btn-primary">Submit Inquiry</a>
                     <a href="https://www.google.com/maps/search/?api=1&query={{$experience->location['lat']}},{{$experience->location['long']}}" target="_blank" class="btn btn-primary">View course maps</a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 pl-0 experpart">
                  <div class="profile">
                     <h4>{{$experience->sub_title}}</h4>
                     <div class="imgprofile">
                        <img src="/uploads/experience/{{$experience->image}}" class="">
                     </div>
                     <div class="profpart">
                        <h5>{{$experience->short_description}}</span></h5>
                     </div>
                  </div>
               </div>
            </div>
            @endforeach
            <!-- <div class="row" id="food-wine">
               <div class="col-lg-5 col-md-5 pr-0 experpart">
                  <div class="port">
                     <img src="img/logoleft.png"> 
                     <h3>Food
                        <span>& Wine</span>
                     </h3>
                  </div>
                  <div class="sevenpart">
                     <p>New Zealand is home to some of the world's most beautiful golf courses." and then make the text bigger?  </p>
                     <p>You may also enjoy the offerings of the country’s plentiful wineries, known for producing pure, vibrant, and intense wines with fresh acidity. </p>
                     <p>In the summer months, wine and food festivals such as the Kawhia Kai Festival and the West Coast’s Wildfoods Festival are a big draw for visitors.</p>
                  </div>
                  <div class="i-expbtn">
                     <a href="" class="btn btn-primary">Submit Inquiry</a>
                     <a href="" class="btn btn-primary">View vineyard maps</a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 pl-0 experpart">
                  <div class="profile">
                     <h4>Savor local cuisine and vintages from the country’s plentiful wineries.</h4>
                     <div class="imgprofile">
                        <img src="img/i-team02.jpg" class="">
                     </div>
                     <div class="profpart">
                        <h5>Fabulous Food Experiences. <span>We can include winery tours in any itinerary. Simply let us know upon submitting your
                           inquiry that you are interested in a wine tour or tasting. </span>
                        </h5>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row" id="multiday-hike">
               <div class="col-lg-5 col-md-5 pr-0 experpart">
                  <div class="port">
                     <img src="img/logoleft.png"> 
                     <h3>Multiday
                        <span>Hiking</span>
                     </h3>
                  </div>
                  <div class="sevenpart">
                     <p>Exploring New Zealand through one of its many trails and wilderness areas is one of the best ways to experience the raw, wild beauty of the country. </p>
                     <p>From active volcanoes and lush rainforests to coastal scenery and alpine climbs, there is something for everyone along the thousands of miles of tracks. </p>
                  </div>
                  <div class="i-expbtn">
                     <a href="" class="btn btn-primary">Submit Inquiry</a>
                     <a href="" class="btn btn-primary">View hiking maps</a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 pl-0 experpart">
                  <div class="profile">
                     <h4>Quench your thirst for adventure on picturesque hiking and walking trails.</h4>
                     <div class="imgprofile">
                        <img src="img/i-team03.jpg" class="">
                     </div>
                     <div class="profpart">
                        <h5>Some of our recommended tours include:  <span>All our itineraries can provide short and day-long hikes at any destination. Multi-day hikes through New Zealand’s iconic Great Walks must be booked well in advance.</span>
                        </h5>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row" id="multiday-cycling">
               <div class="col-lg-5 col-md-5 pr-0 experpart">
                  <div class="port">
                     <img src="img/logoleft.png"> 
                     <h3>View cycling mapsz
                        <span>Cycling</span>
                     </h3>
                  </div>
                  <div class="sevenpart">
                     <p>Biking through New Zealand is an unforgettable experience. Whether you are a beginner or experienced cyclist, we will offer advice, shuttles and luggage transfers, accommodations and reservations along the way. </p>
                     <p>We can easily organize quality rental bikes as well as guided and unguided tours. If you prefer a shorter ride, we can also recommend hour-long or day-long rides.</p>
                     <p>When submitting your inquiry, be sure to let us know if you’re interested in a single- or multi-day cycle tour. </p>
                  </div>
                  <div class="i-expbtn">
                     <a href="" class="btn btn-primary">Submit Inquiry</a>
                     <a href="" class="btn btn-primary">View cycling maps</a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 pl-0 experpart">
                  <div class="profile">
                     <h4>Coast along the untamed wilderness and rugged island beauty.</h4>
                     <div class="imgprofile">
                        <img src="img/i-team04.jpg" class="">
                     </div>
                     <div class="profpart">
                        <h5>Some of our recommended tours include:</h5>
                        <div class="row">
                           <div class="col-lg-6">
                              <ul>
                                 <li>Alps 2 Ocean Trail</li>
                                 <li>Old Ghost Road</li>
                                 <li>Te Ara Ahi Trail</li>
                                 <li>Central Otago Rail Trail</li>
                              </ul>
                           </div>
                           <div class="col-lg-6">
                              <ul>
                                 <li>Hawkes Bay Trails</li>
                                 <li>Queenstown Trail</li>
                                 <li>Great Taste Trail</li>
                                 <li>Twin Coast Cycle Trail</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row" id="heli-skiing">
               <div class="col-lg-5 col-md-5 pr-0 experpart">
                  <div class="port">
                     <img src="img/logoleft.png"> 
                     <h3>Snow
                        <span>Sports</span>
                     </h3>
                  </div>
                  <div class="sevenpart">
                     <p>With an international reputation as a top skiing and snowboarding location, New Zealand’s ski fields are perfect for skiers and snowboarders of all levels.  </p>
                     <p>Queenstown is the best place to experience New Zealand’s skiing. A resort town with many luxury accommodation options, it offers postcard views and world class amenities.</p>
                     <p>Let us know if skiing or snow sports are experiences you’d like to add to your itinerary.  </p>
                  </div>
                  <div class="i-expbtn">
                     <a href="" class="btn btn-primary">Submit Inquiry</a>
                     <a href="" class="btn btn-primary">View maps</a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 pl-0 experpart">
                  <div class="profile">
                     <h4>Glide through alpine landscapes during New Zealand’s snow sport season, June to October.</h4>
                     <div class="imgprofile">
                        <img src="img/i-team05.jpg" class="">
                     </div>
                     <div class="profpart">
                        <h5>Accommodation providers offering Heliskiing from their doorstep:</h5>
                        <div class="row">
                           <div class="col-lg-12">
                              <ul>
                                 <li>Minaret Station</li>
                                 <li>Blanket Bay</li>
                                 <li>Mahu Whenua Ridgeline Homestead & Eco Sanctuary</li>
                              </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row" id="film-locations">
               <div class="col-lg-5 col-md-5 pr-0 experpart">
                  <div class="port">
                     <img src="img/logoleft.png"> 
                     <h3>Film
                        <span>Locations</span>
                     </h3>
                  </div>
                  <div class="sevenpart">
                     <p> New Zealand’s rugged beauty and diverse landscapes make it the perfect backdrop for many feature films. The Lord of the Rings, Avatar, The Chronicles of Narnia, King Kong and The Last Samurai are just some of the films shot here.</p>
                     <p>Movie-lovers will have dozens of locations to choose from, which can be explored in a variety of ways. </p>
                     <p>When you submit your inquiry, be sure to let us know you are interested in exploring a film location.   </p>
                  </div>
                  <div class="i-expbtn">
                     <a href="" class="btn btn-primary">Submit Inquiry</a>
                     <a href="" class="btn btn-primary">View film locations</a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 pl-0 experpart">
                  <div class="profile">
                     <h4>Explore the locations of some of your favorite films.</h4>
                     <div class="imgprofile">
                        <img src="img/i-team06.jpg" class="">
                     </div>
                     <div class="profpart">
                        <h5>Your ticket to Middle Earth: </h5>  
                        <div class="row">
                           <div class="col-lg-12">
                              <p>The Lord of The Rings trilogy and The Hobbit movies filmed at more than 150 locations across New Zealand.</p>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
            <div class="row" id="sporting-events">
               <div class="col-lg-5 col-md-5 pr-0 experpart">
                  <div class="port">
                     <img src="img/logoleft.png"> 
                     <h3>Sporting
                        <span>Events</span>
                     </h3>
                  </div>
                  <div class="sevenpart">
                     <p>Sporting events are a big part of New Zealand culture. Every year, the country hosts a wide range of national and international events — from rugby to cycling to sailing to winter sports. </p>
                     <p>Coast to Coast, an iconic multisport event, sees competitors run, bike, hike, and kayak across the island.  </p>
                     <p>When you submit your inquiry, be sure to let us know you are interested in attending a sporting event. </p>
                  </div>
                  <div class="i-expbtn">
                     <a href="" class="btn btn-primary">Submit Inquiry</a>
                     <a href="" class="btn btn-primary">View  sporting events</a>
                  </div>
               </div>
               <div class="col-lg-7 col-md-7 pl-0 experpart">
                  <div class="profile">
                     <h4>Enjoy some of the best international sporting events on the planet.</h4>
                     <div class="imgprofile">
                        <img src="img/i-team07.jpg" class="">
                     </div>
                     <div class="profpart">
                        <h5>Sporting events include:   </h5>  
                        <div class="row">
                           <div class="col-lg-12">
                             <ul>
                             	<li>Americas Cup Sailing – Auckland 2021</li>
                             	<li>New Zealand All Blacks Rugby  </li>
                             	<li>Womens Rugby World Cup 2021 </li>
                             	<li>Winter Games NZ </li>
                             </ul>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>    -->        
         </div>
      </section>
      <!-- Main Content -->
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
      <script>
         $(document).ready(function(){
           $('[data-tool="tooltip"]').tooltip();
         });
      </script>
   </body>
</html>