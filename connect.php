<?php
$dsn = "mysql:host=localhost;dbname=notes" ;
$user="root";
$password ="";
try {

    $connect = new PDO($dsn , $user , $password );
    $connect->setAttribute(PDO::ATTR_ERRMODE , PDO::ERRMODE_EXCEPTION) ;
    include "functions.php";

    //just copy and paste these three lines(to be able to connect to api successfully)
    header("Access-Control-Allow-Origin: *");
    header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With, Access-Control-Allow-Origin");
    header("Access-Control-Allow-Methods: POST, OPTIONS , GET");

}catch(PDOException $e){
    echo $e->getMessage() ;
}
checkAuthenticate();
?>