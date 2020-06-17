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
                  <div class="form-group">
                     <label>Select Activities <button type="button" id="addMoreBtn" class="btn btn-primary btn-sm">Add More</button></label>
                     <div class="activities_selector" id="activities_selector">
                        <label id="firstLabl">Select Activities <button type="button" id="removeBtn" class="btn btn-primary btn-sm removeBtn" data-id="1">Remove</button></label>
                        <select name="activities[]" class="form-control" required onchange="return showAddMore(this.value)">
                          <option value="">Select Activities</option>
                          <option value="Helicopter">Helicopter</option>
                          <option value="Hili Area">Hili Area</option>
                          <option value="Fishing">Fishing</option>
                          <option value="Food">Food</option>
                          <option value="Army">Army</option>
                          <option value="Religion">Religion</option>
                       </select>
                       <br>
                       <label>Select Media Type</label>
                       <select name="activity_media_type[]" class="form-control" required="">
                         <option value="image">Image</option>
                         <option value="video">Video</option>
                       </select>
                       <br>
                       <label>Select Media</label>
                       <input type="file" name="activity_media[]" required="">
                       <br>
                     </div>
                  </div>

                  <div class="form-group">
                     <label>Select Type</label>
                     <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Luxury">Luxury</option>
                        <option value="Premium">Premium</option>
                     </select>
                  </div>
                  <div class="form-group" >
                    <label>About </label>
                    <textarea name="about" class="form-control" required></textarea>
                  </div>
                  <div class="form-group" >
                    <label>Highlights </label>
                    <textarea name="highlights" class="form-control" required></textarea>
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