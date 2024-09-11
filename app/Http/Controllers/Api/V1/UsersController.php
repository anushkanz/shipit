<?php

namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Facades\Validator;
# most likely you will need these 2 too
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use App\Models\Transporter;

class UsersController extends Controller
{
    public function index()
    {
        $users = User::all();
        return response()->json([
            'status' => true,
            'message' => 'Users retrieved successfully',
            'data' => $users
        ], 200);
    }

    public function show($id)
    {
        $user = User::findOrFail($id);
        if(empty($user)){
            return response()->json([
                'status' => true,
                'message' => 'Customer not found',
                'data' => ''
            ], 200);    
        }else{
            return response()->json([
                'status' => true,
                'message' => 'Customer found successfully',
                'data' => $user
            ], 200);
        }
    }

    public function store(Request $request)
    {
        $user = User::where('email', $request->email)->first();

        if($user == null){
            $user = User::create($request->all());

            if($request->accounttype == 'transporter'){
                $transporter = new Transporter();
                $transporter->user_id = $user->id;
                $transporter->legalname = 'n/a';
                $transporter->nzbn = 'n/a';
                $transporter->gst = 'n/a';
                $transporter->inbusiness = '0';
                $transporter->adderss = 'n/a';
                $transporter->dlnumber = 'n/a';
                $transporter->proof_identification = 'n/a';
                $transporter->proof_address = 'n/a';
                $transporter->public_profile = 'n/a';
                $transporter->notification = 'n/a';
                $transporter->save();
            }

            return response()->json([
                'status' => true,
                'message' => 'Customer created successfully',
                'data' => $user
            ], 201);

        }else{

            return response()->json([
                'status' => true,
                'message' => 'Email address already in our system',
                'data' => ''
            ], 202);

        }
    }

    public function update(Request $request, $id)
    {
        $user = User::findOrFail($id);
        $user->update($request->all());

        return response()->json([
            'status' => true,
            'message' => 'Customer updated successfully',
            'data' => $user
        ], 200);
    }

    public function destroy($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        
        return response()->json([
            'status' => true,
            'message' => 'User deleted successfully'
        ], 204);
    }

    
}

