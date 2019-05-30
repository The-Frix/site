<?php
require 'scriptlogs.php';
function bootstrap($version='')
{
	if ($version == '4') {
		echo '  <link rel="stylesheet" href="/links/frameworks/bootstrap/css/bootstrap.min.css"><script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="/links/frameworks/bootstrap/js/bootstrap.min.js"></script>';
	}elseif ($version == '3') {
		echo '<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>';
	}
}
function jquery()
{
	echo '<script src="/links/frameworks/jquery.js"></script>';
}
?>