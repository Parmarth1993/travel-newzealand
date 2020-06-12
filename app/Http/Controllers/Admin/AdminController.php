<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use App\User;
use App\Accomodations;
use App\Properties;
use App\Highlights;
use App\Itineraries;

class AdminController extends Controller
{

	public function __construct() {
        $this->middleware(['auth','verified', 'admin']);
    }

	public function index(Request $request) {
    	//$profile = User::where(['id' => Auth::user()->id])->first();
    	return view('admin.index');
    }

    public function properties(Request $request) {
        $properties = Properties::all();
        return view('admin.properties')->with([ "properties" => $properties]); 
    }

    public function accomodations(Request $request) {
    	$accomodations = Accomodations::all();
    	return view('admin.accomodations')->with([ "accomodations" => $accomodations]);	
    }

    public function highlights(Request $request) {
    	$highlights = Highlights::all();
    	return view('admin.highlights')->with([ "highlights" => $highlights]);	
    }

    public function itineraries(Request $request) {
    	$itineraries = Itineraries::all();
    	return view('admin.itineraries')->with([ "itineraries" => $itineraries]);	
    }

    public function addAccomodation(Request $request) {
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Accomodations::create($input);
                return redirect('/admin/accomodations')->with('success', 'Accomodation Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/accomodation/add')->with('error', $e->getMessage());
            }
        } 
    	return view('admin.add-accomodation');	
    }

    public function addProperties(Request $request) {
        if($request->isMethod('post')) {
            $input = $request->all();
            //print_r($request->logo);die;
            try {

                 // Image Upload
                 $image = $request->file('logo');
                 $name = time().'.'.$image->getClientOriginalExtension();
                 $destinationPath = public_path('/uploads/profiles');
                 $image->move($destinationPath, $name);

                 $input['logo'] = $name;

                $card = Properties::create($input);
                return redirect('/admin/properties')->with('success', 'Properties Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/properties/add')->with('error', $e->getMessage());
            }
        } 
        $accomodations = Accomodations::all();
        $highlights = Highlights::all();
        $itineraries = Itineraries::all();

        return view('admin.add-properties')->with([ "accomodations" => $accomodations, "highlights" => $highlights, "itineraries" => $itineraries]);  
    }

    public function addHighlight(Request $request) {
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Highlights::create($input);
                return redirect('/admin/highlights')->with('success', 'Highlight Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/highlight/add')->with('error', $e->getMessage());
            }
        } 
    	return view('admin.add-highlight');	
    }

    public function addItinerarie(Request $request) {
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Itineraries::create($input);
                return redirect('/admin/itineraries')->with('success', 'Itinerarie Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/itinerarie/add')->with('error', $e->getMessage());
            }
        } 
    	return view('admin.add-itinerarie');	
    }

    public function editAccomodation(Request $request) {
        $id = $request->id;
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Accomodations::where(['id' => $id])
                		->update(['name' => $input['name'], 'description' => $input['description']]);
                return redirect('/admin/accomodations')->with('success', 'Accomodation Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/accomodation/edit/' . $id)->with('error', $e->getMessage());
            }
        } 
        $accomodation = Accomodations::where(['id' => $id])->first(); 
    	return view('admin.edit-accomodation')->with(['accomodation' => $accomodation]);	
    }

    public function editHighlight(Request $request) {
        $id = $request->id;
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Highlights::where(['id' => $id])
                		->update(['name' => $input['name'], 'description' => $input['description']]);
                return redirect('/admin/highlights')->with('success', 'Highlight Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/highlight/edit/' . $id)->with('error', $e->getMessage());
            }
        } 
    	$highlight = Highlights::where(['id' => $id])->first(); 
    	return view('admin.edit-highlight')->with(['highlight' => $highlight]);		
    }

    public function editItinerarie(Request $request) {
        $id = $request->id;
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Itineraries::where(['id' => $id])
                		->update(['name' => $input['name'], 'description' => $input['description']]);
                return redirect('/admin/itinerarie')->with('success', 'Itinerarie Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/itinerarie/edit/' . $id)->with('error', $e->getMessage());
            }
        } 
    	$itinerarie = Itineraries::where(['id' => $id])->first(); 
    	return view('admin.edit-itinerarie')->with(['itinerarie' => $itinerarie]);	
    }
}