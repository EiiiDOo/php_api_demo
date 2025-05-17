<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../connect.php';

$email     = filterReq('email');
$password  = filterReq('password');

$stm = $connect->prepare(
    "SELECT * From users where `password` = ? And email = ?"
);

$stm->execute([$password, $email]);

$data = $stm->fetch(PDO::FETCH_ASSOC);

echo $stm->rowCount() > 0
    ? json_encode([
        'status' => 'success',
        'data' =>  [
            'id' => $data['id'],
            'username' => $data['username'],
            'email' => $data['email']
        ]
    ])
    : json_encode(['status' => 'failed']);
