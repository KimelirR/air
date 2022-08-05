<?php
include ("../env.php");
 
        $curl = curl_init();
        $token = $_ENV['API_KEY'];
        $baseId = $_ENV['BASE_ID'];
        $url = "https://api.airtable.com/v0/${baseId}/Projects";
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
          
            print_r("This request for all records in our Base"."</br>");
            echo "<hr/>";
            //print_r($result);
              $decs =  json_decode($result,true);
              echo "<pre>";
             
              //print_r($decs);
             foreach($decs as $dec):
                {
            //print_r($dec);
                 foreach($dec as $next):
                    {
                    //  print_r($next);
                     print_r("Id:" .$next['id']."</br>");
                     print_r("Name:" .$next['fields']['Name']."</br>");
                     print_r("Knowledge:" .$next['fields']['Knowledge']."</br>");
                     print_r("Religion:" .$next['fields']['Religion'][0]."</br>");
                     print_r("Deadline :" . $next['fields']['Deadline']."</br>");
                     print_r("Gender :" . $next['fields']['Gender'][0]."</br>");
                     print_r("Status :" . $next['fields']['Status']."</br>");
                     print_r("Created At:" .$next['createdTime']."</br>");
                     echo "<hr/>";
                    }
                endforeach;
                }
            endforeach;
        }