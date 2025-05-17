<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
include '../connect.php';

$title       = filterReq('title');
$content     = filterReq('content');
$noteId      = filterReq('id');

$stm = $connect->prepare(
    "UPDATE `notes` SET 
    `notes_title` = ? ,
    `notes_content` = ?
    WHERE `notes_id` = ?"
);

$stm->execute([$title, $content, $noteId]);

echo $stm->rowCount() > 0
    ? json_encode(['status' => 'success'])
    : json_encode(['status' => 'failed']);
