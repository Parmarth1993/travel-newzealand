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
            {{-- <a href="{{ route('add_properties') }}" class="btn btn-primary mr-auto" >Add Properties</a> --}}
            <form method="get" action="" id="prop_form">
               <select class="btn btn-primary mr-auto category" name="cat_id">
                  <option value="">Select Category</option>
                  @foreach($categories as $category)
                   <option value="{{$category->id}}" @if($request->cat_id == $category->id) selected @endif>{{$category->name}}</option>
                  @endforeach
               </select>
            </form>
            

            <a href="{{ route('add_properties') }}" class="btn btn-primary ml-auto" >Add Properties</a>
         </div>
          <div class="card shadow mb-4">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered dataTable addaddress" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Name</th>
                           <th>Address</th>
                           <th>Type</th>
                           <th>Category</th>
                           <th>Actions</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                        @foreach($properties as $property)
                        <tr class="plan-{{$property->id}}">
                           <td>{{$property->name}}</td>
                           <td>{{$property->address}}</td>
                           <td>{{$property->type}}</td>
                           <td>{{$property->c_name}}</td>
                           
                           <td>
                              <a href="{{route('edit_properties',$property->id)}}" >Edit</a>
                              <a href="javascript:void(0);" data-id="{{$property->id}}" class="delete-btn">Delete</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <form method="post" action="{{route('delete_property')}}" id="del-form">
                  @csrf
                     <input type="hidden" name="property_id" id="id_property">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection