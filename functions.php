<?php

define('MB', 1048576); // Rename the constant

function filterRequest($requestname){
    return htmlspecialchars(strip_tags($_POST[$requestname]));
}

function uploadImage($requestname1){
    $imagename = rand(1000, 10000).$_FILES[$requestname1]['name']; // 'name huwe esem sebet //rand(1000, 10000) is to generate a random number for each image in case we added the same image(same name), hek bye2dar yzid l tnen aal upload, cuz otherwise ma bizid the same image marten
    $imagetmp = $_FILES[$requestname1]['tmp_name']; // same here for tmp_name and size
    $imagesize = $_FILES[$requestname1]['size'];

    $strtoArray = explode('.', $imagename);
    $ext = strtolower(end($strtoArray));
    $allowedExt = array("jpg", "png", "pdf", "mp3", "gif");
    $msgError = "";

    if (!empty($imagename) && !in_array($ext, $allowedExt)) {
        $msgError = "Ext";
    }
    if ($imagesize > 2 * MB) {
        $msgError = "Size";
    }
    if (empty($msgError)) {
        move_uploaded_file($imagetmp, "../upload/" . $imagename);
        return $imagename;
    } else {
        return "fail";
    }
}

function deleteFile($dir, $imagename){
    if(file_exists($dir. "/". $imagename)){
        unlink($dir. "/". $imagename);
    }
}

//security using username and password
function checkAuthenticate(){
    if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

        if ($_SERVER['PHP_AUTH_USER'] != "dina" ||  $_SERVER['PHP_AUTH_PW'] != "dina12345"){
            header('WWW-Authenticate: Basic realm="My Realm"');
            header('HTTP/1.0 401 Unauthorized');
            echo 'Page Not Found';
            exit;
        }
        } else {
        exit;
    }
}
?>

