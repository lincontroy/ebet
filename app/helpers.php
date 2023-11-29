<?php
if (! function_exists('getDistricts')) {
    function getDistricts() {
        $districts=\App\Models\District::orderBy('name', 'ASC')->get();
        return $districts;
    }
}

if (! function_exists('getMemberStatuses')) {
    function getMemberStatuses() {
        return [['name'=>'Active'], ['name'=>'Dormant'], ['name'=>'Deceased'], ['name'=>'Transferred']];
    }
}


if (! function_exists('sendsms')) {
    function sendsms($mobile,$message){

        $response = Http::post('https://sms.vutia.co.ke/api/services/sendotp', [
            "apikey" => "cad7c3f2203308b7d4c576d9a5cf3eae",
            "partnerID" => "5843",
            "message" => $message,
            "shortcode" => "STOICLINK",
            "mobile" => $mobile
        ]);

        return $response;
    }
    
}
