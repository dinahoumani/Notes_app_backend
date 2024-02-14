<?php
include "../connect.php";

$email =filterRequest('email');
$password =filterRequest('password');

$stmt =$connect ->prepare("SELECT * FROM `users` WHERE `email`=? and `password`=?");
$stmt->execute(array($email, $password));
$data=$stmt->fetch(PDO::FETCH_ASSOC);//for the shared preferences

$count =$stmt->rowCount();
if($count==0){
    echo json_encode(array("status"=>"fail"));
}
else{
    echo json_encode(array("status"=>"success", "data"=>$data));
}
?>
