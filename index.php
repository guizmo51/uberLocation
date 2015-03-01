<?php 

header('Content-type: application/json');

function callUber($params, $action){

	$curl = curl_init();
	$headr[] = 'Authorization: Token '..'';
	$tokenUber = '';	/* Token Uber à mettre , nécessite un compte developpeur sur Uber */
	$headr[] = 'Authorization: Token '.$tokenUber.'';
	
	curl_setopt($curl, CURLOPT_HTTPHEADER,$headr);
	
	if($action=="init"){
		curl_setopt($curl, CURLOPT_URL, 'https://api.uber.com/v1/products?latitude='.$params['lat'].'&longitude='.$params['lon'].'');
	} else if($action=="time"){
		curl_setopt($curl, CURLOPT_URL, 'https://api.uber.com/v1/estimates/time?start_latitude='.$params['lat'].'&start_longitude='.$params['lon'].'');
	}
	
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	$retour = curl_exec($curl); 
	curl_close($curl);
	
	return $retour;
}

/* Coordonnées GPS pour test à optimiser pour ne plus faire à la main */
$params[0]['lat']=48.854536;
$params[0]['lon']=2.348005;
$params[1]['lat']=48.872026; 
$params[1]['lon']=2.326225;
$params[2]['lat']=48.870219; 
$params[2]['lon']=2.377552;
$params[3]['lat']=48.834752; 
$params[3]['lon']=2.362789;
$params[4]['lat']=48.849891; 
$params[4]['lon']=2.302193;

$cpt = 0;
foreach($params as $key=>$value){
	
	$json= json_decode(callUber($params[$key], 'time'),1);
	
	foreach($json['times'] as $time){
		$cars[$time['product_id']][''.$key.'']['tps'] = $time['estimate'];
		$cars[$time['product_id']][''.$key.'']['model']=$time["display_name"];
	}
	
	$cpt ++;
}

echo json_encode(array('coord'=>$params,'cars'=>$cars));

?>