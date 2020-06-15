<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Accomodations;
use App\Properties;
use App\Highlights;
use App\Itineraries;

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

    public function welcome()
    {
        $properties = DB::table('properties')
                        ->join('accomodations', 'accomodations.id', '=', 'properties.accommodation')
                        ->join('highlights', 'highlights.id', '=', 'properties.highlight')
                        ->join('itineraries', 'itineraries.id', '=', 'properties.itineraries')
                        ->select(DB::raw('properties.*, accomodations.name as accname, accomodations.description as accdescription, highlights.name as highname, highlights.description as highdesc,itineraries.name as itname, itineraries.description as itdescription'))
                        ->get();               
        return view('welcome')->with([ "properties" => $properties]);
    }

}
