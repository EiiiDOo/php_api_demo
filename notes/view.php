<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../connect.php';

$userId     = filterReq('id');

$stm = $connect->prepare(
    "SELECT * From notes where `notes_user` = ? "
);

$stm->execute([$userId]);

$data = $stm->fetchAll(PDO::FETCH_ASSOC);

echo $stm->rowCount() > 0
    ? json_encode([
        'status' => 'success',
        'data' =>  $data
    ])
    : json_encode(['status' => 'failed', 'data' => []]);
