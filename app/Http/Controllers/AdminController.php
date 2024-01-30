<?php

namespace App\Http\Controllers;
use Illuminate\Validation\Rule;
use Illuminate\Http\Request;
use App\Models\{User,Project,Property_Type,Property_source,Property_status,Property,Configuration,City,PostUser,Service,Testimonial,ServiceCategory,Community,Feature};
use DB;
use Hash;
use Session;

class AdminController extends Controller
{
    public function index(Request $request)
    {
        if (session()->has('admin _id')) {
            return redirect('admin/dashboard');
            }
            else{
                return view('admin.login');
            }

    }

    public function login(Request $request){
        $request->validate([
            'email' => 'required|email',
            'password'=>'required',
          ]);
          $users = DB::table('admin_users')->where('email',$request->email)->first();
          if($users != null){

          if (Hash::check($request->password,$users->password)) {

            Session::put(['admin_id' =>$users->id]);
            return redirect('admin/dashboard');

         }
         else{
            return redirect()->back()->with('error',"Password is wrong");
         }
        }
        else{
            return redirect()->back()->with('error',"Please Enter the Correct Email.");
        }

    }

    public function dashboard(){
       return view('admin.admin');
    }

    public function logout(){
        session()->forget('admin_id');
        return redirect()->route('admin');
    }

    public function add_project(){
       return view('admin.addproject');
    }

    public function save_project(Request $request){
        $request->validate([
            'project_name' => 'required|max:35',
            'project_price' => 'required',
            'address' => 'required',
            'image' => 'required|image|mimes:jpeg,png,jpg',
            'beds'=>'required',
            'bath'=>'required',
            'category'=>'required',
          ]);

        $imagePath = $request->file('image')->store('uploads', 'public');

        $project = new Project();
        $project->project_name = $request->project_name;
        $project->price = $request->project_price;
        $project->address = $request->address;
        $project->image = $imagePath;
        $project->bed = $request->beds;
        $project->bath = $request->bath;
        $project->category = $request->category;
        $this_product =  $project->save();
        return redirect()->back()->with('success','Successfully Submitted');
    }

    public function all_property(){
        $properties = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
              ->join('property_sources', 'properties.property_source', '=', 'property_sources.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->get(['properties.id','property__types.name as type','property_sources.name as source','property_status.name as status','properties.porperty_name','properties.user_id','properties.property_location','properties.category']);
        return view('admin.properties',compact('properties'));
    }

    public function property_attribute(){
        $configurations = DB::table('configurations')->get();
        return view('admin.propertyAttribute',compact('configurations'));
    }

    public function store_attributes(Request $request){
            $checkboxValues = $request->input('config', []);
            $configuration = implode(',',$checkboxValues);
            $request->validate([
                'type' => 'max:35',
                'status' => 'max:35',
                'source' => 'max:35',
                'category'=>'required',
            ]);
            if(isset($request->type) ){
            $property_type = Property_Type::create([
                'name'=>$request->type,
                'category'=>$request->category,
                'configuration'=>$configuration,
            ]);
            }
            if(isset($request->source) ){
            $property_type = Property_source::create([
                'name'=>$request->source,
                'category'=>$request->category,
            ]);
            }
            if(isset($request->status) ){
            $property_type = Property_status::create([
                'name'=>$request->status,
                'category'=>$request->category,
            ]);
            }
            return redirect()->back();
    }

        public function project_detail($ecryptedId){
            $id = decrypt($ecryptedId);
            $property_images = Property::where('id',$id)->first('images');
           $images = explode(',',$property_images->images);

            $property = Property::join('property__types', 'properties.property_type', '=', 'property__types.id')
              ->join('property_sources', 'properties.property_source', '=', 'property_sources.id')
              ->join('property_status', 'properties.property_status', '=', 'property_status.id')
              ->join('users','properties.user_id','users.id')
              ->where('properties.id', $id)
              ->first(['properties.id','property__types.name as type','property_sources.name as source','property_status.name as status','properties.porperty_name','properties.user_id','properties.property_location','properties.category','properties.message','properties.area','properties.price','properties.bedroom','properties.bathroom','users.name','users.email','users.phone']);
           return view('admin.projectDetail',compact('property','images'));
        }

        public function configuration(){
         return view('admin.addConfiguration');
        }

        public function store_configuration(Request $request){

            $request->validate([
                'type' => 'required|max:20',
            ]);
            $result = implode(',', range(1, $request->quantity));
            $property_config = Configuration::create([
                'name'=>$request->type,
                'numbers'=>$result,
              ]);
            if($property_config){
                return redirect()->back();
            }
        }

        public function  addCity(){
            return view('admin.addFilterCity');
        }

        public function store_city(Request $request){
            $request->validate([
                'city' => 'required|max:20',
            ]);
            $city = City::create([
                'name'=> ucfirst($request->city),
            ]);
            if($city){
                return redirect()->back();
            }
        }

        public function addPostUser(){
            return view('admin.addPostUser');
        }

        public function storePostUser(Request $request){
            // dd($request->all());
            $request->validate([
                'post_user' => 'required|max:20',
            ]);
            $postuser = PostUser::create([
                'name'=> ucfirst($request->post_user),
                'slug'=> $request->post_user,
            ]);
            if($postuser){
                return redirect()->back();
            }
        }

        public function getService(){
            $assets = Service::where('status', 1)->get();
            $service_categories = ServiceCategory::get();
            return view('admin.services.Services',compact('assets','service_categories'));
        }

        public function storeService(Request $request){

            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'category'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $asset_image = $image->storeAs('uploads', $tempName, 'public');
            $assets = Service::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$asset_image,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back();
            }
        }

        public function removeService($id){
            $assetId = decrypt($id);
            $asset = Service::find($assetId);
            if ($asset) {
                $asset->status = 0;
                // Save the changes
                $asset->save();
                return redirect()->back();
            }
        }

        public function addTestimonial(){
           return view('admin.testimonial');
        }

        public function storeTestimonial(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:30',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $asset_image = $image->storeAs('uploads', $tempName, 'public');
            $testimonial = Testimonial::create([
                'name'=>$request->title,
                'message'=> $request->description,
                'image'=>$asset_image,
                'status'=>0,
            ]);
            if($testimonial){
                return redirect()->back();
            }
        }


        public function allServices(){
            $services = Service::join('service_categories','services.category','service_categories.id')
            ->where('services.status', 1)
            ->select('services.title','services.description','service_categories.category','services.id')->get();

            return view('admin.services.allServices',compact('services'));
        }

        public function getCommunity(){
            return view('admin.communities.addCommunity');
        }

        public function storeCommunity(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $asset_image = $image->storeAs('uploads', $tempName, 'public');
            $assets = Community::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$asset_image,
                'category'=>$request->category,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }

        public function getFeature(){
            $communities = Community::all();
            return view('admin.communities.addFeature',compact('communities'));
        }

        public function storeFeature(Request $request){
            $request->validate([
                'title' => [
                    'required','string','max:150',
                ],
                'community'=>'required',
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
                'description'=>'required',
            ]);
            $image = $request->file('image');
            $tempName = uniqid('asset_', true) . '.' . $image->getClientOriginalExtension();
            $asset_image = $image->storeAs('uploads', $tempName, 'public');
            $assets = Feature::create([
                'title'=>$request->title,
                'description'=> $request->description,
                'image'=>$asset_image,
                'community'=>$request->community,
                'status'=>1,
            ]);
            if($assets){
                return redirect()->back()->with('success', 'Data Saved Successfully.');
            }
        }
}
