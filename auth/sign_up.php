<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../connect.php';

$username  = filterReq('username');
$email     = filterReq('email');
$password  = filterReq('password');

$stm = $connect->prepare(
    "INSERT INTO `users` (`username`, `email`, `password`)
     VALUES (?, ?, ?)"
);

$stm->execute([$username, $email, $password]);

echo $stm->rowCount() > 0
    ? json_encode(['status' => 'success'])
    : json_encode(['status' => 'failed']);
