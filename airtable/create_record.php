<?php
include ("../env.php");
 
$curl = curl_init();
$token = $_ENV['API_KEY'];
$baseId = $_ENV['BASE_ID'];
$url = "https://api.airtable.com/v0/${baseId}/Projects";
$data = '{
    "records": [
      {
        "fields": {
          "Name": "Cynthia",
          "Deadline": "2022-09-20",
          "Status": "Done",
          "Gender": [
            "Female"
          ],
        "Religion": [
            "Indian"
          ],
        "Knowledge": "Doctor"
        }
      }
    ]
  }';
curl_setopt ($curl,CURLOPT_URL, $url);
curl_setopt ($curl,CURLOPT_POST, true);
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

