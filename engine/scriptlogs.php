<?php
function logf($value='')
{
	$file = '/var/www/logs/'.date("d.m.y.feg");

	if (!file_exists($file)) {
	    $fp = fopen($file, "w"); // ("r" - считывать "w" - создавать "a" - добовлять к тексту),мы создаем файл
	    fwrite($fp, $value);
	    fclose($fp);
	}
}
?>