<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Hash;
use Session;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class WhmController extends Controller
{

    public function dashboard()
    {
        // $user = "root";
        // $token = "MOV9XMLSSZTVRFFFPNTUDK5ATGNMYLW4";

        // $query = "https://twgdev.thewebguys.co.nz:2087/json-api/listaccts?api.version=1";

        // $curl = curl_init();
        // curl_setopt($curl, CURLOPT_SSL_VERIFYHOST,0);
        // curl_setopt($curl, CURLOPT_SSL_VERIFYPEER,0);
        // curl_setopt($curl, CURLOPT_RETURNTRANSFER,1);

        // $header[0] = "Authorization: whm $user:$token";
        // curl_setopt($curl,CURLOPT_HTTPHEADER,$header);
        // curl_setopt($curl, CURLOPT_URL, $query);

        // $result = curl_exec($curl);

        // $http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);
        // if ($http_status != 200) {
        //     echo "[!] Error: " . $http_status . " returned\n";
        // } else {
        //     $json = json_decode($result);
        //     echo "[+] Current cPanel users on the system:\n";
        //     echo '</br>';
        //     foreach ($json->{'data'}->{'acct'} as $userdetails) {
        //         echo "\t" . $userdetails->{'user'} . "\n";
        //         echo '</br>';
        //     }
        // }

        // curl_close($curl);
        //return view('whm/dashboard');
        $curl = curl_init();

        curl_setopt_array($curl, array(
          CURLOPT_URL => 'https://gateway.industlubes.co.nz:50000/b1s/v1/Login',
          CURLOPT_RETURNTRANSFER => true,
          CURLOPT_ENCODING => '',
          CURLOPT_MAXREDIRS => 10,
          CURLOPT_TIMEOUT => 0,
          CURLOPT_FOLLOWLOCATION => true,
          CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
          CURLOPT_CUSTOMREQUEST => 'POST',
          CURLOPT_POSTFIELDS =>'{"CompanyDB":"ILU_Production","UserName":"WebGuys","Password":"jNrGIBxJ6x"}',
          CURLOPT_HTTPHEADER => array(
            'Content-Type: application/json',
            'Cookie: B1SESSION=bda9a5b4-495e-11ef-c000-00505698e999-5828-6348; ROUTEID=.node1'
          ),
        ));
        
        $response = curl_exec($curl);
        
       
        echo '<pre>';
        print_r($response);
        echo '</pre>';
        echo $response;
        
        curl_close($curl);
    }

}