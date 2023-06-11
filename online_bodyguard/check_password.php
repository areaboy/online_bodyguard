<?php
error_reporting(0);
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST');
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");


$password = strip_tags($_POST['password']);
$hash_type = strip_tags($_POST['hash_type']);

if($password ==''){

echo "<div  style='background:red;color:white;padding:10px;border:none;'>Password to Check Cannot be Empty</div><br>";
exit();
}

if($hash_type ==''){

echo "<div  style='background:red;color:white;padding:10px;border:none;'>PasswordHash Type Cannot be Empty</div><br>";
exit();
}



include('settings.php');

if($user_intel_accesstoken ==''){
echo "<div  style='background:red;color:white;padding:10px;border:none;'>Please Ask Admin to Set Pangea USER INTEL Access Token at <b>settings.php</b> File</div><br>";
exit();
}




// For MD5
if($hash_type =='md5'){

$pass = md5($password);

// get first 5 character of the hash password
$hash_prefix = substr($pass, 0, 5);


 $data_param= '{
  "hash_type": "'.$hash_type.'",
 "hash_prefix": "'.$hash_prefix.'",
  "provider": "spycloud"
}';

}


// For SHA1
if($hash_type =='sha1'){

$pass = sha1($password);

// get first 5 character of the hash password
$hash_prefix = substr($pass, 0, 5);


 $data_param= '{
  "hash_type": "'.$hash_type.'",
 "hash_prefix": "'.$hash_prefix.'",
  "provider": "spycloud"
}';

}


// For SHA256

if($hash_type =='sha256'){

$pass = hash("sha256", $password);

// get first 5 character of the hash password
$hash_prefix = substr($pass, 0, 5);


 $data_param= '{
  "hash_type": "'.$hash_type.'",
 "hash_prefix": "'.$hash_prefix.'",
  "provider": "spycloud"
}';

}



$url ="https://user-intel.aws.us.pangea.cloud/v1/password/breached";

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



if($found_in_breach ===true){

$check = "True";
}else{

$check = "False";
}


if($request_id !='' && $status != 'Success'){
echo "<div class='dangerx'>
 Verification/Checking Failed. Try Again.  Error: $summary  </div><br>";
exit();

}





if($request_id !='' && $status == 'Success' ){
echo "<div class='successx'>Verification/Checking Successful</div><br>";
echo "<div class='well'>

                         <b>Verified Password:</b> $password<br>
 <b>Your Hashed Password:</b> $pass<br>
<b>Hash Prefix:</b> $hash_prefix<br>
                        <b>Hash Type:</b> $hash_type<br>
                        <b>Found in Breached:</b> $check<br>
                         <b>Breached Count:</b> $breach_count<br>
                         <b>Summary:</b> $summary<br>
                           <b>Status:</b> $status<br>
                            
        
</div><br>";

}





?>