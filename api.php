
<?php
session_start();
 
function callAPI($method, $path, $data = []){
    $curl = curl_init();
    $baseURL = 'https://www.mra.mw/sandbox/';
 
    switch ($method){
        case "POST":
            curl_setopt($curl, CURLOPT_POST, 1);
            if ($data)
            curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($data));
            break;
        case "PUT":
            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "PUT");
            if ($data)
                curl_setopt($curl, CURLOPT_POSTFIELDS, $data);
            break;
        default:
            if ($data)
                $path = sprintf("%s?%s", $path, http_build_query($data));
    }
 
    // OPTIONS:
    curl_setopt($curl, CURLOPT_URL, $baseURL.$path);
    curl_setopt($curl, CURLOPT_HTTPHEADER, array(
        'Content-Type: application/json',
        'candidateid: '.$_SESSION['name'],
        'apikey: '.$_SESSION['token'],
    ));
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
    curl_setopt($curl,CURLOPT_SSL_VERIFYPEER, false);
    // EXECUTE:
    $response = curl_exec($curl);
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    if(!$response){die("Connection Failure");}
    curl_close($curl);
    
    return [
        'code' => $code,
        'response' => json_decode($response, true)
    ];

}
?>