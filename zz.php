<?php

include 'connect.php';
$stmt = $con->prepare("UPDATE `users` SET `name` = 'abd',age=21 WHERE id =4");
$stmt->execute();
// $users = $stmt->fetchAll(pdo::FETCH_ASSOC);
$us = $stmt->rowCount();
if ($us > 0) {
    echo 'ss';
} else
    echo 'nn';
echo json_encode($us);
