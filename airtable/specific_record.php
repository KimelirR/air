<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $baseId = $_ENV['BASE_ID'];
        $firstrecord_id ='rec2q02dK4qRmKIyo';
        $url = "https://api.airtable.com/v0/${baseId}/Projects/${firstrecord_id}";
        curl_setopt ($curl, CURLOPT_URL, $url);
        curl_setopt($curl, 
            CURLOPT_HTTPHEADER,["authorization: Bearer $token",
            "content-type: application/json"]
        );
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec ($curl);
        
        curl_close($curl);

        $decs =  json_decode($result,true);
        // print_r($decs);
        if($e = curl_error($curl)){
            echo $e;
        }
        else{
            print_r("This single records on specific id"."</br>");
            echo "<hr/>";
           // print_r($result);
              $decs =  json_decode($result,true);
             echo "<pre>";
            //   print_r($decs);
            //  foreach($decs as $dec):
            //     {
            // //print_r($dec);
            //      foreach($dec as $decs):
            //         {
            //         //  print_r($decs);
            //          print_r("Id:" .$decs['id']."</br>");
                     print_r("Name:" .$decs['fields']['Name']."</br>");
                     print_r("Knowledge:" .$decs['fields']['Knowledge']."</br>");
                     print_r("Religion:" .$decs['fields']['Religion'][0]."</br>");
                     print_r("Deadline :" . $decs['fields']['Deadline']."</br>");
                     print_r("Gender :" . $decs['fields']['Gender'][0]."</br>");
                     print_r("Status :" . $decs['fields']['Status']."</br>");
                     print_r("Created At:" .$decs['createdTime']."</br>");
            //          echo "<hr/>";
            //         }
            //     endforeach;
            //     }
            // endforeach;
        }