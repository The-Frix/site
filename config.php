<?php 
$urls = 'http://'.$_SERVER['HTTP_HOST'];
$path = __DIR__ . '/uploads/userfile/';
$server_noactive = false;
require 'db.php';

	$request = file_get_contents("http://api.sypexgeo.net/json/".$_SERVER['REMOTE_ADDR']); 
	$userinfo = json_decode($request, true);

	$country = $userinfo['country'];
	
        $logs = R::dispense('usersinfo');
        $logs->ip = $_SERVER['REMOTE_ADDR'];
        $logs->browser = $_SERVER['HTTP_USER_AGENT'];
        $logs->city = $country['capital_en'];
        $logs->cordinationlat = $country['lat'];
        $logs->cordinationlon = $country['lon'];
        $logs->page = $_SERVER['REQUEST_URI'];
        R::store($logs);
?>