<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use App\Models\{Project, Property_source, Property_status, Property_Type, Bedroom, Property,City,PostUser,Subscriber,Testimonial,Service};
use Session;
use GuzzleHttp\Client;
use DB;

class HomeController extends Controller
{
    public function index(){
        $projects = Property::orderBy('id', 'desc')
        ->take(6)
        ->get();
        $projects->each(function ($project) {
            $configurations = json_decode($project->configuration);
            $configArray = (array) $configurations;
            $project->configuration = $configArray;
    });
        $projects->each(function ($project) {
            $project->images = explode(',', $project->images);
        });

        $testimonials = Testimonial::take(5)->get();
      return view('frontend.home',compact('projects','testimonials'));
    }

    public function sell_property(){

        $result = DB::table('property__types')
            ->select('property__types.id as typeId','property__types.name as type_name','property__types.configuration','configurations.name')
            ->leftjoin('configurations', function ($join) {
                $join->whereRaw("FIND_IN_SET(configurations.id, property__types.configuration)");
            })->get();
              $result->each(function ($config) {
                $config->configuration = explode(',', $config->configuration);
            });
            $groupedConfigurations = $result->groupBy('typeId');
            $configurations = $groupedConfigurations->map->first();
        $property_types =Property_Type::all();
        $bedrooms =Bedroom::all();
        $property_status =Property_status::all();
        $property_sources =Property_source::all();
        $property_sources =Property_source::all();
        $post_users =PostUser::all();

        // check the subscriber
        $user_id = Session::get('user_id');
        $get_property = Property::where('user_id', $user_id)->get();
        $property_count = $get_property->count();
        $subscriber = Subscriber::where('user_id',$user_id)->first();
        if (Session::has('user_id')) {

            return view('frontend.sell_property',compact('property_types','bedrooms','property_status','property_sources','configurations','post_users','property_count','subscriber'));
        }
        else{
            return redirect()->route('loginpage');
        }
    }

    public function sell_property_store(Request $request){
        $request->validate([
            'property_type' => 'required',
            'configuration' => 'sometimes|array',
            'configuration.*' => 'required',
            'property_area'=>'required',
            'property_name' => 'required|min:5|max:50',
            'property_location'=>'required|min:3|max:10',
            'price'=>'required|max:9',
            'property_source'=>'required',
            'property_status'=>'required',
            'seller_message' => 'required|min:10|max:350',
            'image'=>'required',
            'post_user'=>'required',
        ],[
            'configuration.*' => 'This field is required',
        ]);

        $user_id = Session::get('user_id');
        $get_property = Property::where('user_id', $user_id)->get();
        $property_count = $get_property->count();
        $subscriber = Subscriber::where('user_id',$user_id)->first();

          if($property_count > 0 && $subscriber == null){
            return response()->json(['status'=> 0,'error'=>'something went wrong']);
          }

        $jsonConfiguration = json_encode($request->configuration);

        $images = $request->file('image');
        $myarray = [];
        foreach ($images as $image) {
            $tempName = uniqid('profile_', true) . '.' . $image->getClientOriginalExtension();
            $path = $image->storeAs('uploads', $tempName, 'public');
            array_push($myarray,$path);
        }
        $image_string = implode(",",$myarray);

        $code = $request->property_location;
        $pin_code = (int)$code;

        // code check
        $countryCode = 'IN'; // ISO 3166-1 alpha-2 country code for India
        $url = "https://nominatim.openstreetmap.org/?format=json&addressdetails=1&q={$code}&format=json&limit=1&countrycodes={$countryCode}";
            $client = new Client();
            $response = $client->get($url);
            $data = json_decode($response->getBody(), true);
            if($data == []){
                return response()->json(['status'=> 0,'key'=>'property_location','error'=>'Pin Code is Invalid']);
            }
            else{
                $arr = $data[0]['address'];
                $keysToRemove = ['country_code','ISO3166-2-lvl4','postcode','country'];
                $addressArray = array_diff_key($arr, array_flip($keysToRemove));
                $address = implode(',',$addressArray);

        $property = Property::create([
            'user_id'=>$request->user_id,
            'porperty_name'=>$request->property_name,
            'property_type'=>$request->property_type,
            'property_location'=>$address,
            'property_status'=>$request->property_status,
            'property_source'=>$request->property_source,
            'configuration'=>$jsonConfiguration,
            'bedroom'=>$request->Bedroom,
            'bathroom'=>$request->Bathroom,
            'area'=>$request->property_area,
            'message'=>$request->seller_message,
            'price'=>$request->price,
            'pin_code'=>$pin_code,
            'images'=>$image_string,
            'post_user'=>$request->post_user,
            'category'=>$request->seller_value,
          ]);

          if($property){
            return response()->json(['status'=> 1,'success'=>'successful']);
          }
        }
    }

