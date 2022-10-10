<?php

include '../connect.php';

$title = alterfunctn('title');
$text = alterfunctn('text');
$userid = alterfunctn('id');

$imagename = imageUpload('file');

if ($imagename != 'fail') {

    $stmt = $con->prepare('
INSERT INTO `note`(`note_title`, `note_text`, `note_user`,`note_image`)
 VALUES (?,?,?,?)
 ');


    $stmt->execute(array($title, $text, $userid, $imagename));

    $count = $stmt->rowCount();
    if ($count > 0) {
        echo json_encode(array('status' => 'success'));
    } else
        echo json_encode(array('status' => 'fail'));
} else {
    echo json_encode(array('status' => 'fail'));
}
