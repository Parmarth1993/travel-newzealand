@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
               <h2 class="textlog">Properties</h2>
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
            <a href="/admin/properties/add" class="btn btn-primary ml-auto" >Add Properties</a>
         </div>
          <div class="card shadow mb-4">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Address</th>
                           <th>Type</th>
                           <th>Category</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>Name</th>
                           <th>Address</th>
                           <th>Type</th>
                           <th>Category</th>
                           <th>Actions</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        @foreach($properties as $property)
                        <tr class="plan-{{$property->id}}">
                           <td>{{$property->name}}</td>
                           <td>{{$property->address}}</td>
                           <td>{{$property->type}}</td>
                           <td>{{$property->category}}</td>
                           <td>
                              <a href="/admin/properties/edit/{{$property->id}}" >Edit</a>
                              <a href="javascript:vood(0);" data-id="{{$property->id}}" class="delete-plan">Delete</a>
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