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
      <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
{!! NoCaptcha::renderJs() !!}

<style type="text/css">
  #g-recaptcha-response {
    display: block !important;
    position: absolute;
    margin: -78px 0 0 0 !important;
    width: 302px !important;
    height: 76px !important;
    z-index: -999999;
    opacity: 0;
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
            <div class="container">    
    
    <div id="signupbox" style=" margin-top:50px" class="mainbox col-md-8 col-md-offset-3 col-sm-8 col-sm-offset-2">
      
      @if(Session::has('error'))
        <h4 style="color:red;">{{ Session::get('error') }}</h4>
      @endif

      @if(Session::has('success'))
        <h4 style="color:green;">{{ Session::get('success') }}</h4>
      @endif
      
        <div class="panel panel-info">
            <div class="panel-heading">
                <div class="panel-title">Questionnaire</div>
                <div style="float:right; font-size: 85%; position: relative; top:-10px"><a id="signinlink" href="/accounts/login/"></a></div>
            </div>  
            <div class="panel-body" >
                <form method="post" action="{{route('addQuestionaire')}}">
                    {{-- <input type='hidden' name='' value='' /> --}}
                            

                    {{-- <form class="form-horizontal" method="post" action="{{route('addQuestionaire')}}"> --}}
                     @csrf
                    
                     
                        <div id="div_id_people" class="form-group required">
                            <label for="id_username" class="control-label col-md-4  requiredField"> No. of people<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md  textinput textInput form-control" id="id_people" maxlength="30" name="total_people" placeholder="Number of people" style="margin-bottom: 10px" type="number" required min=1 oninput="validity.valid||(value='');"/>
                            </div>
                        </div>
                        <div id="div_id_travel_date" class="form-group required">
                            <label for="id_travel" class="control-label col-md-4  requiredField"> Travel Date<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md form-control" id="id_travel" name="travel_date" style="margin-bottom: 10px" type="date" required />
                            </div>     
                        </div>

                        <div id="div_id_flying" class="form-group required">
                            <label for="id_flying" class="control-label col-md-4  requiredField"> Flying From<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md form-control" id="id_flying_from" name="flying_from" placeholder="Flying From" style="margin-bottom: 10px" type="text" required/>
                            </div>     
                        </div>
                        <div id="div_id_stay" class="form-group required">
                            <label for="id_length" class="control-label col-md-4  requiredField"> Length of stay<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 ">
                                <input class="input-md emailinput form-control" id="id_stay" name="stay_length" placeholder="Length of stay" style="margin-bottom: 10px" type="text" required/>
                            </div>     
                        </div>


                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Trip Type<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8" style="margin-bottom: 10px"> 
                                <select class="input-md form-control select" id="id_trip" name="trip_type" required>
                                   <option value="">Select Option</option>
                                   <option value="Self-Drive">Self-Drive</option>
                                   <option value="Cruise">Cruise</option>
                                   <option value="Guided Coach Tour">Guided Coach Tour</option>
                                </select>
                            </div>
                        </div>


                        <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Interests<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8" style="margin-bottom: 10px"> 
                                <select class="input-md form-control select" id="id_interest" name="interest" required>
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



                         <div id="div_id_name" class="form-group required"> 
                            <label for="id_name" class="control-label col-md-4  requiredField"> Accommodation Type<span class="asteriskField">*</span> </label> 
                            <div class="controls col-md-8" style="margin-bottom: 10px"> 
                                <select class="input-md form-control select" id="id_accomodation" name="accomodation" required>
                                 <option value="">Select Option</option>
                                   <option value="Lodges/Bed & Breakfasts">Lodges/Bed & Breakfasts</option>
                                   <option value="Hotels/Motels/Resorts">Hotels/Motels/Resorts</option>
                                   <option value="Farm Stays">Farm Stays</option>
                                   <option value="House">House</option>
                                   <option value="Something unique">Something unique</option>
                                </select>
                            </div>
                        </div>

                        
                        <div id="div_id_company" class="form-group required"> 
                            <label for="id_company" class="control-label col-md-4  requiredField"> Special Requests<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_special_request" name="special_request" placeholder="Special request" style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div> 
                        <div id="div_id_catagory" class="form-group required">
                            <label for="id_catagory" class="control-label col-md-4  requiredField"> Name<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "> 
                                 <input class="input-md textinput textInput form-control" id="id_name" name="name" placeholder="Enter name" style="margin-bottom: 10px" type="text" required/>
                            </div>
                        </div> 
                        <div id="div_id_number" class="form-group required">
                             <label for="id_number" class="control-label col-md-4  requiredField"> Email<span class="asteriskField">*</span> </label>
                             <div class="controls col-md-8 ">
                                 <input class="input-md textinput textInput form-control" id="id_email" name="email" placeholder="Enter email" style="margin-bottom: 10px" type="email" required/>
                            </div> 
                        </div> 


                        <div id="div_id_gender" class="form-group required">
                            <label for="id_gender"  class="control-label col-md-4  requiredField"> Physical Challenge<span class="asteriskField">*</span> </label>
                            <div class="controls col-md-8 "  style="margin-bottom: 10px">
                                 <label class="radio-inline"> <input type="radio" name="physical_challenge" id="id_physical_1" value="no"  style="margin-bottom: 20px" required>No</label>
                                 <label class="radio-inline"> <input type="radio" name="physical_challenge" id="id_physical_2" value="yes"  style="margin-bottom: 20px">Yes</label>
                            </div>
                        </div>


                        <div id="div_id_catagory" class="form-group required captcha" style="display: none;">
                            <label for="id_catagory" class="control-label col-md-4  requiredField"><span class="asteriskField"></span> </label>
                            <div class="controls col-md-8 "> 
                                 {!! app('captcha')->display() !!}
                                @if ($errors->has('g-recaptcha-response'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('g-recaptcha-response') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div> 

                        


                        <div class="form-group"> 
                            <div class="aab controls col-md-4 "></div>
                            <div class="controls col-md-8 ">
                                <input type="submit" name="Signup" value="Submit" class="btn btn-primary btn btn-info sbm-btn" id="submit-id-signup" />
                               
                            </div>
                        </div> 
                            
                    </form>

                {{-- </form> --}}
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
                     <!-- <div class="item">
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
                       
                     </div> -->
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
                  $('#carouse_acco.carousel-inner').append('<div class="item '+classact+' '+actname+' "><img src="uploads/properties/'+accomodationsArray[0].activities[act].media+'" alt="Image" type="'+ accomodationsArray[0].activities[act].type +'"></div>');
               } else {
                  $('#carouse_acco.carousel-inner').append('<div class="item '+classact+' '+actname+' "><iframe src="'+accomodationsArray[0].activities[act].media+'" alt="video" type="'+ accomodationsArray[0].activities[act].type +'"></div>');
               }

               counter++;
            }
            for(var i = 0; i < accomodationsArray.length ; i++) {

               //place marker
               if(accomodationsArray[i].address && accomodationsArray[i].address != '' && accomodationsArray[i].address != null) { 

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
                        $('#carouse_acco.carousel-inner').html('');
                        $('#ol_acco').html('');
                         //Wrap the content inside an HTML DIV in order to set height and width of InfoWindow.
                         infoWindow.setContent("<div ><h3>" + data.name + "</h3></div");
                         infoWindow.open(map, marker);
                         $('#acco_activities li a').css('display','none');
                         $('.carousel-inner').html('');
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
                              $('#carouse_acco.carousel-inner').append('<div class="item '+classactdata+' '+actnamedata+' "><img src="uploads/properties/'+data.activities[actdata].media+'" alt="Image" type="'+ data.activities[actdata].type +'"></div>');
                           } else {
                              $('#carouse_acco.carousel-inner').append('<div class="item '+classactdata+' '+actnamedata+' "><iframe src="'+data.activities[actdata].media+'" alt="video" type="'+ data.activities[actdata].type +'"></div>');
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
               $('#carouse_high.carousel-inner').append('<div class="item '+classact_high+' '+actname_high+' "><img src="uploads/properties/'+highlightsArray[0].activities[acthigh].media+'" alt="Image" type="'+ highlightsArray[0].activities[acthigh].type +'"></div>');
            } else {
               $('#carouse_high.carousel-inner').append('<div class="item '+classact_high+' '+actname_high+' "><iframe src="'+highlightsArray[0].activities[acthigh].media+'" alt="video" type="'+ highlightsArray[0].activities[acthigh].type +'"></div>');
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
                           $('#carouse_high.carousel-inner').append('<div class="item '+classactdata+' '+actnamedata+' "><img src="uploads/properties/'+data.activities[actdata].media+'" alt="Image"></div>');
                        } else {
                            $('#carouse_high.carousel-inner').append('<div class="item '+classactdata+' '+actnamedata+' "><iframe src="'+data.activities[actdata].media+'" alt="video" type="'+ data.activities[actdata].type +'"></div>');
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
                  $('#carouse_iti.carousel-inner').append('<div class="item '+classact_iti+' '+actname_iti+' "><img src="uploads/properties/'+itinerariesArray[0].activities[act].media+'" alt="Image" type="'+ itinerariesArray[0].activities[act].type +'"></div>');
               } else {
                  $('#carouse_iti.carousel-inner').append('<div class="item '+classact_iti+' '+actname_iti+' "><iframe src="'+itinerariesArray[0].activities[act].media+'" alt="video" type="'+ itinerariesArray[0].activities[act].type +'"></div>');
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
                              $('#carouse_iti.carousel-inner').append('<div class="item '+classactdata+' '+actnamedata+' "><img src="uploads/properties/'+data.activities[actdata].media+'" alt="Image"></div>');
                           } else {
                               $('#carouse_iti.carousel-inner').append('<div class="item '+classactdata+' '+actnamedata+' "><iframe src="'+data.activities[actdata].media+'" alt="video" type="'+ data.activities[actdata].type +'"></div>');
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


     /* $(document).on('click','.sbm-btn', function(e){
  
         var email = $('#id_email').val();
         var name = $('#id_name').val();
         var people = $('#id_people').val();
         var travel_date = $('#id_travel').val();
         var flying_from = $('#id_flying_from').val();
         var stay = $('#id_stay').val();
         var trip = $('#id_trip').val();
         var interest = $('#id_interest').val();
         var accomodation = $('#id_accomodation').val();
         var special_request = $('#id_special_request').val();

         var physical_1 = $('#id_physical_1').val();
         var physical_2 = $('#id_physical_2').val();

         if ( ! $("#id_physical_1").is(':checked') && ! $("#id_physical_1").is(':checked'))
         {
           setAlert('#id_physical_1');
         }

        
         if(email == '' || name == '' || people == '' || travel_date == '' || flying_from == '' || stay == '' || trip =='' || interest =='' || accomodation == '' || special_request == ''){
            e.preventDefault();
            
            if(email === ''){ setAlert('#id_email'); }
            
            if(name === ''){ setAlert('#id_name'); }
            if(people === ''){ setAlert('#id_people'); }
            if(travel_date === ''){ setAlert('#id_travel'); }
            if(flying_from === ''){ setAlert('#id_flying_from'); }
            if(stay === ''){ setAlert('#id_stay'); }
            if(trip === ''){ setAlert('#id_trip'); }
            if(interest === ''){ setAlert('#id_interest'); }
            if(accomodation === ''){ setAlert('#id_accomodation'); }
            if(special_request === ''){ setAlert('#id_special_request'); }
         }

         // var recaptcha = $("#g-recaptcha-response").val();
         //   if (recaptcha === "") {
         //      event.preventDefault();
         //      alert("Please check the recaptcha");
         //  }
      });

      function setAlert(id_name) {
        $(id_name).attr("required", true);
        $(id_name).closest('.form-group').find('.asteriskField').css({"color": "red"});
        
      }*/

      window.onload = function() {
          var $recaptcha = document.querySelector('#g-recaptcha-response');

          if($recaptcha) {
              $recaptcha.setAttribute("required", "required");
          }
      };



      $(document).on('keyup','input,select', function(e){
          validateForm();
      });

      $(document).on('change','.select', function(e){
         validateForm()
      });


      $(document).on('change','input[type=radio][name=physical_challenge]', function(e){
        validateForm()
      });

      function validateForm() {
         var email = $('#id_email').val();
         var name = $('#id_name').val();
         var people = $('#id_people').val();
         var travel_date = $('#id_travel').val();
         var flying_from = $('#id_flying_from').val();
         var stay = $('#id_stay').val();
         var trip = $('#id_trip').val();
         var interest = $('#id_interest').val();
         var accomodation = $('#id_accomodation').val();
         var special_request = $('#id_special_request').val();

         var physical_1 = $('#id_physical_1').val();
         var physical_2 = $('#id_physical_2').val();

         if(email != '' && name != '' && people != '' && travel_date != '' && flying_from != '' && stay != '' && trip != '' && interest != '' && accomodation != '' && special_request != '' && ($("#id_physical_1").is(':checked') || $("#id_physical_2").is(':checked'))) {

            $('.captcha').show();
         }  
        
      }



     
    </script>
   </body>
</html>