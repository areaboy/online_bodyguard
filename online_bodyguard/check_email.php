<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$email = strip_tags($_POST['email']);

if($email ==''){

echo "<div  style='background:red;color:white;padding:10px;border:none;'>Email to Check Cannot be Empty</div><br>";
exit();
}


$em= filter_var($email, FILTER_VALIDATE_EMAIL);
if (!$em){
echo "<div class='alert alert-danger' id='err'>Email Address is Invalid</div>";
exit();
}


include('settings.php');

if($user_intel_accesstoken ==''){
echo "<div  style='background:red;color:white;padding:10px;border:none;'>Please Ask Admin to Set Pangea USER INTEL Access Token at <b>settings.php</b> File</div><br>";
exit();
}




 $data_param= '{
  "email": "'.$email.'",
  "provider": "spycloud"
}';



$url ="https://user-intel.aws.us.pangea.cloud/v1/user/breached";

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_POST, TRUE);
curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', "Authorization: Bearer $user_intel_accesstoken"));  
curl_setopt($ch, CURLOPT_POSTFIELDS, $data_param);
//curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
$output = curl_exec($ch); 


$http_status = curl_getinfo($ch, CURLINFO_HTTP_CODE);

// catch error message before closing
if (curl_errno($ch)) {
    //echo $error_msg = curl_error($ch);
}

curl_close($ch); 


if($output ==''){

echo "<div class='dangerx'>
 Please Ensure there is Internet Connections and Try Again</div><br>";
exit();
}


$json = json_decode($output, true);
$found_in_breach = $json['result']['data']['found_in_breach'];
$breach_count = $json['result']['data']['breach_count'];
$request_id = $json['request_id'];
$summary = $json['summary'];
$status = $json['status'];


if($request_id !='' && $status != 'Success'){
echo "<div class='dangerx'>
 Verification/Checking Failed. Try Again.  Error: $summary  </div><br>";
exit();

}





if($request_id !='' && $status == 'Success' ){
echo "<div class='successx'>Verification/Checking Successful</div><br>";
echo "<div class='well'> 
 <b>Verified Email:</b> $email<br>

                        <b>Found in Breached:</b> $found_in_breach<br>
                         <b>Breached Count:</b> $breach_count<br>
                         <b>Summary:</b> $summary<br>
                           <b>Status:</b> $status<br>
                            
        
</div><br>";

}





?>