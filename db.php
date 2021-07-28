<?php

error_reporting(E_ALL);
ini_set('display_errors', 1);

$dsn = "mysql:host=localhost; dbname=cinema;";
$username = "root";
$password = "";
$option= [];
$connection = new PDO($dsn, $username, $password, $option);

//fonction d'exeception on cas ya une erreur TRY

try{
    //print "connexion reuissi";
}catch(PDOException $e){
    echo $e->getMessage();
    die();
}
?>