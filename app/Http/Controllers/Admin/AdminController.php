<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

use DB;
use App\User;
use App\Properties;
use App\Categories;
use App\Experience;
//use App\Accomodations;
//use App\Highlights;
//use App\Itineraries;

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
        $properties = DB::table('properties')
        				->join('categories', 'categories.id', '=', 'properties.category')
        				->select(DB::raw('properties.*, categories.name as c_name'))
        				->get();
        return view('admin.properties')->with([ "properties" => $properties]); 
    }

    public function categories(Request $request) {
    	$categories = Categories::all();
    	return view('admin.categories')->with(['categories' => $categories]);	
    }

    public function experience(Request $request) {
        $experiences = Experience::all();
        return view('admin.experience')->with(['experiences' => $experiences]);   
    }

    public function addExperience(Request $request) {
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
                 // Image Upload
                $image = $request->file('image');
                $logo_name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/experience');
                $image->move($destinationPath, $logo_name);

                $input['image']  = $logo_name;
                $card = Experience::create($input);
                return redirect('/admin/experience')->with('success', 'Experience Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/experience/add')->with('error', $e->getMessage());
            }
        } 
    	return view('admin.add-experience');	
    }

    public function addCategory(Request $request) {
        if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Categories::create($input);
                return redirect('/admin/categories')->with('success', 'Category Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/category/add')->with('error', $e->getMessage());
            }
        } 
        return view('admin.add-category');  
    }

    public function editCategory(Request $request) {
        $id = $request->id;
    	if($request->isMethod('post')) {
            $input = $request->all();
            try {
               
                $card = Categories::where(['id' => $id])
                		->update(['name' => $input['name'], 'description' => $input['description'], 'active' => $input['active']]);
                return redirect('/admin/categories')->with('success', 'Itinerarie Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/category/edit/' . $id)->with('error', $e->getMessage());
            }
        } 
    	$category = Categories::where(['id' => $id])->first(); 
    	return view('admin.edit-category')->with(['category' => $category]);	
    }

    public function addProperties(Request $request) {
        if($request->isMethod('post')) {
            $input = $request->all();
            $activities = $input['activities'];
            $activitiesData = array();
            
            try {

                 // Image Upload
                $image = $request->file('logo');
                $logo_name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/properties');
                $image->move($destinationPath, $logo_name);

                for($i = 0; $i < sizeof($activities); $i++) {

                	if($input['activity_media_type'][$i] == 'image') {

	                	$media = $input['activity_media_image'][$i];
	                	$media_name = $i . time().'.'.$media->getClientOriginalExtension();
		                $media->move($destinationPath, $media_name);
			            
                	} else {
                		$media_name = $input['activity_media_video'][$i];
                	}

		            array_push($activitiesData, array('name' => $activities[$i], 'type' => $input['activity_media_type'][$i], 'media' => $media_name));
                }

                $input['logo'] = $logo_name;
                $input['activities'] = serialize($activitiesData);
                $input['location'] = serialize($input['location']);
                $card = Properties::create($input);
                return redirect('/admin/properties')->with('success', 'Properties Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/properties/add')->with('error', $e->getMessage());
            }
        } 

        $categories = Categories::where(['active' => 1])->get();
        return view('admin.add-properties')->with(['categories' => $categories]);  
    }

    public function editProperties(Request $request) {
     	$id = $request->id;
        if($request->isMethod('post')) {
            $input = $request->all();
            $activity_media = $input['activity_media'];
            $activities = $input['activities'];
            $activitiesData = array();
            $destinationPath = public_path('/uploads/properties');
            try {
                 // Image Upload
            	if(!empty($request->file('logo')) && isset($request->file)) {
	                 $image = $request->file('logo');
	                 $name = time().'.'.$image->getClientOriginalExtension();
	                 $destinationPath = public_path('/uploads/profiles');
	                 $image->move($destinationPath, $name);

	                 $input['logo'] = $name;
	            } else {
	             	$input['logo'] = $input['logo2'];
	            }


	            for($i = 0; $i < sizeof($activities); $i++) {

	            	if(!empty($input['activity_media'][$i]) && isset($input['activity_media'][$i])) {
	                	$media = $input['activity_media'][$i];
	                	$media_name = $i . time().'.'.$media->getClientOriginalExtension();
		                $media->move($destinationPath, $media_name);
			            
		                array_push($activitiesData, array('name' => $activities[$i], 'type' => $input['activity_media_type'][$i], 'media' => $media_name));

		            } else {
		            	array_push($activitiesData, array('name' => $activities[$i], 'type' => $input['activity_media_type'][$i], 'media' => $input['activity_media_hidden'][$i]));
		            }

                }

	            $input = $request->only('name', 'location','address', 'logo','category','activities', 'type', 'about', 'highlights');
                $input['activities'] = serialize($activitiesData);
	            $card = Properties::where(['id' => $id])
                		->update($input);
                return redirect('/admin/properties')->with('success', 'Properties Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/properties/edit/' . $id)->with('error', $e->getMessage());
            }
        } 


        $property = Properties::where(['id' => $id])->first();
        $property['activities'] = unserialize($property['activities']);
        $categories = Categories::where(['active' => 1])->get();

        return view('admin.edit-property')->with(['property' => $property, 'categories' => $categories]);  
    }
}