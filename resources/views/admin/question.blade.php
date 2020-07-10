@extends('layouts.app-admin')
@section('content')
<div id="page-content-wrapper">
   <section class="maindiv">
      <div class="container">
         <div class="row headingtop">
            <div class="col-lg-4 col-md-4 col-sm-4 col-12">
               <h2 class="textlog">Questionnaire</h2>
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
         {{-- <div class="form-group d-flex">                                
            <a href="/admin/category/add" class="btn btn-primary ml-auto" ></a>
         </div> --}}
         <div class="card shadow mb-4">
            <div class="card-body">
               <div class="table-responsive">
                  <table class="table table-bordered dataTable" id="dataTable" width="100%" cellspacing="0">
                     <thead>
                        <tr>
                           <th>Adults</th>
                           <th>Travel Date</th>
                           <th>Stay Length</th>

                           <th>Trip Cost</th>
                           <th>Name</th>
                           <th>Email</th>
                        </tr>
                     </thead>
                     {{-- <tfoot>
                        <tr>
                           <th>Adults</th>
                           <th>Travel Date</th>
                           <th>Stay Length</th>

                           <th>Trip Cost</th>
                           <th>Name</th>
                           <th>Email</th>
                        </tr>
                     </tfoot> --}}
                     <tbody>
                        @foreach($question_list as $list)
                        <tr class="plan-{{$list->id}}">
                           <td>{{$list->adults}}</td>
                           <td>{{$list->start_date}}</td>
                           <td>{{$list->length_stay}}</td>
                           <td>{{$list->cost_trip}}</td>
                           <td>{{$list->name}}</td>
                           <td>{{$list->email}}</td>
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