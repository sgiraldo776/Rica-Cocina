<?php 
if($_SERVER['SERVER_NAME'] == "localhost"){
    $conn = new mysqli('localhost','root','','rica_cocina');

    $URL = "http://localhost/Rica-Cocina/";    
}else  if($_SERVER['SERVER_NAME'] == "develop.ricacocina.co"){
    $conn = new mysqli('localhost','ricacoci_admin','prueba','ricacoci_dev');

    $URL = "http://develop.ricacocina.co/";
}else{
    $conn = new mysqli('localhost','ricacoci_admin','prueba','ricacoci_rica_cocina');

    $URL = "https://ricacocina.co/";
}
?>