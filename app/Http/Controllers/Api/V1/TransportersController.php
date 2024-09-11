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
            'message' => 'Nothing to show here',
            'data' => $user
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        return response()->json([
            'status' => true,
            'message' => 'Nothing to show here',
            'data' => $user
        ], 200);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        return response()->json([
            'status' => true,
            'message' => 'Nothing to show here',
            'data' => $user
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $transporter = Transporter::where('user_id', $id)->firstOrFail();
        /**
         *  We have 2 different interface to update
         *  update_type is business then update section of business area
         *  update_type is public then update public section
         *  update_type is notification then update notification
         */
        if($transporter->tupdatetype == 'business'){
            $transporter->user_id = $id;
            $transporter->legalname = $request->tlegalname;
            $transporter->nzbn = $request->tnzbn;
            $transporter->gst = $request->tgst;
            $transporter->inbusiness = $request->tyib;
            $transporter->adderss = $request->tcaddress;
            $transporter->dlnumber = $request->tdln;
            //$transporter->tidentification = upload($request);
            //$transporter->tcompanyaddressproof = upload($request);
            $transporter->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfuly updated business profile',
                'data' => $user
            ], 200);

        }else if($transporter->tupdatetype == 'public'){
            $public = array(
                'public_name' => $request->tpublicprofile,
                //'public_logo' => upload($request),
                'public_about' => $request->taboutbusiness,
                'public_transport_type' => $request->tmovingType,
                'public_about' => $request->taboutbusiness,
                'public_in_business' => $request->tvehiclecount,
                'public_insurance_name' => $request->tinsuracename,
                'public_insurance_cover' => $request->tinsurancecover,
                'public_payment_menthod' => $request->tpaymentmethod,
                'public_payment_time' => $request->tpaymenttime,
                //'public_vehicles_photos' => upload($request),
            );   
            $transporter->public_profile = json_encode($public);
            $transporter->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfuly updated public profile',
                'data' => $user
            ], 200);

        }else if($transporter->update_type == 'notification'){
            $notification_profile = array(
                'locations' => $request->temailnotification,
                'items' => $request->tmovingType
            );
    
            $transporter->notification = json_encode($notification_profile);
            $transporter->save();

            return response()->json([
                'status' => true,
                'message' => 'Successfuly updated business notification',
                'data' => $user
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

    public function upload(Request $request){
        $arr = [];
        foreach($request->all() as $file){
            if(is_file($file)){
                $string = str_random(16);
                $size = filesize($file);
                $ext = $file->guessExtension();
                $file_name = $string . '.' .  $ext;
                $filepath = 'storage/uploads/' . $file_name;
                $file->storeAs(('uploads/'), $file_name);

                array_push($arr, [
                    'name' => $file_name,
                    'path' => $filepath,
                ]);
            }
        }    
        return json_encode($arr);
    }
}