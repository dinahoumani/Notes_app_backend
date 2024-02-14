<?php
include "../connect.php";

$notesid = filterRequest("notesid");
$title =filterRequest('title');
$content =filterRequest('content');
$imagename=filterRequest('imagename');

if(isset($_FILES['file'])){
    deleteFile("../upload", $imagename);
    $imagename=uploadImage('file');
}

$stmt =$connect ->prepare("UPDATE `notes` SET `notes_title`='$title',`notes_content`='$content' , `notes_image`= '$imagename' WHERE `notes_id`='$notesid'");
$stmt->execute();
$count =$stmt->rowCount();

if($count==0){
    echo json_encode(array("status"=>"fail"));
}
else{
    echo json_encode(array("status"=>"success"));
}
?>