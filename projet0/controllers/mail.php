<?php

$to = $email;
//Image in e-mail
$mailimg = '
<a href="#"><img src="http://nos-projets.alwaysdata.net/img/logo.png"</a>
';
//Mail Body - Position, background, font color, font size...
$body ='
<html>
<head>
<style>
<!--
body, P.msoNormal, LI.msoNormal
{
background-position: top;
background-color: #336699;
margin-left:  10em;
margin-top: 1em;
font-family: "verdana";
font-size:   10pt;
font-weight:bold ;
color:    "000000";
}
h3{
    color: #D3D3D3;
    font-weight: 600;
    font-size: 17px;
    padding: 6px 0 0 34px;
    text-shadow: 0 1px 0 #292929;
}
p{
	color: #D3D3D3;
    font-size:13px;
	text-shadow: 0 1px 0 #292929;

}
b{
	color:red;
}
-->
</style>
</head>
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
?>