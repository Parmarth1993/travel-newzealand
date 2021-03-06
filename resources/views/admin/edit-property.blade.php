@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <h2 class="textlog">Edit Property</h2>
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
         <form action="{{route('edit_properties', $property->id)}}" name="profile_form" enctype='multipart/form-data' method="POST">
            @csrf
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label>Category</label>
                     <select name="category" class="form-control" id="category" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)                    
                        <option value="{{$category->id}}" @if($category->id == $property->category) selected='selected' @endif>{{$category->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" value="{{$property->name}}" required>
                  </div>
                  <div class="form-group is_not_iti" @if($property->category == '3') style="display:none;" @endif>
                     <label>Address</label>
                     <input id="autocomplete"
                        name="address"
                        placeholder="Enter your address"
                        type="text" class="form-control" value="{{$property->address}}" >
                  </div>
                  <div class="form-group is_iti" @if($property->category != '3') style="display:none;" @endif>
                     <label>Start Point</label>
                     <input id="autocompleteStart"
                      name= "address_start"
                      placeholder="Enter your address"
                      type="text" class="form-control"
                      value="{{$property->address_start}}"/>
                  </div>

                  <div class="form-group is_iti" @if($property->category != '3') style="display:none;" @endif>
                     <label>End Point</label>
                     <input id="autocompleteEnd"
                      name= "address_end"
                      placeholder="Enter your address"
                      type="text" class="form-control"
                      value="{{$property->address_end}}"/>
                  </div>
                  <input type="hidden" name="location[lat]" id="lat_val" value="{{$property->location['lat']}}">
                  <input type="hidden" name="location[long]" id="long_val" value="{{$property->location['long']}}">

                  <input type="hidden" name="location_start[lat]" id="lat_val_start" value="{{$property->location_start['long']}}">
                  <input type="hidden" name="location_start[long]" id="long_val_start" value="{{$property->location_start['long']}}">

                  <input type="hidden" name="location_end[lat]" id="lat_val_end" value="{{$property->location_end['long']}}">
                  <input type="hidden" name="location_end[long]" id="long_val_end" value="{{$property->location_end['long']}}">

                  
                  <div class="form-group">
                     <label>Select Logo</label><br/>
                     <input type="file" name="logo" id="file-upload" class="file" accept="image/*">
                     <input type="hidden" name="logo2" value="{{$property->logo}}">
                     <img src="{{asset('/uploads/properties/'.$property->logo)}}" width="150" style="border: 1px solid #000">
                  </div>
                  
                  <div class="form-group activities_area" @if($property->category != '1') style="display: none;" @endif>
                     <label>Select Activities </label>
                     @php ($counter = 0)
                     @for($i = 0; $i < sizeOf($property['activities']); $i++) 
                     <div class="activities_selector" id="activities_selector{{$counter}}">
                        <label id="firstLab{{$counter}}">Select Activities <button type="button" id="removeBtn{{$counter}}" class="btn btn-primary btn-sm removeBtn" data-id="{{$counter}}">Remove</button></label>
                        <select name="activities[]" class="form-control"  onchange="return showAddMore(this.value)">
                           <option value="">Select Activities</option>
                           <option value="Helicopter" @if($property['activities'][$i]['name'] == 'Helicopter') selected='selected' @endif>Helicopter</option>
                           <option value="Hili Area" @if($property['activities'][$i]['name'] == 'Hili Area') selected='selected' @endif>Hili Area</option>
                           <option value="Fishing" @if($property['activities'][$i]['name'] == 'Fishing') selected='selected' @endif>Fishing</option>
                           <option value="Food" @if($property['activities'][$i]['name'] == 'Food') selected='selected' @endif>Food</option>
                           <option value="Army" @if($property['activities'][$i]['name'] == 'Army') selected='selected' @endif>Army</option>
                           <option value="Religion" @if($property['activities'][$i]['name'] == 'Religion') selected='selected' @endif>Religion</option>
                        </select>
                        <br>
                        <label>Select Media Type</label>
                        <select name="activity_media_type[]" class="form-control" >
                        <option value="image" @if($property['activities'][$i]['type'] == 'image') selected='selected' @endif>Image</option>
                        <option value="video" @if($property['activities'][$i]['type'] == 'video') selected='selected' @endif>Video</option>
                        </select>
                        <br>
                        <label class="image-file">Select Image</label><br/>
                        <input type="file" name="activity_media_image[]" accept="image/*">
                        <input class="media-preview{{$counter}}" type="hidden" name="activity_media_image_hidden[]" value="{{$property['activities'][$i]['media']}}">
                        <label class="vide-link">Enter Video Link</label>
                        <input type="url" class="vide-link form-control" name="activity_media_video[]" >
                        @if($property['activities'][$i]['type'] == 'image')
                        <img class="media-preview{{$counter}}" src="{{asset('/uploads/properties/'.$property['activities'][$i]['media'])}}" width="150" style="border: 1px solid #000">
                        @else
                        <iframe class="media-preview{{$counter}}" width="150" src="{{$property['activities'][$i]['media']}}"></iframe>
                        @endif
                        <br>
                     </div>
                     @php ($counter++)
                     @endfor
                     <input type="hidden" name="activitiesCounter" id="activitiesCounter" value="{{$counter}}">
                     <input type="hidden" name="hiddenId" id="hiddenId" value="{{$property['id']}}">
                     <button type="button" id="addMoreBtn" class="edit btn btn-primary btn-sm">Add More</button>
                  </div>
                  <div class="form-group">
                     <label>Select Type</label>
                     <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Luxury" @if("Luxury" == $property->type) selected='selected' @endif>Luxury</option>
                        <option value="Premium" @if("Premium" == $property->type) selected='selected' @endif>Premium</option>
                     </select>
                  </div>
                  <div class="form-group" >
                     <label>About </label>
                     <textarea name="about" class="form-control" required>{{$property->about}}</textarea>
                  </div>
                  <div class="form-group activities_area" @if($property->category != '1') style="display: none;" @endif >
                     <label>Highlights </label>
                     <textarea name="highlights" class="form-control">{{$property->highlights}}</textarea>
                  </div>
                  <input type="submit" name="" class="btn btn-primary ml-auto" value="Update Property">
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
   

   var autocomplete_start;

   autocomplete_start = new google.maps.places.Autocomplete(
   document.getElementById('autocompleteStart'), {types: ['geocode']});
   autocomplete_start.addListener('place_changed', fillInAddressStart);

  function fillInAddressStart() {
   var place = autocomplete_start.getPlace();
   var address = '';
     if (place.address_components) {
       address = [
         (place.address_components[0] && place.address_components[0].short_name || ''),
         (place.address_components[1] && place.address_components[1].short_name || ''),
         (place.address_components[2] && place.address_components[2].short_name || '')
       ].join(' ');
     }
     $('#lat_val_start').val(place.geometry.location.lat());
     $('#long_val_start').val(place.geometry.location.lng());
  }

  var autocomplete_end;

   autocomplete_end = new google.maps.places.Autocomplete(
   document.getElementById('autocompleteEnd'), {types: ['geocode']});
   autocomplete_end.addListener('place_changed', fillInAddressEnd);

  function fillInAddressEnd() {
   var place = autocomplete_end.getPlace();
   var address = '';
     if (place.address_components) {
       address = [
         (place.address_components[0] && place.address_components[0].short_name || ''),
         (place.address_components[1] && place.address_components[1].short_name || ''),
         (place.address_components[2] && place.address_components[2].short_name || '')
       ].join(' ');
     }
     $('#lat_val_end').val(place.geometry.location.lat());
     $('#long_val_end').val(place.geometry.location.lng());
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