<?php

function connect(){
 try{
        $db = new PDO('mysql:host=mysql2.alwaysdata.com;dbname=56899_projet0', '56899', 'agadir');
        $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        return $db;
 }catch (Exception $ex){
   echo  $ex->getMessage();
 }
}
?>
