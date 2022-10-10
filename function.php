<?php

define('MB', 1048576);

function alterfunctn($response)
{
    return htmlspecialchars(strip_tags($_POST[$response]));
}
function imageUpload($imagerequest)
{
    global $msgError;

    $imageName  = rand(1, 200) . $_FILES[$imagerequest]['name'];                //name
    $imagetmp   = $_FILES[$imagerequest]['tmp_name'];            //auth name
    $imageSize  = $_FILES[$imagerequest]['size'];                 //size
    $allowExt   = array('jpg', 'png', 'gif', 'mp3', 'pdf');    //all alowed sufix
    $strToarr   = explode(".", $imageName);                    //transfer from String to array
    $ext = end($strToarr);                                         // select last word in String
    $EXT = strtolower($ext);                                        //transfer all carachter to lower
    if (!empty($imageName) && !in_array($EXT, $allowExt)) {
        $msgError[] = 'DONOT FIND SUFFIX';
    }
    if ($imageSize > 3 * MB) {
        $msgError[] = 'SIZE OVERRIDE';
    }
    if (empty($msgError)) {
        move_uploaded_file($imagetmp, "../upload/" . $imageName);
        return $imageName;
    } else {
        return 'fail';
    }
}


function deleteimage($dir, $imageName)
{
    if (file_exists($dir . "/" . $imageName)) {
        unlink($dir . "/" . $imageName);
    }
} {
    function checkAuthenticate()
    {
        if (isset($_SERVER['PHP_AUTH_USER'])  && isset($_SERVER['PHP_AUTH_PW'])) {

            if ($_SERVER['PHP_AUTH_USER'] != "mouaz" ||  $_SERVER['PHP_AUTH_PW'] != "mouaz12345") {
                header('WWW-Authenticate: Basic realm="My Realm"');
                header('HTTP/1.0 401 Unauthorized');
                echo 'Page Not Found';
                exit;
            }
        } else {
            exit;
        }
    }
}