    function listProperty($id){
        $property_type_id = decrypt($id);
        $property_status = Property_status::all();
        $cities = City::all();
        $post_users = PostUser::all();
        $property_type = Property_Type::where('id',$property_type_id)->first();
        $properties = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->where('properties.property_type',$property_type_id)
              ->select('properties.id','property__types.name as type','property_status.name as status','properties.porperty_name','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.bedroom','properties.bathroom','properties.images','properties.configuration')
              ->paginate(18);
        $properties->each(function ($property) {
            $configurations = json_decode($property->configuration);
            $configArray = (array) $configurations;
            $property->configuration = $configArray;
    });
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
    });

        return view('frontend.propertyList',compact('post_users','cities','property_status','properties','property_type'));
    }

    public function propertyDetail($id){
        $pro_id = decrypt($id);
        $property = Property::
        join('property__types', 'properties.property_type', '=', 'property__types.id')
        ->join('property_sources', 'properties.property_source', '=', 'property_sources.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id')
        ->join('users','properties.user_id','users.id')
        ->where('properties.id', $pro_id)
        ->select('properties.id','property__types.name as type','properties.property_type as type_id','property_sources.name as source','property_status.name as status','properties.porperty_name','properties.user_id','users.phone as contact','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.bedroom','properties.bathroom','properties.images')
        ->first();

            $property->images = explode(',', $property->images);

       return view('frontend.propertyDetail',compact('property'));
    }

    public function getbedroom(Request $request){

        $minvalue = $request->input('min_area');
        $maxvalue = $request->input('max_area');
        $minBudget = $request->input('min_budget');
        $maxBudget = $request->input('max_budget');
        $location = $request->input('location');
        $configurations = $request->input('configurations');
        $categories = $request->input('category');
        $postBy = $request->input('post_user');
        $status = $request->input('construction_status');
        $bedroomArray = explode(',', $configurations['bedroom']);
        $bathroomArray = explode(',',$configurations['bathroom']);
        $categoryArray = explode(',', $categories);
        $postByArray = explode(',', $postBy);
        $statusArray = explode(',', $status);

        $properties = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id')
        ->where('properties.property_type',$request->property_type)
        ->whereBetween('properties.area', [$minvalue, $maxvalue]);
        if(!empty($minBudget) && !empty($maxBudget)){
            $properties->whereBetween('properties.price', [$minBudget, $maxBudget]);
        }
        if (!empty($categoryArray[0])) {
            $properties->whereIn('properties.category', $categoryArray);
        }
        if (!empty($postByArray[0])) {
            $properties->whereIn('properties.post_user', $postByArray);
        }
        if (!empty($statusArray[0])) {
            $properties->whereIn('properties.property_status', $statusArray);
        }
        if (!empty($location)) {
            $locationArray = explode(',', $location);
            $properties->where(function ($query) use ($locationArray) {
                foreach ($locationArray as $loc) {
                    $query->orWhere('properties.property_location', 'LIKE', '%' . trim($loc) . '%');
                }
            });
        }
        if (!empty($bedroomArray[0])) {
            $properties->where(function ($query) use ($bedroomArray) {
                foreach ($bedroomArray as $bedroom) {
                    $query->orWhereJsonContains('properties.configuration->Bedroom', $bedroom);
                }
            });
        }
        if (!empty($bathroomArray[0])) {
            $properties->where(function ($query) use ($bathroomArray) {
                foreach ($bathroomArray as $bathroom) {
                    $query->orWhereJsonContains('properties.configuration->Bathroom', $bathroom);
                }
            });
        }
        $properties = $properties->select('properties.id','property__types.name as type','property_status.name as status','properties.porperty_name','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.configuration','properties.images')->get();

        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
            $property->encrptId = Crypt::encrypt($property->id);
        });
             return response()->json($properties);
    }

    public function getcategory(Request $request ){

        $properties = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id')
        ->where('properties.property_type',$request->property_type)
        ->where('properties.category',$request->category)
        ->select('properties.id','property__types.name as type','property_status.name as status','properties.porperty_name','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.bedroom','properties.bathroom','properties.images')
        ->get();
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
            $property->encrptId = Crypt::encrypt($property->id);
        });
             return response()->json($properties);

    }

    public function getstatus(Request $request){
        $properties = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
        ->join('property_status', 'properties.property_status', '=', 'property_status.id')
        ->where('properties.property_type',$request->property_type)
        ->where('properties.property_status',$request->status)
        ->select('properties.id','property__types.name as type','property_status.name as status','properties.porperty_name','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.bedroom','properties.bathroom','properties.images')
        ->get();
        $properties->each(function ($property) {
            $property->images = explode(',', $property->images);
            $property->encrptId = Crypt::encrypt($property->id);
        });
             return response()->json($properties);
    }


    public function getconfiguration(Request $request){
        $type = (int)$request->typeValue;

        $result = DB::table('property__types')
            ->select('property__types.id as typeId','property__types.name as type_name','property__types.configuration')
            ->leftjoin('configurations', function ($join) {
                $join->whereRaw("FIND_IN_SET(configurations.id, property__types.configuration)");
            })
            ->where('property__types.id', '=', $type)
            ->get();
              $result->each(function ($config) {
                $config->configuration = explode(',', $config->configuration);
            });
            $groupedConfigurations = $result->groupBy('typeId');
            $configurations = $groupedConfigurations->map->first();
            $abc = $configurations->first();
            $configs = $abc->configuration;
            $configArray = [];
         foreach($configs as $configId){
            $configurationData = DB::table('configurations')
            ->where('configurations.id',$configId)
            ->get()->toArray();
            $configArray = array_merge($configArray, $configurationData);
         }
         return response()->json($configArray);
    }

    public function reviews(){
        $testimonials = Testimonial::get();
        return view('frontend.reviews',compact('testimonials'));
    }


}
