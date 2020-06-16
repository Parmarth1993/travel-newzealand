@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <h2 class="textlog">Add New Property</h2>
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
         <form action="{{route('add_properties')}}" name="profile_form" enctype='multipart/form-data' method="POST">
            @csrf
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" value="" required>
                  </div>
                  <!-- <div class="form-group">
                     <label>Description</label>
                     <textarea name="description" class="form-control" value="" required></textarea>
                  </div> -->
                  <div class="form-group">
                     <label>Address</label>
                     <input id="autocomplete"
                      name= "address"
                      placeholder="Enter your address"
                      onFocus="geolocate()"
                      onChange="getLatLOng()"
                      type="text" class="form-control" required/>
                  </div>
                  <input type="hidden" name="location[lat]" id="lat_val">
                  <input type="hidden" name="location[long]" id="long_val">
                  <div class="form-group">
                     <label>Select Logo</label>
                     <input type="file" name="logo" id="file-upload" class="file" required>
                  </div>
                  <div class="form-group">
                     <label>Category</label>
                     <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        <option value="1">Accomodations</option>
                        <option value="2">Highlights</option>
                        <option value="3">Itineraries</option>                        
                     </select>
                  </div>
                  <!-- <div class="form-group">
                     <label>Select Highlight</label>
                     <select name="highlight" class="form-control">
                        <option value="">Select Highlight</option>
                        @foreach($highlights as $highlight)
                         <option value="{{$highlight->id}}">{{$highlight->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Select Itineraries</label>
                     <select name="itineraries" class="form-control">
                        <option value="">Select Itineraries</option>
                        @foreach($itineraries as $itinerary)
                         <option value="{{$itinerary->id}}">{{$itinerary->name}}</option>
                        @endforeach
                     </select>
                  </div> -->
                  <div class="form-group">
                     <label>Select Activities</label>
                     <input type="checkbox" name="activities[]" value="Helicopter">Helicopter
                     <input type="checkbox" name="activities[]" value="Hili Area">Hili Area
                     <input type="checkbox" name="activities[]" value="Fishing">Fishing
                     <input type="checkbox" name="activities[]" value="Food">Food
                     <input type="checkbox" name="activities[]" value="Army">Army
                     <input type="checkbox" name="activities[]" value="Religion">Religion
                     <!-- <input type="checkbox" name="activities[]" value="Videos">Videos -->
                  </div>

                  <div class="form-group">
                    <label>Media Type</label>
                     <select name="media_type" id="media_type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="1">Images</option>
                        <option value="2">Videos</option>
                     </select>
                  </div>

                  <div class="form-group" id="upload-image">
                    <label>Select Images <span>(multiple select allowed)</span></label>
                     <input type="file" name="images[]" class="form-control" multiple>
                  </div>

                  <div class="form-group" id="upload-video">
                    <label>Select Videos <span>(multiple select allowed)</span></label>
                     <input type="file" name="videos[]" class="form-control" multiple>
                  </div>

                  <div class="form-group">
                     <label>Select Type</label>
                     <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Luxury">Luxury</option>
                        <option value="Premium">Premium</option>
                     </select>
                  </div>
                  <input type="submit" name="" class="btn btn-primary ml-auto" value="Add Property">
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
    </script>
@endsection