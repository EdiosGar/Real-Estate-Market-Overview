<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class SearchController extends Controller
{
    private $key = "bw8jVID1FKOPhVNVVVT5rSGTT9-feIpOjTJvaYYBXHw";

    public function select(string $parcl_id){
        if($parcl_id){

            // Prices
            $curlPrecie = curl_init();
            curl_setopt_array($curlPrecie, array(
            CURLOPT_URL => "https://api.parcllabs.com/v1/market_metrics/$parcl_id/housing_event_prices/",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$this->key,
                'Accept: application/json'
            ),
            ));
            $resPrecie = curl_exec($curlPrecie);
            $dataPrecie = json_decode($resPrecie);
            curl_close($curlPrecie);

            // Markets
            $curlMarket = curl_init();
            curl_setopt_array($curlMarket, array(
            CURLOPT_URL => "https://api.parcllabs.com/v1/search/markets?parcl_id=$parcl_id",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => '',
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => 'GET',
            CURLOPT_HTTPHEADER => array(
                'Authorization: '.$this->key,
                'Accept: application/json'
            ),
            ));
            $resMarket = curl_exec($curlMarket);
            $dataMarket = json_decode($resMarket);
            curl_close($curlMarket);

            return view('pages.select')
                ->with('prices', $dataPrecie)
                ->with('markets', $dataMarket);
        } else {
            
        }
    }

    public function search(){
        return view('pages.search');
    }
}
