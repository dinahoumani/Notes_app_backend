<?php
include "../connect.php";

$notesid =filterRequest('notesid');
$imagename=filterRequest('imagename');

$stmt =$connect ->prepare("DELETE FROM `notes` WHERE `notes_id`=?");
$stmt->execute(array($notesid));

$count =$stmt->rowCount();
if($count==0){
    echo json_encode(array("status"=>"fail"));
}
else{
    deleteFile("../upload", $imagename);
    echo json_encode(array("status"=>"success"));
}
?>