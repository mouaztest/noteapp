<?php

include '../connect.php';

$name = alterfunctn('name');
$email = alterfunctn('email');
$pass = alterfunctn('pass');

$stmt = $con->prepare('
INSERT INTO `users`(`name`, `email`, `pass`)
 VALUES (?,?,?)
 ');


$stmt->execute(array($name, $email, $pass));

$count = $stmt->rowCount();
if ($count > 0) {
    echo json_encode(array('status' => 'success'));
} else
    echo json_encode(array('status' => 'fail'));
