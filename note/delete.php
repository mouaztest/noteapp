<?php

include '../connect.php';


$noteid = alterfunctn('id');
$noteimage = alterfunctn('noteimage');



$stmt = $con->prepare('
DELETE FROM `note` WHERE note_id =?
 ');


$stmt->execute(array($noteid));

$count = $stmt->rowCount();
if ($count > 0) {
    deleteimage("../upload", $noteimage);
    echo json_encode(array('status' => 'success',));
} else
    echo json_encode(array('status' => 'fail'));
