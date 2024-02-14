<?php
include "../connect.php";

$username = filterRequest("username");
$email =filterRequest('email');
$password =filterRequest('password');

$stmt =$connect ->prepare("INSERT INTO `users` (`username`, `email`, `password`) VALUES ('$username', '$email', '$password')");
$stmt->execute();
$count =$stmt->rowCount();

if($count==0){
    echo json_encode(array("status"=>"fail"));
}
else{
    echo json_encode(array("status"=>"success"));
}
?>
