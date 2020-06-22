@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-6 col-md-6 col-sm-6 col-12">
               <h2 class="textlog">Update Profile</h2>
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
         <form action="{{route('update_profile')}}" name="profile_form" method="POST">
            @csrf
            <div class="row">
               <div class="col-lg-6 col-md-6 col-sm-6 col-12">
                  <div class="form-group">
                     <label>Name</label>
                     <input type="text" name="name" class="form-control" value="{{$user->name}}" required>
                  </div>
                  <div class="form-group">
                     <label>Email</label>
                     <input type="email" name="email" class="form-control" value="{{$user->email}}" required readonly>
                  </div>
                  <h3>Change Password</h3>
                  <div class="form-group">
                     <label>Password</label>
                     <input type="password" name="password" class="form-control" >
                  </div>
                  <div class="form-group">
                     <label>Confirm Password</label>
                     <input type="password" name="confirm_password" class="form-control" >
                  </div>
                  <input type="submit" name="" class="btn btn-primary ml-auto" value="Update Profile">
               </div>
            </div>
         </form>
      </div>
   </section>
</div>
@endsection