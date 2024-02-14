<?php
include "../connect.php";

$userid =filterRequest('userid');

$stmt =$connect ->prepare("SELECT * FROM `notes` WHERE `notes_user`='$userid'");
$stmt->execute();
$data=$stmt->fetchAll(PDO::FETCH_ASSOC);//for the shared preferences

$count =$stmt->rowCount();
if($count==0){
    echo json_encode(array("status"=>"fail"));
}
else{
    echo json_encode(array("status"=>"success", "data"=>$data));
}
?>