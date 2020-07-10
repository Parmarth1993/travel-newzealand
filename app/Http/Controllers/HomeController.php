<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Accomodations;
use App\Properties;
use App\Highlights;
use App\Itineraries;
use App\Categories;
use App\Experience;
use App\Questionaire;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }
  
  public function about()
    {
        return view('about');
    }
  
  public function whyUs()
    {
        return view('why-us');
    }
  
  public function faq()
    {
        return view('faq');
    }
  
  public function experiences()
    {
        return view('experiences');
    }
  
  public function accommodations()
    {
        return view('accommodations');
    }
  
  public function quiz()
    {
      $experiences = Experience::all();
                           
        return view('quiz')->with(['experiences' => $experiences]);   

    }

  
    public function welcome()
    {
        $accomodations = array();
        $highlights = array();
        $itineraries = array();
        $categories = Categories::where(['active' => 1])->get();
        $experiences = Experience::all();
        // foreach ($categories as $key => $value) {
        //     # code...
        //     if($value->name == 'Accomodations'){
        //         $accdesc = ($value->description) ? ($value->description) : '';
        //     }else if($value->name == 'Highlights'){
        //         $highdesc =($value->description) ? ($value->description) : '';
        //     }else if($value->name == 'Itineraries'){
        //         $itdesc = ($value->description) ?  ($value->description) : '';
        //     }else{

        //     }
        // }
        $properties = DB::table('properties')
                        //->join('accomodations', 'accomodations.id', '=', 'properties.accommodation')
                        //->join('highlights', 'highlights.id', '=', 'properties.highlight')
                        //->join('itineraries', 'itineraries.id', '=', 'properties.itineraries')
                        //->select(DB::raw('properties.*, accomodations.name as accname, accomodations.description as accdescription, highlights.name as highname, highlights.description as highdesc,itineraries.name as itname, itineraries.description as itdescription'))
                        ->get();
        foreach ($properties as $key => $value) {
                                           # code...
                  $value->location    = unserialize($value->location); 
                  $value->activities  = unserialize($value->activities);   
                  $value->location_start    = unserialize($value->location_start); 
                  $value->location_end    = unserialize($value->location_end); 
                  if($value->category == '1'){
                    array_push($accomodations, $value);
                  } else if($value->category == '2'){
                    array_push($highlights, $value);
                  } else {
                    array_push($itineraries, $value);
                  }
        }                                
        return view('welcome')->with([ 'itineraries' => $itineraries, 'highlights' => $highlights, 'accomodations' => $accomodations, 'categories' => $categories, 'experiences' => $experiences]);
    }


    public function questionaire(){

      $accomodations = array();
        $highlights = array();
        $itineraries = array();
        $categories = Categories::where(['active' => 1])->get();
        $experiences = Experience::all();
        // foreach ($categories as $key => $value) {
        //     # code...
        //     if($value->name == 'Accomodations'){
        //         $accdesc = ($value->description) ? ($value->description) : '';
        //     }else if($value->name == 'Highlights'){
        //         $highdesc =($value->description) ? ($value->description) : '';
        //     }else if($value->name == 'Itineraries'){
        //         $itdesc = ($value->description) ?  ($value->description) : '';
        //     }else{

        //     }
        // }
        $properties = DB::table('properties')
                        //->join('accomodations', 'accomodations.id', '=', 'properties.accommodation')
                        //->join('highlights', 'highlights.id', '=', 'properties.highlight')
                        //->join('itineraries', 'itineraries.id', '=', 'properties.itineraries')
                        //->select(DB::raw('properties.*, accomodations.name as accname, accomodations.description as accdescription, highlights.name as highname, highlights.description as highdesc,itineraries.name as itname, itineraries.description as itdescription'))
                        ->get();
        foreach ($properties as $key => $value) {
                                           # code...
                  $value->location    = unserialize($value->location); 
                  $value->activities  = unserialize($value->activities);   
                  if($value->category == '1'){
                    array_push($accomodations, $value);
                  } else if($value->category == '2'){
                    array_push($highlights, $value);
                  } else {
                    array_push($itineraries, $value);
                  }
        }                               
        return view('questionaire')->with([ 'itineraries' => $itineraries, 'highlights' => $highlights, 'accomodations' => $accomodations, 'categories' => $categories, 'experiences' => $experiences]);
      
    }


    public function addQuestionaire(Request $request){
      if($request->isMethod('post')) {
            
            try {
                $addQuestionaire = new Questionaire;
                $addQuestionaire->total_people = $request->total_people;
                $addQuestionaire->travel_date = $request->travel_date;
                $addQuestionaire->flying_from = $request->flying_from;
                $addQuestionaire->stay_length = $request->stay_length;
                $addQuestionaire->physical_challenge = $request->physical_challenge;
                $addQuestionaire->trip_type = $request->trip_type;
                $addQuestionaire->interest = $request->interest;
                $addQuestionaire->accomodation_type = $request->accomodation;
                $addQuestionaire->special_request = $request->special_request;
                $addQuestionaire->name = $request->name;
                $addQuestionaire->email = $request->email;
                $addQuestionaire->save();

                $send_mail = $this->sendMail($request); //sending mail
              
                return redirect()->back()->with('success', 'Questionnaire added successfully...!!');

            } catch(\Exception $e) {
                return redirect()->back()->with('error', $e->getMessage());
            }
        } 
    }


    public function sendMail($request) {
      try {
          $details = [
            'title' => 'Questionaire is uploaded',
            'body' => 'A questionaire is uploaded please check'
          ];
             
          \Mail::to($request->email)->send(new \App\Mail\SendMail($details));
          \Mail::to('sagar@yopmail.com')->send(new \App\Mail\AdminMail($details));
          return true;

        } catch(\Exception $e) {
            return false;
          }
    }
   

}
