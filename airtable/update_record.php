<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$baseId = $_ENV['BASE_ID'];
$id = "rec2q02dK4qRmKIyo";
$url = "https://api.airtable.com/v0/${baseId}/Projects/${id}";
$data = '{
            "fields": {
            "Name": "ABIGAEL",
            "Deadline": "2022-08-11",
            "Status": "Done",
            "Gender": [
                "Female"
            ],
            "Religion": [
                "Christian"
            ],
            "Knowledge": "Developer"
        }
      }';
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt($curl,CURLOPT_CUSTOMREQUEST,'PATCH');
curl_setopt($curl,CURLOPT_HTTPHEADER,["authorization: Bearer $token",
    "content-type: application/json"]);
curl_setopt ($curl,CURLOPT_POSTFIELDS, $data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

$result = curl_exec ($curl);
$error = curl_error($curl);
if($error){
    echo $e;
}
else{
    print_r($result);
}
curl_close($curl);

