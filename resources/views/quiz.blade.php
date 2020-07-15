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
      <link href="css/quiz.css" rel="stylesheet">
      <link rel="stylesheet" href="css/owl.carousel.css">
      <link rel="stylesheet" href="css/owl.theme.default.min.css">
      <link rel="stylesheet" href="css/jquery.mobile.css">
      <style type="text/css">
         .travel-budget {
            display: none;
         }
      </style>
   </head>
   <body class="innerpage">
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

      <!-- <header class="masthead" style="background-image: url('img/home-bg.jpg')">
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
      </header> -->


      <!-- Page Header -->
         <h2 class="text-center">Questionaire</h2>
         @if(Session::has('error'))
           <h4 style="color:red;">{{ Session::get('error') }}</h4>
         @endif

         @if(Session::has('success'))
           <h4 style="color:green;">{{ Session::get('success') }}</h4>
         @endif

      <!-- Main Content -->
      <div class="quiz-content-wrappper">
         <div id="quiZ" class="carousel slide" data-interval="false">
            <form method="post" id="quizForm" action="{{route('addQuestionnaire')}}" class="quiz-form" novalidate>
                @csrf
               <div class="carousel-inner">
                  <div class="validation-message text-center"><p>Please fill required fields.</p></div>
                  <div class="carousel-item active" data-id="1">
                     <div class="col-lg-7 mx-auto">
                     <h2>Let’s <strong><em>explore</em> </strong>your travel needs.</h2>
                     <div class="stepdiv">Step <span> <sup> 1</sup>/<sub>2</sub></span></div>
                     <h3>How many people will be traveling, including yourself?</h3>
                     <div class="formquestion">
                        <div class="form-group">
                           <label>Adults</label>
                           <input type="number" min="0" max="10" name="adults" required/>
                        </div>
                        <div class="form-group">
                           <label>Children</label>
                           <input type="number" min="0" max="10" name="childrens" required/>
                        </div>
                        <div class="form-group">
                           <label>Infants</label>
                           <input type="number" min="0" max="10" name="infants" required/>
                        </div>                     
                     </div>       
                  </div>
                  </div>
                  <div class="carousel-item" data-id="2">
                     <div class="col-lg-7 mx-auto">
                     <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                     <div class="stepdiv">Step <span> 2/8</span></div>
                     <h3>Dates you would like to travel?</h3>
                     <div class="formquestion">
                        <div class="form-group">
                           <label>Start Date</label>
                            <input class="input-md form-control" id="id_travel" name="start_date" style="margin-bottom: 10px" type="date" required />
                        </div>
                        <div class="form-group">
                           <label>Length of Stay</label>
                           <input class="input-md emailinput form-control" id="id_stay" name="length_stay" placeholder="Length of stay" style="margin-bottom: 10px" type="text" required/>
                        </div>
                        <div class="form-group">
                           <label>Flexible?</label>
                           <select class="form-control" name="flexible">
                              <option>Yes</option>
                              <option>No</option>
                           </select>
                        </div>
                        <div class="form-group">
                           <input type="checkbox" value="1" name="my_flights">I will book my own flights
                        </div>
                     </div>
                  </div>
                  </div>
                  <div class="carousel-item" data-id="3">
                     <div class="col-lg-7 mx-auto">
                        <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                        <div class="stepdiv">Step <span>3/8</span></div>
                        <h3>Location you will be leaving from?</h3>
                        <div class="formquestion">
                           <div class="form-group">
                              <label>Country</label>
                              <select class="form-control" name="country" id="countryId">
                                <!--  <option value="">Select Country</option> -->
                                 <option value="New Zealand" countryid="NZ">New Zealand</option>
                              </select>
                           </div>
                           <div class="form-group">
                              <label>State</label>
                              <select class="form-control states" name="state"  id="stateId" required>
                                 <option value="">Select State</option>
                                 <option value="Chatham Islands" stateid="10">Chatham Islands</option>
                                 <option value="Auckland" stateid="E7">Auckland</option>
                                 <option value="Bay of Plenty" stateid="E8">Bay of Plenty</option>
                                 <option value="Canterbury" stateid="E9">Canterbury</option>
                                 <option value="Gisborne" stateid="F1">Gisborne</option>
                                 <option value="Hawke's Bay" stateid="F2">Hawke's Bay</option>
                                 <option value="Manawatu-Wanganui" stateid="F3">Manawatu-Wanganui</option>
                                 <option value="Marlborough" stateid="F4">Marlborough</option>
                                 <option value="Nelson" stateid="F5">Nelson</option>
                                 <option value="Northland" stateid="F6">Northland</option>
                                 <option value="Otago" stateid="F7">Otago</option>
                                 <option value="Southland" stateid="F8">Southland</option>
                                 <option value="Taranaki" stateid="F9">Taranaki</option>
                                 <option value="Waikato" stateid="G1">Waikato</option>
                                 <option value="Wellington" stateid="G2">Wellington</option>
                                 <option value="West Coast" stateid="G3">West Coast</option>
                                 <option value="Tasman" stateid="TAS">Tasman</option>                          
                              </select>
                           </div>  
                           <div class="form-group">
                              <label>City</label>
                              <select class="form-control cities" name="city"  id="cityId" required>
                                 <option value="">Select City</option>
                              </select>
                           </div>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" data-id="4">
                     <div class="col-lg-7 mx-auto">
                        <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                        <div class="stepdiv">Step  <span>4/8</span></div>
                        <h3>Interests?</h3>
                        <div class="formquestion">
                           <div class="form-group">
                              <label>Select all that apply</label>
                               <select class="input-md form-control select" id="id_interest" name="interests" required>
                                   <option value="">Select Option</option>
                                   <option value="Nature">Nature</option>
                                   <option value="Wildlife">Wildlife</option>
                                   <option value="Maori Culture">Maori Culture</option>

                                   <option value="LOTR & Film">LOTR & Film</option>
                                   <option value="Art/Museums">Art/Museums</option>
                                   <option value="Fine Food">Fine Food</option>

                                   <option value="Wine">Wine</option>
                                   <option value="Adrenaline (Bungy jumping, Sky diving)">
                                    Adrenaline (Bungy jumping, Sky diving)
                                   </option>
                                   <option value="Adventure (Rafting, Jet Boats, Kayaking)">
                                    Adventure (Rafting, Jet Boats, Kayaking)
                                   </option>

                                   <option value="Golf">Golf</option>
                                   <option value="Winter Sports">Winter Sports</option>
                                   <option value="Fishing">Fishing</option>


                                   <option value="Hiking">Hiking</option>
                                   <option value="Biking">Biking</option>
                                   <option value="Scenic Flights">Scenic Flights</option>

                                   <option value="pas">Hot pools/Health spas</option>
                                   <option value="Other">Other</option>
                                </select>
                           </div> 
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" data-id="5">
                     <div class="col-lg-7 mx-auto">
                        <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                        <div class="stepdiv">Step  <span>5/8</span></div>
                        <p class="text-center">Slide to the cost of travel within your budget</p>
                        <div class="formquestion rangesliderpart">                   
                           <div class="form-group rangepart">
                              <form>
                                 <div data-role="rangeslider" class="costdiv"  id="div-slider">
                                    <label for="range-1b" class="costlabel"> Cost of total trip</label>
                                    <input type="range" name="cost_trip"  id="range-1b" min="0" max="50000" value="5000" data-popup-enabled="true" data-show-value="false" class="">
                                 </div>
                                  <span class="maxp">Max</span>
                                  <div data-role="rangeslider" class="daysno">
                                    <label for="range-1c" class="costlabel nodays"> NUMBER OF DAYS</label>
                                    <input type="range" name="no_of_days" id="range-1c" min="0" max="30" value="3" data-popup-enabled="false" data-show-value="true" class="">
                                 </div>
                              </form>
                           </div>
                        </div>
                        <div class="travel-budget">
                           <h3>Travel Budget</h3>
                           <span class="total_price_total"></span>
                           <h3>Average Cost Per Day</h3>
                           <span class="total_price"></span>
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" data-id="6">
                     <div class="col-lg-7 mx-auto">
                        <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                        <div class="stepdiv">Step  <span>6/8</span></div>
                        <h3>Accommodation Types?</h3>
                        <div class="formquestion">
                           <div class="form-group">
                              <label>Select all that apply</label>  
                              <select class="input-md form-control select" id="id_accomodation" name="accommodation" required>
                                 <option value="">Select Option</option>
                                   <option value="Lodges/Bed & Breakfasts">Lodges/Bed & Breakfasts</option>
                                   <option value="Hotels/Motels/Resorts">Hotels/Motels/Resorts</option>
                                   <option value="Farm Stays">Farm Stays</option>
                                   <option value="House">House</option>
                                   <option value="Something unique">Something unique</option>
                              </select>                     
                           </div> 
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" data-id="7">
                     <div class="col-lg-7 mx-auto">
                        <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                        <div class="stepdiv">Step  <span>7/8</span></div>
                        <h3>Do you have any physical challenges when you travel?</h3>
                        <div class="formquestion">
                           <div class="form-group">
                              <label>Challenges</label>
                              <select class="form-control" name="challenges" required>
                                 <option>Wheelchair</option>
                              </select>                       
                           </div> 
                           <div class="form-group">
                              <label>Details of challenges below</label>
                              <textarea class="form-control" name="challenge_details" required></textarea>                     
                           </div> 
                        </div>
                     </div>
                  </div>
                  <div class="carousel-item" data-id="8">
                     <div class="col-lg-7 mx-auto">
                      <div class="validation-message text-center"><p>Please fill required fields.</p></div>
                     <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                     <div class="stepdiv">Step  <span>8/8</span></div>
                     <h3>Special Requests?</h3>
                     <div class="formquestion fullcontactform" >
                        <div class="form-group">                        
                            <textarea class="form-control" name="special_request" required></textarea>
                        </div>
                        <div class="row">
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Name</label>
                                 <input type="text" name="name" class="form-control" required>
                              </div>
                           </div>
                           <div class="col-lg-6">
                              <div class="form-group">
                                 <label>Email</label>
                                 <input type="email" name="email" class="form-control" required>
                              </div>
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 text-center mt-3 joincheck">
                              <input type="checkbox" name="join_mailing" class="incheck" value="1"> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Join mailing list? 
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 text-center mt-4">
                              <input type="submit" name="" class="btn btn-primary submitbtn" id="submitbtn" value="Submit">
                           </div>
                        </div>
                        <div class="row">
                           <div class="col-lg-12 text-center mt-4">
                              <p> *At a later date we will add coach tour options + Cruise Ship options + Campervan options
                                 **All current trips are self-drive. TNZ will select the most suitable vehicle for the client.
                              </p>
                           </div>
                        </div>
                     </div>
                  </div>
                  </div>
               </div>
               <div class="quiz-content-indicators">
                  <ul class="carousel-indicators">
                     <li data-target="#quiZ" data-slide-to="0" class="active"></li>
                     <li data-target="#quiZ" data-slide-to="1"></li>
                     <li data-target="#quiZ" data-slide-to="2"></li>
                     <li data-target="#quiZ" data-slide-to="3"></li>
                     <li data-target="#quiZ" data-slide-to="4"></li>
                     <li data-target="#quiZ" data-slide-to="5"></li>
                     <li data-target="#quiZ" data-slide-to="6"></li>
                     <li data-target="#quiZ" data-slide-to="7"></li>
                  </ul>
               </div>
            </form>
         </div>
         <div class="quiz-header-sec">
            <div class="quiz-arrows">
               <a class="carousel-control-prev" href="#quiZ" data-slide="prev"><span class="carousel-control-prev-icon"><i class="fas fa-arrow-left"></i></span></a>
               <a class="carousel-control-next arrow-active" href="#quiZ" data-slide="next"><span class="carousel-control-next-icon"><i class="fas fa-arrow-right"></i></span></a>
            </div>
         </div>
      </div>
      <!-- <section class="newsland-slider">
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
      </section> -->
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
      <script src="vendor/jquery/jquery.min.js"></script>
      <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
      <script src="js/mainscript.js"></script>
      <!-- Custom scripts for this template -->
      <script src="https://demos.jquerymobile.com/1.4.2/js/jquery.js"></script>
      <script src="js/jquery.mobile-1.4.5.js"></script>
      <script src="//geodata.solutions/includes/countrystatecity.js"></script>
      <script src="js/owl.carousel.js"></script>     
      <script src="js/jquery.validate.min.js"></script>
      <script type="text/javascript">
         $('.owl-carousel').owlCarousel({
           stagePadding: 100,
           loop:false,
           margin:10,
           nav:true,
           rewind: false,
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
        var priceVal = 3000;
        var daysVal = 3;
         $(document).ready(function () {
         $('a.navbar-brand.ui-link').click(function(e){
         e.preventDefault();
         var link = $(this).attr('href');
         if (link.indexOf('#') < 1){
           window.location.href = link;
         }
          // $('#range-1b').slider("option", "max", 5000);
          // $('#range-1c').slider("option", "max", 30);
        })
          //  console.log('page is read');
          $('#submitbtn').click(function(e){
            e.preventDefault();
            //console.log('submit form here');
            $.ajax({
              url: $('#quizForm').attr('action'),
              type: 'POST',
              data: $('#quizForm').serialize(),
              dataType: 'JSON',
              success: function(response) {
                $('html, body').animate({
                    scrollTop: $(".validation-message").offset().top - 150
                }, 500);
               // console.log('done ', response);
                if(response.success) {
                  var msg = '<p>' + response.message + '</p>';
                  $('.validation-message').html(msg);
                  $('.validation-message').addClass('alert-success');
                  $('.validation-message').removeClass('alert-danger');
                } else {
                  var msg = '<p>' + response.message + '</p>';
                  $('.validation-message').html(msg);
                  $('.validation-message').removeClass('alert-success');
                  $('.validation-message').addClass('alert-danger');
                }
              },
              error: function(error) {
                $('html, body').animate({
                    scrollTop: $(".validation-message").offset().top - 150
                }, 500);
              //  console.log('error ', error);
                var msg = '<p>' + error.message + '</p>';
                $('.validation-message').html(msg);
                $('.validation-message').removeClass('alert-success');
                $('.validation-message').addClass('alert-danger');
              }
            })
          })

          $('.total_price_total').html('$ '+ priceVal); 
          $('.total_price').html('$ '+ (priceVal / daysVal).toFixed(2)); 
        
         $("#range-1b").on("slidestop", function(event) {
          priceVal = $(this).val();
          $('.total_price').html('$ '+ (priceVal / daysVal).toFixed(2)); 
          $('.total_price_total').html('$ '+ priceVal); 
          $('.travel-budget').show();
        });
         $("#range-1c").on("slidestop", function(event) {
          daysVal = $(this).val();
          $('.total_price').html('$ '+(priceVal / daysVal).toFixed(2)); 
          $('.total_price_total').html('$ '+ priceVal); 
          $('.travel-budget').show();
        });

         $('.quiz-arrows a.carousel-control-prev').click(function () {
            $(".carousel-control-next").show();
            $(this).addClass('arrow-active');
            $('.quiz-arrows a.carousel-control-next').removeClass('arrow-active');
            setTimeout(function () {
              if ($(".carousel-item.active").attr("data-id") == "1") {
                $(".carousel-control-prev").hide();
              }
              if ($(".carousel-item.active").attr("data-id") == "8") {
                $(".carousel-control-next").hide();
              }
            }, 1000);
         });

         $('.quiz-arrows a.carousel-control-next').click(function () {
            if($(".quiz-form").valid()) {
              $('label.error').each(function() {
                $(this).remove();
              });
              
              
            } else {
               return false;
            }
            $(".carousel-control-prev").show();
            $(this).addClass('arrow-active');
            $('.quiz-arrows a.carousel-control-prev').removeClass('arrow-active');

            setTimeout(function () {
              if ($(".carousel-item.active").attr("data-id") == "1") {
                $(".carousel-control-prev").hide();
              }
              if ($(".carousel-item.active").attr("data-id") == "8") {
                $(".carousel-control-next").hide();
              }
            }, 1000);

            $('.quiz-content-indicators ul.carousel-indicators li.active').addClass('active-show');
            $('.quiz-content-indicators ul.carousel-indicators li.active').prevAll().addClass('active-show');

         });

          $('.quiz-content-indicators ul.carousel-indicators li').click(function () {

              if(!$(".quiz-form").valid()) {
                $('label.error').each(function() {
                  $(this).remove();
                });
               
                return false;
              }

              $(this).addClass('active-show');
              $(this).prevAll().addClass('active-show');
              $(this).nextAll().removeClass('active-show');
              
         });
       });
      </script>
   </body>
</html>