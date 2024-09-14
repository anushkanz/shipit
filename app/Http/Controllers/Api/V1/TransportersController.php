<?php

namespace App\Http\Controllers\Api\V1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transporter;

class TransportersController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Nothing to show here index function',
            'data' => ''
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Nothing to show here store function',
            'data' => ''
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Nothing to show here show function',
            'data' => ''
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
       
        $transporter = Transporter::where('user_id', $id)->firstOrFail();
        // return response()->json([
        //     'status' => true,
        //     'message' => 'update',
        //     'data' => $request->all()
        // ], 200);
        
        //print_r( $request->all());
        /**
         *  We have 2 different interface to update
         *  update_type is business then update section of business area
         *  update_type is public then update public section
         *  update_type is notification then update notification
         */
        if($request->updatetype == 'business'){
            $transporter->user_id = $id;
            $transporter->legalname = $request->legalname;
            $transporter->nzbn = $request->nzbn	;
            $transporter->gst = $request->gst;
            $transporter->inbusiness = $request->inbusiness;
            $transporter->adderss = $request->adderss;
            $transporter->dlnumber = $request->dlnumber;
            $transporter->proof_identification = $this->upload($request->proof_identification);
            $transporter->proof_address = $this->upload($request->proof_address);
            $transporter->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfuly updated business profile',
                'data' => $transporter
            ], 200);
        }
        
        if($request->updatetype == 'public'){
            
            $public = array(
                'public_name' => $request->publicprofile,
                'public_logo' => $this->upload($request->businessprofileimage),
                'public_about' => $request->aboutbusiness,
                'public_transport_type' => json_encode($request->movingtype),
                'public_in_business' => $request->vehiclecount,
                'public_insurance_name' => $request->insuracename,
                'public_insurance_cover' => $request->insurancecover,
                'public_payment_menthod' => $request->paymentmethod,
                'public_payment_time' => $request->paymenttime,
                'public_vehicles_photos' => $this->upload($request->vehiclephotos),
            );   
            $transporter->public_profile = json_encode($public);
            $transporter->save();
            
            return response()->json([
                'status' => true,
                'message' => 'Successfuly updated public profile',
                'data' => $public
            ], 200);
        }
        
        if($request->notificationupdatetype == 'notification'){
            
            $set_data = array();
            foreach($request->emailnotification as $location){
                $set_data[$location] = $request->notificationmovingtype;
            }

    
            $transporter->notification = json_encode($set_data);
            $transporter->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfuly updated business notification',
                'data' => $transporter
            ], 200);
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
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
            $filePath = $file->storeAs('uploads', $file_name);
            //$file->storeAs(('uploads/'), $file_name);
            
            array_push($arr, [
                'name' => $file_name,
                'path' => $filePath,
            ]);
        }    
        return json_encode($arr);
        
    }
}