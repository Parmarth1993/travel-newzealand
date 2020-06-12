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
                     <label>Description</label>
                     <textarea name="description" class="form-control" required>{{$property->description}}</textarea>
                  </div>
                  <div class="form-group">
                     <label>Select Logo</label>
                     <input type="file" name="logo" id="file-upload" class="file">
                     <input type="hidden" name="logo2" value="{{$property->logo}}">
                     <img src="/uploads/profiles/{{$property->logo}}" width="150" style="border: 1px solid #000">
                  </div>
                  <div class="form-group">
                     <label>Select Accomodation</label>
                     <select name="accommodation" class="form-control">
                        <option value="">Select Accomodation</option>
                        @foreach($accomodations as $accomodation)
                         <option value="{{$accomodation->id}}" @if($accomodation->id == $property->accommodation) selected='selected' @endif>{{$accomodation->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Select Highlight</label>
                     <select name="highlight" class="form-control">
                        <option value="">Select Highlight</option>
                        @foreach($highlights as $highlight)
                         <option value="{{$highlight->id}}"  @if($highlight->id == $property->highlight) selected='selected' @endif>{{$highlight->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Select Itineraries</label>
                     <select name="itineraries" class="form-control">
                        <option value="">Select Itineraries</option>
                        @foreach($itineraries as $itinerary)
                         <option value="{{$itinerary->id}}"  @if($itinerary->id == $property->itineraries) selected='selected' @endif>{{$itinerary->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
                     <label>Select Activities</label>
                     <input type="checkbox" name="activities[]" value="Helicopter" <?php if(in_array("Helicopter", unserialize($property->activities))) { echo 'checked="checked"'; }?>>Helicopter
                     <input type="checkbox" name="activities[]" value="Hili Area" <?php if(in_array("Hili Area", unserialize($property->activities))) { echo 'checked="checked"'; }?>>Hili Area
                     <input type="checkbox" name="activities[]" value="Fishing" <?php if(in_array("Fishing", unserialize($property->activities))) { echo 'checked="checked"'; }?>>Fishing
                     <input type="checkbox" name="activities[]" value="Food" <?php if(in_array("Food", unserialize($property->activities))) { echo 'checked="checked"'; }?>>Food
                     <input type="checkbox" name="activities[]" value="Army" <?php if(in_array("Army", unserialize($property->activities))) { echo 'checked="checked"'; }?>>Army
                     <input type="checkbox" name="activities[]" value="Religion" <?php if(in_array("Religion", unserialize($property->activities))) { echo 'checked="checked"'; }?>>Religion
                     <input type="checkbox" name="activities[]" value="Videos" <?php if(in_array("Videos", unserialize($property->activities))) { echo 'checked="checked"'; }?>>Videos
                  </div>
                  <div class="form-group">
                     <label>Select Type</label>
                     <select name="type" class="form-control" required>
                        <option value="">Select Type</option>
                        <option value="Luxury" @if("Luxury" == $property->type) selected='selected' @endif>Luxury</option>
                        <option value="Premium" @if("Premium" == $property->type) selected='selected' @endif>Premium</option>
                     </select>
                  </div>
                  <input type="submit" name="" class="btn btn-primary ml-auto" value="Add Property">
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
@endsection