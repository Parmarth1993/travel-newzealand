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


      <!-- Page Header -->
       <div class="quiz-header-sec">
         <h2>Questionaire</h2>
               <div class="quiz-arrows">
                  <a class="carousel-control-prev" href="#quiZ" data-slide="prev"><span class="carousel-control-prev-icon"><i class="fas fa-arrow-left"></i></span></a>
                  <a class="carousel-control-next arrow-active" href="#quiZ" data-slide="next"><span class="carousel-control-next-icon"><i class="fas fa-arrow-right"></i></span></a>
               </div>
         </div>
      <!-- Main Content -->
      <div class="quiz-content-wrappper">
               <div id="quiZ" class="carousel slide">
                     <input type="hidden" name="quizType" id="quizType" value="patient">
                     <div class="validation-message text-center"><p>Please fill required fields.</p></div>
                     <div class="carousel-inner">
                        <div class="carousel-item active" data-id="1">
                           <div class="col-lg-7 mx-auto">
                           <h2>Let’s <strong><em>explore</em> </strong>your travel needs.</h2>
                           <div class="stepdiv">Step <span> <sup> 1</sup>/<sub>2</sub></span></div>
                           <h3>How many people will be traveling, including yourself?</h3>
                           <div class="formquestion">
                              <div class="form-group">
                                 <label>Adults</label>
                                 <select class="form-control">
                                    <option>Select Adults</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Children</label>
                                 <select class="form-control">
                                    <option>Select Children</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Infants</label>
                                 <select class="form-control">
                                    <option>Select Infants</option>
                                 </select>
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
                                 <select class="form-control">
                                    <option>Select option</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Length of Stay</label>
                                 <select class="form-control">
                                    <option>Select option</option>
                                 </select>
                              </div>
                              <div class="form-group">
                                 <label>Flexible?</label>
                                 <select class="form-control">
                                    <option>Yes</option>
                                    <option>No</option>
                                 </select>
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
                                    <select class="form-control">
                                       <option>Country</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>City</label>
                                    <select class="form-control">
                                       <option>Austin</option>
                                    </select>
                                 </div>
                                 <div class="form-group">
                                    <label>State</label>
                                    <select class="form-control">
                                       <option>Texas</option>                         
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
                                    <select class="form-control">
                                       <option>Nature</option>
                                    </select>
                                 </div> 
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item" data-id="5">
                           <div class="col-lg-7 mx-auto">
                              <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                              <div class="stepdiv">Step  <span>5/8</span></div>
                              <h3>Travel Budget</h3>
                              <p class="text-center">Slide to the cost of travel within your budget</p>
                              <div class="formquestion rangesliderpart">                   
                                 <div class="form-group rangepart">
                                    <form>
                                       <div data-role="rangeslider" class="costdiv">
                                          <label for="range-1b" class="costlabel"> Cost of total trip</label>
                                          <input type="range" name="range-1b" id="range-1b" min="0" max="5000" value="3000" data-popup-enabled="true" data-show-value="false" class="">
                                       </div>
                                        <span class="maxp">Max</span>
                                        <div data-role="rangeslider" class="daysno">
                                          <label for="range-1c" class="costlabel nodays"> NUMBER OF DAYS</label>
                                          <input type="range" name="range-1c" id="range-1c" min="0" max="10" value="3" data-popup-enabled="false" data-show-value="true" class="">
                                       </div>
                                    </form>
                                 </div>
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
                                    <select class="form-control">
                                       <option>Lodges/Bed & Breakfast</option>
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
                                    <select class="form-control">
                                       <option>Wheelchair</option>
                                    </select>                       
                                 </div> 
                                 <div class="form-group">
                                    <label>Details of challenges below</label>
                                    <textarea class="form-control">                          
                                    </textarea>                     
                                 </div> 
                              </div>
                           </div>
                        </div>
                        <div class="carousel-item" data-id="8">
                           <div class="col-lg-7 mx-auto">
                           <h2>Let’s <strong><em>explore</em></strong> your travel needs.</h2>
                           <div class="stepdiv">Step  <span>8/8</span></div>
                           <h3>Special Requests?</h3>
                           <div class="formquestion fullcontactform">
                              <div class="form-group">                        
                                 <textarea class="form-control">                          
                                 </textarea>                     
                              </div>
                              <div class="row">
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label>Name</label>
                                       <input type="text" name="" class="form-control">
                                    </div>
                                 </div>
                                 <div class="col-lg-6">
                                    <div class="form-group">
                                       <label>Email</label>
                                       <input type="email" name="" class="form-control">
                                    </div>
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12 text-center mt-3 joincheck">
                                    <input type="checkbox" name="" class="incheck"> Join mailing list? 
                                 </div>
                              </div>
                              <div class="row">
                                 <div class="col-lg-12 text-center mt-4">
                                    <input type="submit" name="" class="btn btn-primary submitbtn" value="Submit">
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
                  <!-- </form> -->
               </div>
            </div>
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
      <script src="js/owl.carousel.js"></script>     
      <script type="text/javascript">
         $('.owl-carousel').owlCarousel({
           stagePadding: 100,
           loop:false,
           margin:10,
           nav:true,
           rewind: true,
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
   </body>
</html>