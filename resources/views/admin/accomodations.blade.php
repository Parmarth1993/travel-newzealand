@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
               <h2 class="textlog">Accomodations</h2>
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
         <div class="form-group d-flex">                                
            <a href="/admin/accomodation/add" class="btn btn-primary ml-auto" >Add Accomodation</a>
         </div>
         <div class="card shadow mb-4">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Actions</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        @foreach($accomodations as $accomodation)
                        <tr class="plan-{{$accomodation->id}}">
                           <td>{{$accomodation->name}}</td>
                           <td>{{$accomodation->description}}</td>
                           <td>
                              <a href="/admin/accomodation/edit/{{$accomodation->id}}" >Edit</a>
                              <a href="javascript:vood(0);" data-id="{{$accomodation->id}}" class="delete-plan">Delete</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection