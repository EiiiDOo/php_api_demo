<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../connect.php';

$noteId     = filterReq('id');

$stm = $connect->prepare(
    "DELETE From `notes` where `notes_id` = ? "
);

$stm->execute([$noteId]);

echo $stm->rowCount() > 0
    ? json_encode([
        'status' => 'success'
    ])
    : json_encode(['status' => 'failed']);
