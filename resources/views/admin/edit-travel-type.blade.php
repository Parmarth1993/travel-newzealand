@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <h2 class="textlog">Edit Travel Type</h2>
            </div>
         </div>
         <div class="row">
            @if(Session::has('error'))
            <p class="alert {{ Session::get('alert-class', 'alert-danger text-center') }}">
               {{ Session::get('error') }}
            </p>
            @endif
            @if(Session::has('success'))
            <p class="alert {{ Session::get('alert-class', 'alert-success text-center') }}">
               {{ Session::get('success') }}
            </p>
            @endif
         </div>
         <form action="{{route('edit_travel',$travel->id)}}" name="profile_form" enctype='multipart/form-data' method="POST">
            @csrf
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label>Title</label>
                     <input type="text" name="title" class="form-control" value="{{$travel->title}}" required>
                  </div>

                  <div class="form-group">
                     <label>Sub Title</label>
                     <input type="text" name="sub_title" class="form-control" value="{{$travel->sub_title}}" required>
                  </div>

                  <div class="form-group">
                     <label>Address</label>
                     <input id="autocomplete"
                      name= "address"
                      placeholder="Enter your address"
                      onChange="getLatLOng()"
                      type="text" class="form-control" 
                      value="{{$travel->address}}" required/>
                  </div>
                  <input type="hidden" name="location[lat]" id="lat_val" value="{{$travel->location['lat']}}">
                  <input type="hidden" name="location[long]" id="long_val" value="{{$travel->location['long']}}">
                  <div class="form-group">
                     <label>Select Image</label>
                      <main class="page">
                          <!-- input file -->
                        <div class="box">
                          <input type="file" name="" id="file-input">
                            <input type="hidden" name="experience_image" id="set_img" value="{{$travel->image}}">
                          </div>
                          <!-- leftbox -->
                          <div class="box-2">
                            <div class="result"></div>
                          </div>
                          <!--rightbox-->
                          <div class="box-2 img-result hide">
                            <!-- result of crop -->
                            <img class="cropped" src="" alt="">
                          </div>
                          <!-- input file -->
                          <div class="box">
                            <div class="options hide">
                              <input type="hidden" class="img-w" value="300" min="100" max="1200" />
                            </div>
                            <!-- save btn -->
                            <button class="btn save hide">Crop</button>
                          </div>
                        </main>

                        <img class="media-preview" src="{{asset('/uploads/travel_type/'.$travel->image)}}" width="150" style="border: 1px solid #000">
                  </div>
                 
                  <div class="form-group" >
                    <label>Description </label>
                    <textarea name="description" class="form-control">{{$travel->description}}</textarea>
                  </div>
                 
                  <input type="submit" name="" class="btn btn-primary ml-auto" value="Update Travel Type">
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
 <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBPlxYBIjisvG84Q8mQo8RHWZqXJBUibKk&libraries=places"></script>
<script>

   var placeSearch, autocomplete;

   autocomplete = new google.maps.places.Autocomplete(
   document.getElementById('autocomplete'), {types: ['geocode']});
   autocomplete.addListener('place_changed', fillInAddress);

  function fillInAddress() {
   // Get the place details from the autocomplete object.
   var place = autocomplete.getPlace();
   //console.log(place);
   var address = '';
     if (place.address_components) {
       address = [
         (place.address_components[0] && place.address_components[0].short_name || ''),
         (place.address_components[1] && place.address_components[1].short_name || ''),
         (place.address_components[2] && place.address_components[2].short_name || '')
       ].join(' ');
     }
     //console.log(address, place.geometry.location.lat(), place.geometry.location.lng());
     $('#lat_val').val(place.geometry.location.lat());
     $('#long_val').val(place.geometry.location.lng());
}

   // Bias the autocomplete object to the user's geographical location,
   // as supplied by the browser's 'navigator.geolocation' object.
   function geolocate() {
     if (navigator.geolocation) {
       navigator.geolocation.getCurrentPosition(function(position) {
         var geolocation = {
           lat: position.coords.latitude,
           lng: position.coords.longitude
         };
         var circle = new google.maps.Circle(
             {center: geolocation, radius: position.coords.accuracy});
         autocomplete.setBounds(circle.getBounds());
        
       });
     }
   }

 // vars
let result = document.querySelector('.result'),
img_result = document.querySelector('.img-result'),
img_w = document.querySelector('.img-w'),
img_h = document.querySelector('.img-h'),
options = document.querySelector('.options'),
save = document.querySelector('.save'),
cropped = document.querySelector('.cropped'),
dwn = document.querySelector('.download'),
upload = document.querySelector('#file-input'),
cropper = '';
//set_img = document.querySelector('.set_img');

// on change show image with crop options
upload.addEventListener('change', (e) => {
  if (e.target.files.length) {
    // start file reader
    const reader = new FileReader();
    reader.onload = (e)=> {
      if(e.target.result){
        // create new image
        let img = document.createElement('img');
        img.id = 'image';
        img.src = e.target.result
        // clean result before
        result.innerHTML = '';
        // append new image
        result.appendChild(img);
        // show save btn and options
        save.classList.remove('hide');
        options.classList.remove('hide');
        // init cropper
        cropper = new Cropper(img);
      }
    };
    reader.readAsDataURL(e.target.files[0]);
  }
});

// save on click
save.addEventListener('click',(e)=>{
  e.preventDefault();
  // get result to data uri
  let imgSrc = cropper.getCroppedCanvas({
    width: img_w.value // input value
  }).toDataURL();
  // remove hide class of img
  cropped.classList.remove('hide');
  img_result.classList.remove('hide');
  // show image cropped
  cropped.src = imgSrc;
  set_img.val = cropped.src;
  document.getElementById('set_img').value = cropped.src;
  //console.log(set_img.val);

  // dwn.classList.remove('hide');
  // dwn.download = 'imagename.png';
  // dwn.setAttribute('href',imgSrc);
});



    </script>
@endsection