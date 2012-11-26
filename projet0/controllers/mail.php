<?php

function send_mail($to,$subject,$msg){
	//Image in e-mail
	$mailimg = '
	<a href="http://nos-projets.alwaysdata.net/"><img src="http://nos-projets.alwaysdata.net/img/logo.png"</a>
	';
	//Mail Body - Position, background, font color, font size...
	$body ='
	<html>
	</body>
	';
	//To send HTML mail, the Content-type header must be set:
	$headers='MIME-Version: 1.0' . "\r\n";
	$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
	$headers .= 'From: Gestion absence Admin <gourgan.hicham@gmail.com>' . "\r\n";
	$bodys = "$msg <br>";
	$bodys .= "$mailimg";
	$body = $body . $bodys;
	mail($to, $subject, $body, $headers);
	return true;
}
?>