<?php 
include_once('include/model_class.php');

$data = $_POST;
$ip =  getUserIP();
$model = new modelData();


$resp = $model->insert_data($data);

$success = $resp['success'];

if($success){
  $pais = getPais($ip); 	
  if (in_array(strtoupper($pais), array('ES','MX','PE'))){

   		header('location: gracias_'.$pais.'.htm');
   } else {
   	  header('location: gracias.htm');
   }
  
}else{
	 header('location: error.php?err='.$resp['message']);

}



function getPais($ip){

    //Obtenemos los datos georeferenciales de la ip
	$geoInfo = file_get_contents("http://www.geoplugin.net/json.gp?ip=".$ip);

// Convertir el texto JSON en un array
	$dataInfo = json_decode($geoInfo);

// Ver contenido del array
	return $dataInfo->geoplugin_countryCode;
}


function getUserIP()
{
    // Get real visitor IP behind CloudFlare network
    if (isset($_SERVER["HTTP_CF_CONNECTING_IP"])) {
              $_SERVER['REMOTE_ADDR'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
              $_SERVER['HTTP_CLIENT_IP'] = $_SERVER["HTTP_CF_CONNECTING_IP"];
    }
    $client  = @$_SERVER['HTTP_CLIENT_IP'];
    $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
    $remote  = $_SERVER['REMOTE_ADDR'];

    if(filter_var($client, FILTER_VALIDATE_IP))
    {
        $ip = $client;
    }
    elseif(filter_var($forward, FILTER_VALIDATE_IP))
    {
        $ip = $forward;
    }
    else
    {
        $ip = $remote;
    }

    return $ip;
}