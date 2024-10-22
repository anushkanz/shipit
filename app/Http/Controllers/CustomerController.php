<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Item;
use App\Models\Listing;
use App\Models\Listing_meta;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\App;
use Stripe;
use Hash;
use Session;
use Config;
use Validator;
use Redirect;


class CustomerController extends Controller
{
    public function listings(){
        if(Auth::check()){
            
            $user = Auth::user();
            //Based on user type redirect to different dashboard
            if($user->type == 3){
                $listings = Listing::where('user_id', $user->id)->get();
                return view('customer.listings', compact('listings'));
            }
        }
        return redirect("login")->withSuccess('Trust me this is not belongs to you');
    }
    
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(Auth::check()){
            
            $user = Auth::user();
            //Based on user type redirect to different dashboard
            if($user->type == 3){
                // $stripe_key = Config::get('services.stripe');
                // $key = $stripe_key['key'];
                //return view('customer.account', compact('key'));
                return view('customer.account', compact('user'));
            }
        }
        return redirect("login")->withSuccess('You are not allowed to access');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        if(Auth::check()){
            
            $user = Auth::user();
            //Based on user type redirect to different dashboard
            if($user->type == 3){
                $listing = Listing::where('id', $id)->first();
                
                //Get collecting address
                $collection = return_listing_meta($listing->id,'collection_meta_address',true)->toArray();
       
                //Get delivery address
                $delivery = return_listing_meta($listing->id,'collection_meta_delivery_address',true)->toArray();

                return view('customer.listing', compact('listing','collection','delivery'));
            }
        }
        return redirect("login")->withSuccess('Trust me this is not belongs to you');
    }
    /*
    * This function udpate listing 
    */
    public function listingUpdateStart(Request $request, $step, $type, $uesr_id, $listing_id)
    {
        //validation
        if(isset($step) && isset($type) && isset($uesr_id) && isset($listing_id)){
            $listing_ob = Listing::where('id', $listing_id)->where('type_id', $type)->where('user_id', $uesr_id)->first();
            
            if($listing_ob != null){
                $id = $listing_id;
                $modification = true;
                $listing_meta = return_listing_meta($listing_id,'',false)->toArray();
                $listing = $listing_ob->toArray();
                return view('customer.edit.edit_listing', compact('step','type','id','listing','listing_meta','modification'));
                //return view('customer.create_listing_step_two', ['step' => $step, 'type' => $type, 'id'=>$listing_id, 'listing'=>$listing ,'listing_meta'=>$listing_meta, 'modification'=>true]);
            }else{
                return view('common.error');
            }
        }else{
            return view('common.error');
        }
        return view('common.error');
    }
    
    
    public function listingUpdate(Request $request, $step, $type, $uesr_id, $listing_id){
       
        if(isset($step) && isset($type) && isset($uesr_id) && isset($listing_id) && ($request->task != 1)){
            $listing_ob = Listing::find($listing_id);
            if($request->collection_title){
                $listing_ob->title = $request->collection_title;
                $listing_ob->update();
            }
            
            if($request->allFiles()){
                $files = $this->upload($request->file('collection_meta_file_upload'));
                Listing_meta::update_listing_meta($listing_id, 'file_upload', $files,true);
            }
            
            foreach($request->post() as $key => $meta_item){
                if (str_contains($key, 'collection_meta_')) {
                    if(is_array($meta_item)){
                        Listing_meta::update_listing_meta($$listing_id, $key, $meta_item,true);
                    }else{
                        Listing_meta::update_listing_meta($listing_id, $key, $meta_item);
                    }
                }
            }
            
            $modification = true;
            $step = $step + 1;
            $listing = $listing_ob->toArray();
            $listing_meta = return_listing_meta($listing_id,'',false)->toArray();
            print_r($step);
            return view('customer.edit.edit_listing', compact('step','type','listing_id','listing','listing_meta','modification'));
            //Route::post('customer/listing_update/step/{step}/{type}/{uesr_id}/{listing_id}', [CustomerController::class, 'listingUpdate'])->name('customer.edit.update.step_two');
            //return redirect()->route('customer.edit.edit_listing', ['step' => $step, 'type' => $type, 'user_id'=>$uesr_id,'listing_id'=>$listing_id, 'modification'=>true]);
        }else{
            return view('common.error');
        }
    }
    /*
    * This function create 
    */
    public function listingCreate(Request $request, $step, $type)
    {
        //When each page click this function get data from $request and save database
        /**
         * if $request->id is empty that mean this is new listing then we need to create listing first then add meta
         **/ 

        $listing = '';
        if($request->id === null && ($request->task != 1)){
            $listings = new Listing();
            $listings->user_id = $request->user_id;
            $listings->type_id = $request->listing_type;
            $listings->title = $request->collection_title;
            $listings->status = 'publish';
            $listings->save();
            $listing = $listings->id;
            
            foreach($request->post() as $key => $meta_item){
                if (str_contains($key, 'collection_meta_')) {
                    if(is_array($meta_item)){
                        Listing_meta::update_listing_meta($listings->id, $key, $meta_item,true);
                    }else{
                        Listing_meta::update_listing_meta($listings->id, $key, $meta_item);
                    }
                }
            }
        }else{
            $listing = $request->id;
            if($request->allFiles()){
                $files = $this->upload($request->file('collection_meta_file_upload'));
                Listing_meta::update_listing_meta($listing, 'file_upload', $files,true);
            }
            
            foreach($request->post() as $key => $meta_item){
                if (str_contains($key, 'collection_meta_')) {
                    if(is_array($meta_item)){
                        Listing_meta::update_listing_meta($listing, $key, $meta_item,true);
                    }else{
                        Listing_meta::update_listing_meta($listing, $key, $meta_item);
                    }
                }
            }
        } 

        $task = $request->task+1;
        //return Redirect::route('customer/listing_create/step/'.$task.'/'.$request->listing_type, array('listing' => $listing));

        return redirect()->route('customer.listing.start.step_one', ['step' => $task, 'type' => $request->listing_type, 'id'=>$listing,'modification'=>false]);
        
        //return redirect('customer/listing_create/step/'.$task.'/'.$request->listing_type)->with('listing', $listing); 
    }
    
    function random_str(
        int $length = 64,
        string $keyspace = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ'
        ): string {
            if ($length < 1) {
                throw new \RangeException("Length must be a positive integer");
            }
            $pieces = [];
            $max = mb_strlen($keyspace, '8bit') - 1;
            for ($i = 0; $i < $length; ++$i) {
                $pieces []= $keyspace[random_int(0, $max)];
            }
        return implode('', $pieces);
    }

    public function upload($request){
        $arr = [];
        foreach($request as $file){
            $string = $this->random_str(32);
            $size = filesize($file);
            $ext = $file->guessExtension();
            $file_name = $string . '.' .  $ext;
            //$filepath = 'storage/uploads/' . $file_name;
            $filePath = $file->storeAs('public/client/listing', $file_name);
            //$file->storeAs(('uploads/'), $file_name);
            
            array_push($arr, [
                'name' => $file_name,
                'path' => $filePath,
            ]);
        }    
        return json_encode($arr);
    }
    
    public function listingStart(){
        //List all listing item options
        $items = Item::all();
        $listing = (object)[];
        $listing->id = "";
        return view('customer.create.create_listing', compact('items','listing'));
    }
    
    public function listingPassingSetpOne(){
        //List all listing item options
        $items = Item::all();
        $listing = (object)[];
        $listing->id = "";
        return view('customer.create.create_listing', compact('items','listing'));
    }
    
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request)
    {
        if($request->task == 'account'){
            $validator = Validator::make($request->all(), [
                'fname'  => 'required',
                'lname'  => 'required',
                'email'  => 'required|string|email|max:255|unique:users,email,' . $request->id,
                'mobile' => 'required',
            ],
            [
                'fname.required' => 'Your First Name is Required', 
                'lname.required' => 'Your Last Name is Required', 
                'email.required' => 'Your Email is Required', 
                'mobile.required'=> 'Your Mobile number is Required', 
            ]
            );
            
            if ($validator->fails()) {
                $error = $validator->errors()->all();
                return redirect('/customer/account')->with('error-details', $error);
            }
    
            $UpdateDetails = User::where('id', $request->id)->firstOrFail();
            $UpdateDetails->fname = $request->fname;
            $UpdateDetails->lname = $request->lname;
            $UpdateDetails->email = $request->email;
            $UpdateDetails->mobile = $request->mobile;
            $UpdateDetails->save();
    
            return redirect('/customer/account')->with('success-details', 'Successfully update account details');
        }else if($request->task == 'password'){
            
            $inputs = [
                'old_password'          => $request->old_password,
                'password'              => $request->password,
                'password_confirmation' => $request->password_confirmation,
            ];
        
            $rules = [
                'old_password'    => 'required',
                'password_confirmation' => 'required',
                'password' => [
                    'required',
                    'confirmed',
                    'string',
                    'min:10',             // must be at least 10 characters in length
                    'regex:/[a-z]/',      // must contain at least one lowercase letter
                    'regex:/[A-Z]/',      // must contain at least one uppercase letter
                    'regex:/[0-9]/',      // must contain at least one digit
                    'regex:/[@$!%*#?&]/', // must contain a special character
                ],
            ];
        
            $validator = Validator::make( $inputs, $rules );
        
            if ( $validator->fails() ) {
                $error = $validator->errors()->all();
                return redirect('/customer/account')->with('error-password', $error);
            }
            
            $auth = Auth::user();
            if (!Hash::check($request->old_password, $auth->password)) 
            {
                $error = array('Old password is not match with our records.');
                return redirect('/customer/account')->with('error-password', $error);
            }else{
                $user = User::where('id', $request->id)->first();
                $user->password = \Hash::make($password);
                $user->update(); //or $user->save();
                return redirect('/customer/account')->with('success-password', 'Successfully update password');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
    
    
    

}
