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
         <form action="{{route('edit_properties', $property->id)}}" name="profile_form" enctype='multipart/form-data' method="POST">
            @csrf
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" value="{{$property->name}}" required>
                  </div>
                  <div class="form-group">
                     <label>Address</label>
                     <input id="autocomplete"
                      name="address"
                      placeholder="Enter your address"
                      onFocus="geolocate()"
                      onChange="getLatLOng()"
                      type="text" class="form-control" value="{{$property->address}}" required/>
                  </div>
                  <input type="hidden" name="location[lat]" id="lat_val">
                  <input type="hidden" name="location[long]" id="long_val">
                  <div class="form-group">
                     <label>Select Logo</label>
                     <input type="file" name="logo" id="file-upload" class="file">
                     <input type="hidden" name="logo2" value="{{$property->logo}}">
                     <img src="/uploads/properties/{{$property->logo}}" width="150" style="border: 1px solid #000">
                  </div>
                  
                  <div class="form-group">
                     <label>Category</label>
                     <select name="category" class="form-control" required>
                        <option value="">Select Category</option>
                        @foreach($categories as $category)                    
                          <option value="{{$category->id}}" @if($category->id == $property->category) selected='selected' @endif>{{$category->name}}</option>
                        @endforeach
                     </select>
                  </div>

                  <div class="form-group">
                     <label>Select Activities <button type="button" id="addMoreBtn" class="edit btn btn-primary btn-sm">Add More</button></label>
                     @php ($counter = 0)
                     @for($i = 0; $i < sizeOf($property['activities']); $i++) 
                           <div class="activities_selector" id="activities_selector{{$counter}}">
                              <label id="firstLab{{$counter}}">Select Activities <button type="button" id="removeBtn{{$counter}}" class="btn btn-primary btn-sm removeBtn" data-id="{{$counter}}">Remove</button></label>
                           <select name="activities[]" class="form-control" required onchange="return showAddMore(this.value)">
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
                          <select name="activity_media_type[]" class="form-control" required="">
                            <option value="image" @if($property['activities'][$i]['type'] == 'image') selected='selected' @endif>Image</option>
                            <option value="video" @if($property['activities'][$i]['type'] == 'video') selected='selected' @endif>Video</option>
                          </select>
                          <br>
                          <label class="image-file">Select Image</label>
                          <input type="file" name="activity_media_image[]" >
                          <input type="hidden" name="activity_media_image_hidden[]" value="{{$property['activities'][$i]['media']}}">
                          <label class="vide-link">Enter Video Link</label>
                          <input type="url" class="vide-link form-control" name="activity_media_video[]" >
                          @if($property['activities'][$i]['type'] == 'image')
                           <img src="/uploads/properties/{{$property['activities'][$i]['media']}}" width="150" style="border: 1px solid #000">
                          @else
                           <iframe width="150" src="{{$property['activities'][$i]['media']}}"></iframe>
                          @endif
                          <br>
                        </div>
                       @php ($counter++)
                     @endfor
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
                  <div class="form-group" >
                    <label>Highlights </label>
                    <textarea name="highlights" class="form-control" required>{{$property->highlights}}</textarea>
                  </div>

                  <input type="submit" name="" class="btn btn-primary ml-auto" value="Update Property">
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
@endsection