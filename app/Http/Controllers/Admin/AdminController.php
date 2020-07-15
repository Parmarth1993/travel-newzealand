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
use App\Questionaire;
use App\Questionnaire;
use App\Travel;
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
        $categories = DB::table('categories')->get();
        $properties = DB::table('properties')
                        ->join('categories', 'categories.id', '=', 'properties.category')
                        ->select(DB::raw('properties.*, categories.name as c_name'));

        if($request->cat_id){
        $properties = $properties->where('properties.category',$request->cat_id);
        }
        
        $properties = $properties->get();
        return view('admin.properties',compact('properties','categories','request'));
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
                $image = $request->experience_image;
                if (strlen($image) > 128) {
                    list($mime, $data)  = explode(';', $image);
                    list(, $data)       = explode(',', $data);
                    $data = base64_decode($data);
                    $mime = explode(':', $mime)[1];
                    $ext = explode('/', $mime)[1];
                    $imageName = time() . '.' . $ext;
                    $success = file_put_contents(public_path() . '/uploads/experience/' . $imageName, $data);
                    $media_name = $imageName;
                    
                }

                $input['image']  = $media_name;
                $input['location'] = serialize($input['location']);
                $card = Experience::create($input);
                return redirect('/admin/experience')->with('success', 'Experience Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/experience/add')->with('error', $e->getMessage());
            }
        } 
        return view('admin.add-experience');    
    }



    public function editExperience(Request $request) {
        $id = $request->id;

        if($request->isMethod('post')) {
            $input = $request->all();
            //$activity_media = $input['activity_media'];
            $destinationPath = public_path('/uploads/experience');
            try {
                 // Image Upload

                $image = $request->experience_image;
                if (strlen($image) > 128) {
                    list($mime, $data)  = explode(';', $image);
                    list(, $data)       = explode(',', $data);
                    $data = base64_decode($data);
                    $mime = explode(':', $mime)[1];
                    $ext = explode('/', $mime)[1];
                    $imageName = time() . '.' . $ext;
                    $success = file_put_contents(public_path() . '/uploads/experience/' . $imageName, $data);
                    $media_name = $imageName;
                    $input['image']  = @$media_name;
                }
                else {
                    $input['image']  = $request->experience_image;
                }
                
                $input = $request->only('title', 'location','address', 'sub_title', 'short_description', 'description');
                $input['location'] = serialize($input['location']);
                
                
                $card = Experience::where(['id' => $id])->update($input);

                return redirect('/admin/experience')->with('success', 'Experience Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/experience/edit/' . $id)->with('error', $e->getMessage());
            }
        } 

        $experience = Experience::where(['id' => $id])->first();
        
        if($experience['location'] && $experience['location'] != null) {
            $experience['location'] = unserialize($experience['location']);
        } else {
            $experience['location'] = array('lat' => '', 'long' => '');
        }

        return view('admin.edit-experience',compact('experience')); 
        
    }


    public function deleteExperience(Request $request){
        $deleteCategory = Experience::where('id',$request->experience_id)->delete();
        return redirect()->back()->with('success','Experience deleted successfully.');
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
                return redirect('/admin/categories')->with('success', 'Category Updated Successfully.');

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
            //echo "<pre>";print_r($input); die();
            try {

                 // Image Upload
                $image = $request->file('logo');
                $logo_name = time().'.'.$image->getClientOriginalExtension();
                $destinationPath = public_path('/uploads/properties');
                $image->move($destinationPath, $logo_name);

                if(isset($input['activity_media_type']) && sizeof($input['activity_media_type']) > 0) {
                    for($i = 0; $i < sizeof($activities); $i++) {
                        $media_name = '';
                        if(isset($input['activity_media_type'][$i])) {
                            if($input['activity_media_type'][$i] == 'image') {

                                if(isset($input['activity_media_image'][$i])) {
                                    $media = $input['activity_media_image'][$i];
                                    $media_name = $i . time().'.'.$media->getClientOriginalExtension();
                                    $media->move($destinationPath, $media_name);
                                }
                            } else {
                                if(isset($input['activity_media_video'][$i])) {
                                    $media_name = $input['activity_media_video'][$i];
                                }
                            }

                            array_push($activitiesData, array('name' => $activities[$i], 'type' => $input['activity_media_type'][$i], 'media' => $media_name));
                        }
                    }
                }
                $input['logo'] = $logo_name;
                $input['activities'] = serialize($activitiesData);
                $input['location'] = serialize($input['location']);
                $input['location_start'] = serialize($input['location_start']);
                $input['location_end'] = serialize($input['location_end']);
                $card = Properties::create($input);
                return redirect('/admin/properties')->with('success', 'Property Created Successfully.');

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
            //$activity_media = $input['activity_media'];
            $activities = $input['activities'];
            $activitiesData = array();
            $destinationPath = public_path('/uploads/properties');
            try {
                 // Image Upload
                if(!empty($request->file('logo')) && isset($request->file)) {
                     $image = $request->file('logo');
                     $name = time().'.'.$image->getClientOriginalExtension();
                     //$destinationPath = public_path('/uploads/profiles');
                     $image->move($destinationPath, $name);

                     $logo = $name;
                } else {
                    $logo = $input['logo2'];
                }

                if(!empty($request->file('bottom_logo'))) {
                    //echo "upload logo  2";
                     $image = $request->file('bottom_logo');
                     $name_logo2 = time().'.'.$image->getClientOriginalExtension();
                    // $destinationPath = public_path('/uploads/profiles');
                     $image->move($destinationPath, $name_logo2);
                     //echo $name_logo2; die();
                     //$input['bottom_logo'] = $name_logo2;
                } else {
                    $name_logo2 = $input['bottom_logo2'];
                }


                for($i = 0; $i < sizeof($activities); $i++) {

                    if($input['activity_media_type'][$i] == 'image') {

                        if(!empty($input['activity_media_image'][$i]) && isset($input['activity_media_image'][$i])) {
                            $media = $input['activity_media_image'][$i];
                            $media_name = $i . time().'.'.$media->getClientOriginalExtension();
                            $media->move($destinationPath, $media_name);
                        } else {
                            $media_name = $input['activity_media_image_hidden'][$i];
                        }
                        
                    } else {
                        //$media_name = $input['activity_media_video'][$i];
                        if(!empty($input['activity_media_video'][$i]) && isset($input['activity_media_video'][$i])) {
                            $media_name = $input['activity_media_video'][$i];
                        } else {
                            $media_name = $input['activity_media_image_hidden'][$i];
                        }
                    }

                    array_push($activitiesData, array('name' => $activities[$i], 'type' => $input['activity_media_type'][$i], 'media' => $media_name));
                }
                $input = $request->only('name', 'location','address', 'logo', 'bottom_logo', 'category','activities', 'type', 'about', 'highlights');
                $input['activities'] = serialize($activitiesData);
                $input['location'] = serialize($input['location']);
                 /*echo "<pre>";
                print_r($input);
                die();*/
                $card = Properties::where(['id' => $id])
                        ->update(['name' => $input['name'],
                         'location' => $input['location'],
                         'address' => $input['address'], 
                         'logo' => $logo,
                         'bottom_logo' => $name_logo2,
                         'category' => $input['category'],
                         'activities' => $input['activities'],
                         'type' => $input['type'],
                         'about' => $input['about'],
                         'highlights' => $input['highlights']]);
                return redirect('/admin/properties')->with('success', 'Property Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/properties/edit/' . $id)->with('error', $e->getMessage());
            }
        } 


        $property = Properties::where(['id' => $id])->first();
        $property['activities'] = unserialize($property['activities']);
        if($property['location'] && $property['location'] != null) {
            $property['location'] = unserialize($property['location']);
        } else {
            $property['location'] = array('lat' => '', 'long' => '');
        }
        if($property['location_start'] && $property['location_start'] != null) {
            $property['location_start'] = unserialize($property['location_start']);
        } else {
            $property['location_start'] = array('lat' => '', 'long' => '');
        }
        if($property['location_end'] && $property['location_end'] != null) {
            $property['location_end'] = unserialize($property['location_end']);
        } else {
            $property['location_end'] = array('lat' => '', 'long' => '');
        }
        $categories = Categories::where(['active' => 1])->get();

        return view('admin.edit-property')->with(['property' => $property, 'categories' => $categories]);  
    }

    public function profile(Request $request) {
        if($request->isMethod('post')) {
            $input = $request->all();
            $update = User::where(['id' => Auth::user()->id])
                        ->update(['name' => $input['name']]);
            //if updating password
            if($input['password'] != null) {
                if($input['password'] == $input['confirm_password']) {
                    User::where(['id' => Auth::user()->id])
                                ->update(['password' => Hash::make($input['password'])]);
                    return redirect('/admin/profile')->with('success', 'Profile updated successfully.');
                } else {
                    return redirect('/admin/profile')->with('error', 'Password and confirm password not matched.');
                }
            }
            return redirect('/admin/profile')->with('success', 'Profile updated successfully.');
        }
        $user = User::where(['id' => Auth::user()->id])->first();
        return view('admin.profile')->with(['user' => $user]);  
    }


    public function questionaireList(Request $request) {
        $question_list = Questionnaire::orderBy('id','desc')->get();
        return view('admin.question')->with(['question_list' => $question_list]);   
    }
    
    
    public function deleteProperty(Request $request){
        $deletePropert = DB::table('properties')->where('id',$request->property_id)->delete();
        return redirect()->back()->with('success','Property deleted successfully.');
    }
    
    public function deleteCategory(Request $request){
        $deleteCategory = DB::table('categories')->where('id',$request->category_id)->delete();
        return redirect()->back()->with('success','Category deleted successfully.');
    }
    
    public function travelType(Request $request) {
        $tavels = Travel::all();
        return view('admin.travel-type',compact('tavels'));

    }


    public function addTravelType(Request $request) {
        if($request->isMethod('post')) {
            $input = $request->all();
            try {
                // Image Upload
                $image = $request->experience_image;
                if (strlen($image) > 128) {
                    list($mime, $data)  = explode(';', $image);
                    list(, $data)       = explode(',', $data);
                    $data = base64_decode($data);
                    $mime = explode(':', $mime)[1];
                    $ext = explode('/', $mime)[1];
                    $imageName = time() . '.' . $ext;
                    $success = file_put_contents(public_path() . '/uploads/travel_type/' . $imageName, $data);
                    $media_name = $imageName;
                    
                }

                $input['image']  = $media_name;
                $input['location'] = serialize($input['location']);
                $card = Travel::create($input);
                return redirect('/admin/travel-type')->with('success', 'Travel Type Created Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/travel-type/add')->with('error', $e->getMessage());
            }
        } 
        return view('admin.add-travel-type');
    }



    public function editTravelType(Request $request) {
        $id = $request->id;

        if($request->isMethod('post')) {
            $input = $request->all();
            //$activity_media = $input['activity_media'];
            $destinationPath = public_path('/uploads/experience');
            try {
                 // Image Upload

                $image = $request->experience_image;
                if (strlen($image) > 128) {
                    list($mime, $data)  = explode(';', $image);
                    list(, $data)       = explode(',', $data);
                    $data = base64_decode($data);
                    $mime = explode(':', $mime)[1];
                    $ext = explode('/', $mime)[1];
                    $imageName = time() . '.' . $ext;
                    $success = file_put_contents(public_path() . '/uploads/travel_type/' . $imageName, $data);
                    $media_name = $imageName;
                    $input['image']  = @$media_name; 
                }
                else {
                   $input['image']  = @$request->experience_image;
                }
                
                $input = $request->only('title', 'location','address', 'sub_title','description');
                $input['location'] = serialize($input['location']);
                
                
                $card = Travel::where(['id' => $id])->update($input);

                return redirect('/admin/travel-type')->with('success', 'Travel Type Updated Successfully.');

            } catch(Exception $e) {
                return redirect('/admin/travel-type/edit/' . $id)->with('error', $e->getMessage());
            }
        } 

        $travel = Travel::where(['id' => $id])->first();
        if($travel['location'] && $travel['location'] != null) {
          $travel['location'] = unserialize($travel['location']);
        } else {
            $travel['location'] = array('lat' => '', 'long' => '');
        }

        return view('admin.edit-travel-type',compact('travel'));  
    }


    public function deleteTravelType(Request $request){
        $deleteTravel = Travel::where('id',$request->travel_id)->delete();
        return redirect()->back()->with('success','Travel Type deleted successfully.');
    }
}