<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../connect.php';

$title       = filterReq('title');
$content     = filterReq('content');
$userId      = filterReq('id');

$stm = $connect->prepare(
    "INSERT INTO `notes` (`notes_title`, `notes_content`, `notes_user`)
     VALUES (?, ?, ?)"
);

$stm->execute([$title, $content, $userId]);

echo $stm->rowCount() > 0
    ? json_encode(['status' => 'success'])
    : json_encode(['status' => 'failed']);
