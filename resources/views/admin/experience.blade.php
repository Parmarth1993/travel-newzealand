@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
               <h2 class="textlog">Experience</h2>
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
            
            <a href="{{ route('add_experience') }}" class="btn btn-primary ml-auto" >Add Experiences</a>
         </div>
          <div class="card shadow mb-4">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Title</th>
                           <th>Sub Title</th>
                           <th>Address</th>
                           {{-- <th>Description</th> --}}
                           <th>Actions</th>
                        </tr>
                     </thead>
                     
                     <tbody>
                        @foreach($experiences as $experience)
                        <tr class="exp-{{@$experience->id}}">
                           <td>{{@$experience->title}}</td>
                           <td>{{@$experience->sub_title}}</td>
                           <td>{{@$experience->address}}</td>
                           {{-- <td>{{@$experience->description}}</td> --}}
                           
                           <td>
                              <a href="{{route('edit_experience',$experience->id)}}" >Edit</a>
                              <a href="javascript:void(0);" data-id="{{$experience->id}}" class="delete-btn">Delete</a>
                           </td>
                        </tr>
                        @endforeach
                     </tbody>
                  </table>
                  <form method="post" action="{{route('delete_experience')}}" id="del-form">
                  @csrf
                     <input type="hidden" name="experience_id" id="id_property">
                  </form>
               </div>
            </div>
         </div>
      </div>
   </section>
</div>
@endsection