<?php
include 'engine/source.php';
require 'engine/loader.php';
require 'varchar.php';

switch ($url) {
	case $gurl.'/':
		require 'element/main.php';
		break;
	case $gurl.'/signin/':
		require 'element/signin.php';
		break;
	case $gurl.'/signup/':
		require 'element/signup.php';
		break;
	case $gurl.'/profile/':
		require 'element/profile.php';
		break;
	case $gurl.'/logout':
		require 'logout.php';
		break;
	default:
	require 'element/404.php';
		break;
}
?>