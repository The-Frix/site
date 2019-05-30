<?php
require 'settings.php';

if($trackhttps == true){
	$url = 'https://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$gurl = 'https://'.$_SERVER['HTTP_HOST'];
}elseif ($trackhttps == false) {
	$url = 'http://'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'];
	$gurl = 'http://'.$_SERVER['HTTP_HOST'];
}
?>