<?php
$to = $_POST['to'];
$msg = $_POST['msg'];
//Image in e-mail
$mailimg = '
<a href="#"><img src="../img/logo.jpg"</a>
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
-->
</style>
</head>
</body>
';
//To send HTML mail, the Content-type header must be set:
$headers='MIME-Version: 1.0' . "\r\n";
$headers .= 'Content-type: text/html;charset=iso-8859-1' . "\r\n";
$headers .= 'From: Gestion absence Admin <gourgan.hicham@gmail.com>' . "\r\n";
$bodys .= "$msg <br>";
$bodys .= "$mailimg";
$body = $body . $bodys;
mail($to, $subject, $body, $headers);
?>