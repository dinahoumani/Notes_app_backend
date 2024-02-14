<?php
include "../connect.php";

$title = filterRequest("title");
$content =filterRequest('content');
$userid =filterRequest('userid');
$imagename=uploadImage('file');


if($imagename != "fail"){
    $stmt =$connect ->prepare("INSERT INTO `notes` (`notes_title`, `notes_content`, `notes_user`, `notes_image`) VALUES ('$title', '$content', '$userid', '$imagename')");
$stmt->execute();
$count =$stmt->rowCount();

if($count==0){
    echo json_encode(array("status"=>"fail"));
}
else{
    echo json_encode(array("status"=>"success"));
}
}
else{
    echo json_encode(array("status"=>"fail"));
}
?>
