<?php
	/*
	* Ixian Mining Pool
	* Website: www.ixian.io 
	* Github:  https://github.com/ProjectIxian/Ixian-Pool
	*/

	include_once("../config.php");
	$params = "/getminingblock?algo=0";

	$response = json_decode(file_get_contents($dlt_host.$params), true, 512, JSON_BIGINT_AS_STRING);
	$cache_file = "../cache/block.ixi";
	$json = json_decode(file_get_contents($cache_file));
	$num = $response["result"]["num"];
	if($num > $json->result->num){
		file_put_contents($cache_file, json_encode($response));
		$json = $response;
	}
	echo json_encode($json);
?>