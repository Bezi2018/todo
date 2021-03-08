<?php
require_once('session.php');
require_once('db.php');

$todoId = $_POST['todoId'] ?? null;
$title = $_POST['title'] ?? null;
$description = $_POST['description'] ?? null;
$status = $_POST['status'];

if($todoId !== null && $title !== null && $description !== null) {
    $sql = "UPDATE `todo` SET `title`=:title, `description`=:description, `status`=:status WHERE uId=:uId and id=:id";
    $stmt = $db->prepare($sql);
    $stmt->execute([
        ':id' => $todoId,
        ':uId' => $_SESSION['userId'],
        ':title' => $title,
        ':description' => $description,
        ':status' => $status,
    ]); 
}

header('Location: index.php');