<?php

//Guias:
// https://gist.github.com/antxd/9fa72983d5197c166e441276e23bf786

$imgData = $_POST['image'];
 
//Decode the JSON string and convert it into a PHP associative array.
$decoded = json_decode($imgData, true);

$image = $decoded['name'];

//Corto la string de la imagen de la parte incial data:img...
$rest = substr($image, 23); 

$API_KEY = 'YOUR IMAGE SERVICE API KEY HERE';
	$ch = curl_init();
	curl_setopt($ch, CURLOPT_URL, 'https://api.imgbb.com/1/upload?key='.$API_KEY);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
	curl_setopt($ch, CURLOPT_POST, 1);	
	$data = array('image' =>  $rest);
	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
	$result = curl_exec($ch);
	if (curl_errno($ch)) {
	    return 'Error:' . curl_error($ch);
	}else{
          $objeto = json_decode($result, true);
          //Convierto el resultado en objeto
          $url = $objeto["data"]["image"]["url"];
          curl_close($ch);
          //devuelvo la url a js          
          echo $url;

	}
    
     
