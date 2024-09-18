<?php
namespace App\Http\Controllers\Api\V1;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use DB;
use Carbon\Carbon;

class CustomAuthController extends Controller
{
    public function customLogin(Request $request)
    {
        $validator =  $request->validate([
            'email' => 'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                        ->withSuccess('Signed in');
        }else{
            $validator['emailPassword'] = 'Email address or password is incorrect.';
            return response()->json([
                'status' => true,
                'message' => $validator,
                'data' => ''
            ], 200);
        }
    }

    public function customForgotPassword(Request $request){
        $user = DB::table('users')->where('email', '=', $request->email)->get();
        
        if (count($user) < 1) {
            return response()->json([
                'status' => true,
                'message' => 'If this email address in our system, You will get email to how to reset password.',
                'data' => ''
            ], 200);
        }

        //Create Password Reset Token
        DB::table('password_reset_tokens')->insert([
            'email' => $request->email,
            'token' => $this->random_str(60),
            'created_at' => Carbon::now()
        ]);

        $tokenData = DB::table('password_reset_tokens')->where('email', $request->email)->first();
        // /**
        //  * TESTING
        //  **/ 
        // $user = DB::table('users')->where('email', $request->email)->first();
        // //Generate, the password reset link. The token generated is embedded in the link$link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
        // $msg = 'https://shippingout.thedevguys.co.nz/user-login/forgot-password/?token='. $tokenData->token . '&email=' . urlencode($user->email);
    
        // return response()->json([
        //     'status' => true,
        //     'message' => 'A reset link has been sent to your email address.',
        //     'data' => $msg
        // ], 200);
            
        if ($this->sendResetEmail($request->email, $tokenData->token)) {
            /**
             * TESTING
             **/ 
            $user = DB::table('users')->where('email', $email)->first();
            //Generate, the password reset link. The token generated is embedded in the link$link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
            $msg = 'https://shippingout.thedevguys.co.nz/user-login/forgot-password/?token='. $token . '&email=' . urlencode($user->email);
        
            return response()->json([
                'status' => true,
                'message' => 'A reset link has been sent to your email address.',
                'data' => $msg
            ], 200);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'A Network Error occurred. Please try again.',
                'data' => ''
            ], 200);
        }    
    }

    public function customResetPassword(Request $request)
    {
        $password = $request->password;// Validate the token
        $tokenData = DB::table('password_reset_tokens')->where('token', $request->token)->count();// Redirect the user back to the password reset request form if the token is invalid
            
        if ($tokenData< 1) {
            return response()->json([
                'status' => true,
                'message' => 'Password reset token is invalid.',
                'data' => $tokenData
            ], 200);
        }

        $userCount = User::where('email', $request->email)->count();
   
        // Redirect the user back if the email is invalid
        if ($userCount < 1){
            return response()->json([
                'status' => true,
                'message' => 'Email not found.',
                'data' => ''
            ], 200);
        }
        
        $user = User::where('email', $request->email)->first();
        $user->password = \Hash::make($password);
        $user->update(); //or $user->save();

        //login the user immediately they change password successfully
        Auth::login($user);

        //Delete the token
        DB::table('password_reset_tokens')->where('email', $user->email)->delete();

        //Send Email Reset Success Email
        if ($this->sendSuccessEmail($user->email)) {
            return response()->json([
                'status' => true,
                'message' => 'Password reset successfully.',
                'data' => ''
            ], 200);
        } else {
            return response()->json([
                'status' => true,
                'message' => 'A Network Error occurred. Please try again.',
                'data' => ''
            ], 200);
        }
    }


    private function sendResetEmail($email, $token){
        //Retrieve the user from the database
        $user = DB::table('users')->where('email', $email)->first();
        //Generate, the password reset link. The token generated is embedded in the link$link = config('base_url') . 'password/reset/' . $token . '?email=' . urlencode($user->email);
        $msg = 'https://shippingout.thedevguys.co.nz/user-login/forgot-password/?token='. $token . '&email=' . urlencode($user->email);
        try {
        //Here send the link with CURL with an external email API         return true;
            $mail = mail($email,"Password Reset Mail",$msg);
            if(!$mail){
                return true;
            }
        } catch (\Exception $e) {
            return false;
        }
    }

    private function sendSuccessEmail($email){
        //Retrieve the user from the database
        //Send email to 
        try {
            mail($email,"Password Reset Successfuly","Your password reset done.");
            if(!$mail){
                return true;
            }
        //Here send the link with CURL with an external email API         return true;
        } catch (\Exception $e) {
            return false;
        }
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

}
