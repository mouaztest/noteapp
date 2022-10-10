<?php

include '../connect.php';

$notesid = alterfunctn('id');
$title = alterfunctn('title');
$text = alterfunctn('text');
$noteimage = alterfunctn('noteimage');

if (isset($_FILES['file'])) {
    deleteimage("../upload", $noteimage);

    $noteimage = imageUpload('file');
}


$stmt = $con->prepare('
UPDATE `note` SET `note_title`=?,`note_text`=?,`note_image`=? WHERE `note_id`=?
 ');


$stmt->execute(array($title, $text, $noteimage, $notesid));
$data = $stmt->fetch(PDO::FETCH_ASSOC);
$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array('status' => 'success',));
} else
    echo json_encode(array('status' => 'fail'));
