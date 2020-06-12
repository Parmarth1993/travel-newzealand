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
                     <label>Description</label>
                     <textarea name="description" class="form-control" value="" required></textarea>
                  </div>
                  <div class="form-group">
                     <label>Select Logo</label>
                     <input type="file" name="logo" id="file-upload" class="file" required>
                  </div>
                  <div class="form-group">
                     <label>Select Accomodation</label>
                     <select name="accommodation" class="form-control">
                        <option value="">Select Accomodation</option>
                        @foreach($accomodations as $accomodation)
                         <option value="{{$accomodation->id}}">{{$accomodation->name}}</option>
                        @endforeach
                     </select>
                  </div>
                  <div class="form-group">
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
                  </div>
                  <div class="form-group">
                     <label>Select Activities</label>
                     <input type="checkbox" name="activities[]" value="Helicopter">Helicopter
                     <input type="checkbox" name="activities[]" value="Hili Area">Hili Area
                     <input type="checkbox" name="activities[]" value="Fishing">Fishing
                     <input type="checkbox" name="activities[]" value="Food">Food
                     <input type="checkbox" name="activities[]" value="Army">Army
                     <input type="checkbox" name="activities[]" value="Religion">Religion
                     <input type="checkbox" name="activities[]" value="Videos">Videos
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
@endsection