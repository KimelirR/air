<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$baseId = $_ENV['BASE_ID'];
$id = "rec7TFZy6JQz2noDu";
$url = "https://api.airtable.com/v0/${baseId}/Projects/${id}";

curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "DELETE");
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json"]);
//curl_setopt ($curl,CURLOPT_POSTFIELDS, $request);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);


$result = curl_exec ($curl);
$error = curl_error($curl);
if($error){
    echo $e;
}

$http_status = curl_getinfo($curl, CURLINFO_HTTP_CODE);

if($http_status >= 400){
    echo "Not Found! Check your Id and try again!";
} 
else{
    echo "Deleted Successfully";
}

curl_close($curl);