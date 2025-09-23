<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function select(string $parcl_id){
        if($parcl_id){

            $curl = curl_init();
    
            curl_setopt_array($curl, array(
            CURLOPT_URL => "https://api.parcllabs.com/v1/search/markets?query=".$parcl_id,
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: EphIk5y3KCwlBglN3t4lZWWciV6-wDh9ysil74NVD9s',
                'Accept: application/json'
            ),
            ));
    
            $response = curl_exec($curl);
    
            $data = json_decode($response);
    
            curl_close($curl);
    
            return view('pages.select')
                ->with('marks', $data);
        } else {
            
        }
    }

    public function search(){
        return view('pages.search');
    }
}
