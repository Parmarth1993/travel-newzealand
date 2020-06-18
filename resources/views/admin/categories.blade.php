@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
               <h2 class="textlog">Categories</h2>
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
            <a href="/admin/category/add" class="btn btn-primary ml-auto" >Add Category</a>
         </div>
         <div class="card shadow mb-4">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Is Active</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     <tfoot>
                        <tr>
                           <th>Name</th>
                           <th>Description</th>
                           <th>Is Active</th>
                           <th>Actions</th>
                        </tr>
                     </tfoot>
                     <tbody>
                        @foreach($categories as $category)
                        <tr class="plan-{{$category->id}}">
                           <td>{{$category->name}}</td>
                           <td>{{$category->description}}</td>
                           <td>@if($category->active == 1) Yes @else No @endif</td>
                           <td>
                              <a href="/admin/category/edit/{{$category->id}}" >Edit</a>
                              <a href="javascript:vood(0);" data-id="{{$category->id}}" class="delete-plan">Delete</a>
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